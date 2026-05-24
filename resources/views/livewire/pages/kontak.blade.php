<div>
    <x-site.page-header title="Kontak Kami" subtitle="Kami siap menjawab pertanyaan Anda." :crumbs="[['label' => 'Kontak']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10">
            <form wire:submit.prevent="send"
                class="p-8 md:p-10 rounded-3xl bg-white shadow-xl border border-primary-light/60">
                <h2 class="font-display text-3xl text-dark">Kirim Pesan</h2>
                <p class="text-muted-foreground mt-2">Isi formulir di bawah, kami akan menghubungi Anda.</p>

                <div class="mt-8 space-y-5">
                    <div class="hidden" aria-hidden="true">
                        <label for="website">Website</label>
                        <input wire:model="website" id="website" type="text" tabindex="-1" autocomplete="off"
                            class="hidden">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-dark">Nama Lengkap</label>
                        <input wire:model.blur="name" required
                            class="mt-2 w-full px-4 py-3 rounded-xl bg-surface border border-transparent focus:border-primary focus:bg-white outline-none transition"
                            placeholder="Nama Anda">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="text-sm font-medium text-dark">Email</label>
                            <input wire:model.blur="email" type="email" required
                                class="mt-2 w-full px-4 py-3 rounded-xl bg-surface border border-transparent focus:border-primary focus:bg-white outline-none transition"
                                placeholder="email@anda.com">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="text-sm font-medium text-dark">Subjek</label>
                            <input wire:model.blur="subject" required
                                class="mt-2 w-full px-4 py-3 rounded-xl bg-surface border border-transparent focus:border-primary focus:bg-white outline-none transition"
                                placeholder="Subjek pesan">
                            @error('subject')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-dark">Pesan</label>
                        <textarea wire:model.blur="message" required rows="5"
                            class="mt-2 w-full px-4 py-3 rounded-xl bg-surface border border-transparent focus:border-primary focus:bg-white outline-none transition resize-none"
                            placeholder="Tuliskan pesan Anda..."></textarea>
                        @error('message')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" wire:loading.attr="disabled" wire:target="send"
                        class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-primary text-primary-foreground font-medium hover:bg-primary-dark transition shadow-lg shadow-primary/30 disabled:opacity-60 disabled:cursor-not-allowed">
                        <x-site.icon name="Send" class="size-4" />
                        <span wire:loading.remove wire:target="send">Kirim</span>
                        <span wire:loading wire:target="send">Mengirim...</span>
                    </button>

                    @if ($sent)
                        <div wire:key="contact-success-{{ $sentVersion }}" x-data="{ visible: true }"
                            x-init="setTimeout(() => visible = false, 4000)" x-show="visible" x-transition
                            class="rounded-2xl border border-primary-light bg-primary-light/60 px-4 py-3 text-sm text-primary-dark">
                            Pesan terkirim. Terima kasih.
                        </div>
                    @endif
                </div>
            </form>

            <div class="space-y-6">
                <div class="p-8 rounded-3xl bg-gradient-emerald text-white">
                    <h3 class="font-display text-2xl text-white">Informasi Kontak</h3>
                    <div class="mt-6 space-y-5 text-white/90">
                        <div class="flex gap-4">
                            <div class="size-11 rounded-xl glass grid place-items-center shrink-0"><x-site.icon
                                    name="MapPin" class="size-5" /></div>
                            <div>
                                <div class="font-medium text-white">Alamat</div>
                                <div class="text-sm">Jl. Pesantren No. 123, Kab. Sejahtera</div>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="size-11 rounded-xl glass grid place-items-center shrink-0"><x-site.icon
                                    name="Phone" class="size-5" /></div>
                            <div>
                                <div class="font-medium text-white">Telepon</div>
                                <div class="text-sm">{{ $settings?->contact_phone }}</div>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="size-11 rounded-xl glass grid place-items-center shrink-0"><x-site.icon
                                    name="Mail" class="size-5" /></div>
                            <div>
                                <div class="font-medium text-white">Email</div>
                                <div class="text-sm">{{ $settings?->contact_email ?? 'info@raudlatuliman.id' }}</div>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="size-11 rounded-xl glass grid place-items-center shrink-0"><x-site.icon
                                    name="Clock" class="size-5" /></div>
                            <div>
                                <div class="font-medium text-white">Jam Operasional</div>
                                <div class="text-sm">Senin-Sabtu, 08.00-16.00 WIB</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl overflow-hidden shadow-xl border border-primary-light/60 aspect-[4/3]">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d413.4541806845221!2d113.68911154070994!3d-7.022490720603726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9dcf455555555%3A0x31b3c578df1ee94c!2sPondok%20Pesantren%20Raudlatul%20Iman!5e0!3m2!1sid!2sid!4v1779472479695!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
</div>
