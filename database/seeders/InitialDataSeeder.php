<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kelas;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InitialDataSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@siakad.test'],
            ['name' => 'Admin SIAKAD', 'password' => Hash::make('admin12345'), 'role' => 'admin']
        );

        // Dosen
        $dosen = User::updateOrCreate(
            ['email' => 'dosen1@siakad.test'],
            ['name' => 'Dosen Satu', 'password' => Hash::make('dosen12345'), 'role' => 'dosen']
        );

        // Mahasiswa contoh (5)
        for ($i=1;$i<=5;$i++) {
            User::updateOrCreate(
                ['email' => "mhs{$i}@siakad.test"],
                ['name' => "Mahasiswa {$i}", 'password' => Hash::make('mhs12345'), 'role' => 'mahasiswa']
            );
        }

        // Kelas
        $kelas = Kelas::firstOrCreate(['kode'=>'TI3A'], ['nama'=>'Teknik Informatika 3A']);

        // Mata kuliah
        $mk = MataKuliah::firstOrCreate(['kode'=>'IF101'], ['nama'=>'Pemrograman Web','sks'=>3]);

        // Hubungkan dosen ke mata kuliah
        $dosen->matakuliahDosen()->syncWithoutDetaching([$mk->id]);

        // Hubungkan mahasiswa ke kelas (ambil semua mahasiswa role=mahasiswa)
        $mahasiswaIds = User::where('role','mahasiswa')->pluck('id')->toArray();
        $kelas->mahasiswa()->syncWithoutDetaching($mahasiswaIds);
    }
}
