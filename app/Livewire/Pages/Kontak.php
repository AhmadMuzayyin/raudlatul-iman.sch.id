<?php

namespace App\Livewire\Pages;

use App\Models\Contact;
use Illuminate\View\View;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

#[Layout('layouts.app')]
#[Title('Kontak — Pondok Pesantren Raudlatul Iman')]
class Kontak extends Component
{
    public string $name = '';

    public string $email = '';

    public string $subject = '';

    public string $message = '';

    public string $website = '';

    public bool $sent = false;

    public int $sentVersion = 0;

    public function send(): void
    {
        $this->sent = false;

        sleep(3);
        if (filled($this->website)) {
            return;
        }

        if (RateLimiter::tooManyAttempts($this->rateLimitKey(), 1)) {
            throw ValidationException::withMessages([
                'email' => 'Terlalu banyak percobaan. Coba lagi dalam beberapa menit.',
            ]);
        }

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        RateLimiter::hit($this->rateLimitKey(), 600);

        $this->sent = true;
        $this->sentVersion++;
        $this->reset(['name', 'email', 'subject', 'message', 'website']);
    }

    private function rateLimitKey(): string
    {
        $ipAddress = request()->ip() ?? 'unknown-ip';

        return implode('|', ['contact-form', $ipAddress]);
    }

    public function render(): View
    {
        return view('livewire.pages.kontak');
    }
}
