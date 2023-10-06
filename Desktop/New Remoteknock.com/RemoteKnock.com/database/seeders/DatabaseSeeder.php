<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(5)->create();

        $user = User::factory()->create(
            [
                'name' =>'John Doe',
                'email' => 'john@gmail.com',
                'password' => '123456'
            ]
        );
        
        Listing::factory(6)->create(
            [
                'user_id' => $user->id
            ]
        );

        // Listing::create(  [
        //     'title' => 'Laravel Senior Developer', 
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ],);


        // Listing::create(   [
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend ,api',
        //     'company' => 'StickerMule',
        //     'location' => 'New York, NY',
        //     'email' => 'stickermule@email.com',
        //     'website' => 'https://www.stickermule.com',
        //     'description' => "About Sticker Mule Sticker Mule is the Internet's most "kick ass" brand. We are privately-owned, profitable, and powered by a globally distributed team that enjoys building happy customer experience at the highest technical standards. Our software team operates from 17 countries, and we're always looking for more exceptional engineers."
        //   ],);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
