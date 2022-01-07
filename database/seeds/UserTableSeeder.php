<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
        $petugas = factory(User::class)->create([
            'name'     => 'Mega',
            'email'    => 'mega@epson.com',
            'address'  => 'jl. Gatau dimana pokonya disitu ajah',
            'phone'    => '81311465591',
            'password' => bcrypt('secret'),
        ]);

        $petugas->assignRole('admin');

        $this->command->info('>_ Here is your admin details to login:');
        $this->command->warn($petugas->email);
        $this->command->warn('Password is "secret"');

        // customer
        $anggota = factory(User::class)->create([
            'name'     => 'Fajar',
            'email'    => 'fajar@epson.com',
            'address'  => 'jl. Gatau dimana pokonya disitu ajah',
            'phone'    => '89672650972',
            'password' => bcrypt('secret'),
        ]);

        $anggota->assignRole('customer');

        $this->command->info('>_ Here is your customer details to login:');
        $this->command->warn($anggota->email);
        $this->command->warn('Password is "secret"');

        // direktur
        $anggota = factory(User::class)->create([
            'name'     => 'John Doe',
            'email'    => 'johndoe@epson.com',
            'address'  => 'jl. Gatau dimana pokonya disitu ajah',
            'phone'    => '81311465591',
            'password' => bcrypt('secret'),
        ]);

        $anggota->assignRole('direktur');

        $this->command->info('>_ Here is your direktur details to login:');
        $this->command->warn($anggota->email);
        $this->command->warn('Password is "secret"');

        // bersihkan cache
        $this->command->call('cache:clear');
    }
}
