<?php

namespace App\Livewire\Pages\Pendidikan;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Pendaftaran Santri Baru — Pondok Pesantren Raudlatul Iman')]
class Pendaftaran extends Component
{
    public function render(): View
    {
        return view('livewire.pages.pendidikan.pendaftaran', [
            'syarat' => [
                'Mengisi formulir pendaftaran online',
                'Fotokopi ijazah / surat keterangan lulus',
                'Fotokopi rapor 2 semester terakhir',
                'Fotokopi akta kelahiran dan kartu keluarga',
                'Pas foto berwarna ukuran 3x4 (4 lembar)',
                'Surat keterangan sehat dari dokter',
                'Membayar biaya pendaftaran',
            ],
            'alur' => [
                ['step' => '1', 'title' => 'Daftar Online', 'desc' => 'Isi formulir pendaftaran melalui website resmi.'],
                ['step' => '2', 'title' => 'Tes Seleksi', 'desc' => 'Mengikuti tes baca Al-Qur\'an dan wawancara.'],
                ['step' => '3', 'title' => 'Pengumuman', 'desc' => 'Hasil seleksi diumumkan melalui website dan email.'],
                ['step' => '4', 'title' => 'Daftar Ulang', 'desc' => 'Melakukan registrasi ulang dan pelunasan administrasi.'],
            ],
        ]);
    }
}
