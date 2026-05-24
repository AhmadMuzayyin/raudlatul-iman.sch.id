const initNavbar = () => {
	document.querySelectorAll('[data-site-navbar]').forEach((navbar) => {
		if (navbar.dataset.initialized === 'true') {
			return;
		}

		navbar.dataset.initialized = 'true';

		const drawer = navbar.querySelector('[data-navbar-drawer]');
		const overlay = navbar.querySelector('[data-navbar-overlay]');
		const openButtons = navbar.querySelectorAll('[data-navbar-open]');
		const closeButtons = navbar.querySelectorAll('[data-navbar-close]');
		const mobileDetails = Array.from(navbar.querySelectorAll('[data-navbar-mobile-details]'));
		const drawerLinks = Array.from(navbar.querySelectorAll('[data-navbar-drawer] a'));

		const setExpandedState = (expanded) => {
			openButtons.forEach((button) => {
				button.setAttribute('aria-expanded', expanded ? 'true' : 'false');
			});
		};

		const openDrawer = () => {
			if (!drawer || !overlay) {
				return;
			}

			drawer.classList.remove('translate-x-full');
			drawer.classList.add('translate-x-0');
			overlay.classList.remove('hidden');
			document.body.classList.add('overflow-hidden');
			mobileDetails.forEach((detail) => {
				detail.open = true;
			});
			setExpandedState(true);
		};

		const closeDrawer = () => {
			if (!drawer || !overlay) {
				return;
			}

			drawer.classList.add('translate-x-full');
			drawer.classList.remove('translate-x-0');
			overlay.classList.add('hidden');
			document.body.classList.remove('overflow-hidden');
			setExpandedState(false);
		};

		openButtons.forEach((button) => button.addEventListener('click', openDrawer));
		closeButtons.forEach((button) => button.addEventListener('click', closeDrawer));
		drawerLinks.forEach((link) => link.addEventListener('click', closeDrawer));
		overlay?.addEventListener('click', closeDrawer);
		document.addEventListener('keydown', (event) => {
			if (event.key === 'Escape') {
				closeDrawer();
			}
		});

		const updateScrolledState = () => {
			const scrolled = window.scrollY > 20;

			navbar.classList.toggle('bg-white/80', scrolled);
			navbar.classList.toggle('shadow-sm', scrolled);
			navbar.classList.toggle('border-b', scrolled);
			navbar.classList.toggle('border-primary-light', scrolled);
			navbar.classList.toggle('bg-white/60', !scrolled);
		};

		updateScrolledState();
		window.addEventListener('scroll', updateScrolledState, { passive: true });
		window.addEventListener('resize', () => {
			if (window.innerWidth >= 1024) {
				closeDrawer();
			}
		});
	});
};

const initCarousel = () => {
	document.querySelectorAll('[data-carousel]').forEach((carousel) => {
		if (carousel.dataset.initialized === 'true') {
			return;
		}

		carousel.dataset.initialized = 'true';

		const slides = Array.from(carousel.querySelectorAll('[data-carousel-slide]'));
		const dots = Array.from(carousel.querySelectorAll('[data-carousel-dot]'));
		const prevButton = carousel.querySelector('[data-carousel-prev]');
		const nextButton = carousel.querySelector('[data-carousel-next]');
		const interval = Number(carousel.dataset.interval ?? '5000');
		let index = slides.findIndex((slide) => slide.classList.contains('opacity-100'));

		if (index < 0) {
			index = 0;
		}

		const showSlide = (nextIndex) => {
			index = (nextIndex + slides.length) % slides.length;

			slides.forEach((slide, slideIndex) => {
				const active = slideIndex === index;
				slide.classList.toggle('opacity-100', active);
				slide.classList.toggle('opacity-0', !active);
				slide.classList.toggle('pointer-events-none', !active);
				slide.setAttribute('aria-hidden', active ? 'false' : 'true');
			});

			dots.forEach((dot, dotIndex) => {
				const active = dotIndex === index;
				dot.classList.toggle('w-10', active);
				dot.classList.toggle('w-4', !active);
				dot.classList.toggle('bg-primary', active);
				dot.classList.toggle('bg-white/50', !active);
				dot.setAttribute('aria-pressed', active ? 'true' : 'false');
			});
		};

		prevButton?.addEventListener('click', () => showSlide(index - 1));
		nextButton?.addEventListener('click', () => showSlide(index + 1));
		dots.forEach((dot, dotIndex) => dot.addEventListener('click', () => showSlide(dotIndex)));

		showSlide(index);

		carousel._carouselTimer = window.setInterval(() => showSlide(index + 1), interval);
		carousel.addEventListener('mouseenter', () => window.clearInterval(carousel._carouselTimer));
		carousel.addEventListener('mouseleave', () => {
			carousel._carouselTimer = window.setInterval(() => showSlide(index + 1), interval);
		});
	});
};

const initStatsCounters = () => {
	document.querySelectorAll('[data-stats-counter]').forEach((counter) => {
		if (counter.dataset.initialized === 'true') {
			return;
		}

		counter.dataset.initialized = 'true';

		const valueElement = counter.querySelector('[data-counter-value]');
		const target = Number(counter.dataset.value ?? '0');
		const suffix = counter.dataset.suffix ?? '';
		const duration = Number(counter.dataset.duration ?? '1600');

		if (!valueElement) {
			return;
		}

		const animate = () => {
			const start = performance.now();

			const tick = (timestamp) => {
				const progress = Math.min(1, (timestamp - start) / duration);
				const eased = 1 - Math.pow(1 - progress, 3);
				valueElement.textContent = `${Math.round(target * eased).toLocaleString('id-ID')}${suffix}`;

				if (progress < 1) {
					requestAnimationFrame(tick);
				}
			};

			requestAnimationFrame(tick);
		};

		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						animate();
						observer.disconnect();
					}
				});
			},
			{ threshold: 0.3 }
		);

		observer.observe(counter);
	});
};

const initAgendaTabs = () => {
	document.querySelectorAll('[data-agenda-tabs]').forEach((tabs) => {
		if (tabs.dataset.initialized === 'true') {
			return;
		}

		tabs.dataset.initialized = 'true';

		const buttons = Array.from(tabs.querySelectorAll('[data-agenda-tab]'));
		const items = Array.from(tabs.querySelectorAll('[data-agenda-item]'));
		const emptyState = tabs.querySelector('[data-agenda-empty]');

		const applyFilter = (activeTab) => {
			let visibleCount = 0;

			buttons.forEach((button) => {
				const isActive = button.dataset.agendaTab === activeTab;
				button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
				button.classList.toggle('bg-primary', isActive);
				button.classList.toggle('text-white', isActive);
				button.classList.toggle('shadow-sm', isActive);
				button.classList.toggle('bg-white', !isActive);
				button.classList.toggle('text-dark', !isActive);
				button.classList.toggle('hover:text-primary', !isActive);
			});

			items.forEach((item) => {
				const matches = activeTab === 'all' || item.dataset.agendaInstitution === activeTab;
				item.classList.toggle('hidden', !matches);

				if (matches) {
					visibleCount += 1;
				}
			});

			if (emptyState) {
				emptyState.classList.toggle('hidden', visibleCount > 0);
			}
		};

		buttons.forEach((button) => {
			button.addEventListener('click', () => applyFilter(button.dataset.agendaTab ?? 'all'));
		});

		applyFilter('all');
	});
};

const initTestimonialCarousels = () => {
	document.querySelectorAll('[data-testimonial-carousel]').forEach((carousel) => {
		if (carousel.dataset.initialized === 'true') {
			return;
		}

		carousel.dataset.initialized = 'true';

		const track = carousel.querySelector('[data-testimonial-track]');
		const slides = Array.from(carousel.querySelectorAll('[data-testimonial-slide]'));
		const prevButton = carousel.querySelector('[data-testimonial-prev]');
		const nextButton = carousel.querySelector('[data-testimonial-next]');
		const dotsContainer = carousel.querySelector('[data-testimonial-dots]');
		const interval = Number(carousel.dataset.interval ?? '6000');
		let pageIndex = 0;
		let itemsPerView = 1;
		let totalPages = 1;
		let dots = [];

		if (!track || slides.length === 0) {
			return;
		}

		const resolveItemsPerView = () => {
			if (window.innerWidth >= 1024) return 3;
			if (window.innerWidth >= 768) return 2;
			return 1;
		};

		const updateSlideWidths = () => {
			slides.forEach((slide) => {
				slide.style.flex = `0 0 ${100 / itemsPerView}%`;
			});
		};

		const buildDots = () => {
			if (!dotsContainer) {
				return;
			}

			dotsContainer.innerHTML = '';
			dots = [];

			for (let page = 0; page < totalPages; page += 1) {
				const dot = document.createElement('button');
				dot.type = 'button';
				dot.className = 'h-4 rounded-full transition-all';
				dot.setAttribute('aria-label', `Testimoni ${page + 1}`);
				dot.addEventListener('click', () => showSlide(page));
				dotsContainer.append(dot);
				dots.push(dot);
			}
		};

		const showSlide = (nextIndex) => {
			pageIndex = (nextIndex + totalPages) % totalPages;

			const startIndex = Math.min(pageIndex * itemsPerView, Math.max(0, slides.length - itemsPerView));
			const translatePercent = (startIndex * 100) / itemsPerView;
			track.style.transform = `translateX(-${translatePercent}%)`;

			dots.forEach((dot, dotIndex) => {
				const active = dotIndex === pageIndex;
				dot.classList.toggle('w-8', active);
				dot.classList.toggle('w-4', !active);
				dot.classList.toggle('bg-primary', active);
				dot.classList.toggle('bg-primary/30', !active);
				dot.setAttribute('aria-pressed', active ? 'true' : 'false');
			});
		};

		const applyLayout = () => {
			itemsPerView = resolveItemsPerView();
			totalPages = Math.max(1, Math.ceil(slides.length / itemsPerView));
			updateSlideWidths();
			buildDots();
			showSlide(0);
		};

		const restartTimer = () => {
			window.clearInterval(carousel._testimonialTimer);
			carousel._testimonialTimer = window.setInterval(() => showSlide(pageIndex + 1), interval);
		};

		prevButton?.addEventListener('click', () => {
			showSlide(pageIndex - 1);
			restartTimer();
		});
		nextButton?.addEventListener('click', () => {
			showSlide(pageIndex + 1);
			restartTimer();
		});

		applyLayout();
		restartTimer();

		window.addEventListener('resize', () => {
			const nextItemsPerView = resolveItemsPerView();

			if (nextItemsPerView !== itemsPerView) {
				applyLayout();
				restartTimer();
			}
		});

		carousel.addEventListener('mouseenter', () => window.clearInterval(carousel._testimonialTimer));
		carousel.addEventListener('mouseleave', restartTimer);
	});
};

const bootstrap = () => {
	initNavbar();
	initCarousel();
	initStatsCounters();
	initAgendaTabs();
	initTestimonialCarousels();
};

document.addEventListener('DOMContentLoaded', bootstrap);
document.addEventListener('livewire:navigated', bootstrap);

const startLivewireDomObserver = () => {
	if (!document.body) {
		return;
	}

	const livewireDomObserver = new MutationObserver(() => {
		bootstrap();
	});

	livewireDomObserver.observe(document.body, {
		childList: true,
		subtree: true,
	});
};

if (document.body) {
	startLivewireDomObserver();
} else {
	document.addEventListener('DOMContentLoaded', startLivewireDomObserver, { once: true });
}
