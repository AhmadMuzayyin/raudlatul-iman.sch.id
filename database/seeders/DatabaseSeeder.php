<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@raudlatuliman.sch.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        Setting::create([
            'logo' => 'https://via.placeholder.com/150',
            'favicon' => 'https://via.placeholder.com/32',
            'meta_description' => 'jelaskan tentang lembaga anda secara singkat dan jelas',
            'meta_keywords' => 'buat kata kunci yang relevan dengan lembaga anda, pisahkan dengan koma',
            'contact_email' => 'email lembaga anda',
            'contact_phone' => 'nomor telepon lembaga anda',
            'og_title' => 'judul yang akan ditampilkan saat link dibagikan di media sosial',
            'og_description' => 'deskripsi yang akan ditampilkan saat link dibagikan di media sosial',
            'og_image' => 'https://via.placeholder.com/1200x630',
            'canonical_url' => 'Url website utama anda',
            'robots' => true,
            'maintenance_mode' => false,
            'enable_comments' => true,
        ]);
    }
}
