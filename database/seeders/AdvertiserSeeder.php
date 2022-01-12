<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use Illuminate\Database\Seeder;

class AdvertiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advertisers = [
            [
                'fullname' => 'BOBOVI Komlan',
                'email' => 'bobovikomlan@gmail.com',
                'password' => bcrypt('password'),
                'phone' => '99668877',
                'city' => 'Tsévié',
                'whatsapp_phone' => '92553311',
            ],
            [
                'fullname' => 'ATIHNOU Gazo',
                'email' => 'gazotinou@gmail.com',
                'password' => bcrypt('password'),
                'phone' => '97448855',
                'city' => 'Tsévié',
                'whatsapp_phone' => '91335588',
            ],
        ];

        foreach ($advertisers as $advertiser) {
            Advertiser::create($advertiser);
        }
    }
}
