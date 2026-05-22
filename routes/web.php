<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages.home')->name('home');

Route::livewire('/profil', 'pages.profil.index')->name('profil.index');
Route::livewire('/profil/identitas', 'pages.profil.identitas')->name('profil.identitas');
Route::livewire('/profil/visi-misi', 'pages.profil.visi-misi')->name('profil.visi-misi');
Route::livewire('/profil/sejarah', 'pages.profil.sejarah')->name('profil.sejarah');
Route::livewire('/profil/struktur-organisasi', 'pages.profil.struktur-organisasi')->name('profil.struktur-organisasi');

Route::livewire('/pendidikan/pendaftaran', 'pages.pendidikan.pendaftaran')->name('pendidikan.pendaftaran');
Route::livewire('/pendidikan/fasilitas', 'pages.pendidikan.fasilitas')->name('pendidikan.fasilitas');
Route::livewire('/pendidikan/layanan', 'pages.pendidikan.layanan')->name('pendidikan.layanan');

Route::livewire('/agenda', 'pages.agenda')->name('agenda');
Route::livewire('/informasi', 'pages.informasi')->name('informasi.index');
Route::livewire('/informasi/{post:slug}', 'pages.informasi.show')->name('informasi.show');

Route::livewire('/kontak', 'pages.kontak')->name('kontak');
