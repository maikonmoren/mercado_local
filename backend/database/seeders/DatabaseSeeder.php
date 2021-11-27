<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



       /* $AdminUser = new \App\Models\AdminUser([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
        ]);
        $AdminUser->saveQuietly();

        $user = new \App\Models\User([
                'name' => 'user',
                'document' => '00000000000',
                'email' => 'user@user.com',
                'password' => 'user'
        ]);
        $user->saveQuietly();

        $merchant = new \App\Models\MerchantUser([
            'name'  => 'comerciante',
            'email' => 'comerciante@comerciante.com',
            'password' => 'comerciante',
            'document' => '00000000001',
            'confirmed_at' => date( 'Y-m-d' ),
        ]);
        $merchant->saveQuietly();*/

        $category = new \App\Models\Category([
            'name'  => 'Esporte',
            'description' => 'esporte',
        ]);
        $category->saveQuietly();

        $category = new \App\Models\Category([
            'name'  => 'Tecnologia',
            'description' => 'tecnologia',
        ]);
        $category->saveQuietly();



    }
}
