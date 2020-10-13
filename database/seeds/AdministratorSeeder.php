<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "lopotia";
        $administrator->name = "Aditya Bimo Prayogo";
        $administrator->email = "administrator@lopotia.com";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("admin");
        $administrator->avatar = "saat-ini-tidak-ada-file.png";
        $administrator->phone = "083156576176";
        $administrator->address = "Depok, Sleman, Daerah Istimewa Yogyakarta";
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
