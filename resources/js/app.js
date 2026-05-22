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

		const openDrawer = () => {
			if (!drawer || !overlay) {
				return;
			}

			drawer.classList.remove('translate-x-full');
			drawer.classList.add('translate-x-0');
			overlay.classList.remove('hidden');
			document.body.classList.add('overflow-hidden');
		};

		const closeDrawer = () => {
			if (!drawer || !overlay) {
				return;
			}

			drawer.classList.add('translate-x-full');
			drawer.classList.remove('translate-x-0');
			overlay.classList.add('hidden');
			document.body.classList.remove('overflow-hidden');
		};

		openButtons.forEach((button) => button.addEventListener('click', openDrawer));
		closeButtons.forEach((button) => button.addEventListener('click', closeDrawer));
		overlay?.addEventListener('click', closeDrawer);

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
				dot.classList.toggle('w-2', !active);
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

const initTestimonialCarousels = () => {
	document.querySelectorAll('[data-testimonial-carousel]').forEach((carousel) => {
		if (carousel.dataset.initialized === 'true') {
			return;
		}

		carousel.dataset.initialized = 'true';

		const slides = Array.from(carousel.querySelectorAll('[data-testimonial-slide]'));
		const prevButton = carousel.querySelector('[data-testimonial-prev]');
		const nextButton = carousel.querySelector('[data-testimonial-next]');
		const dots = Array.from(carousel.querySelectorAll('[data-testimonial-dot]'));
		const interval = Number(carousel.dataset.interval ?? '6000');
		let index = 0;

		const showSlide = (nextIndex) => {
			index = (nextIndex + slides.length) % slides.length;

			slides.forEach((slide, slideIndex) => {
				const active = slideIndex === index;
				slide.classList.toggle('hidden', !active);
				slide.classList.toggle('block', active);
			});

			dots.forEach((dot, dotIndex) => {
				const active = dotIndex === index;
				dot.classList.toggle('w-8', active);
				dot.classList.toggle('w-2', !active);
				dot.classList.toggle('bg-primary', active);
				dot.classList.toggle('bg-primary/30', !active);
			});
		};

		prevButton?.addEventListener('click', () => showSlide(index - 1));
		nextButton?.addEventListener('click', () => showSlide(index + 1));
		dots.forEach((dot, dotIndex) => dot.addEventListener('click', () => showSlide(dotIndex)));

		showSlide(index);
		carousel._testimonialTimer = window.setInterval(() => showSlide(index + 1), interval);
	});
};

const bootstrap = () => {
	initNavbar();
	initCarousel();
	initStatsCounters();
	initTestimonialCarousels();
};

document.addEventListener('DOMContentLoaded', bootstrap);
document.addEventListener('livewire:navigated', bootstrap);
