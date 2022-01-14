<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advertisements = [
            [
                'label' => 'REMORQUE MOTO/SCOOTER 2 RAILS',
                'slug' => 'remorque-motoscooter-2-rails',
                'image' => 'img/remorque-moto-scooter.jpg',
                'cost' => 20000,
                'deposit' => 8000,
                'description' => "
                    Je loue ma remorque moto 2 RAILS , équipé d'une rampe de chargement
                    Qui peux basculer pour le chargement de votre 2 roues donc plus facile
                    À VOTRE CHOIX .et d'une roue de secours.

                    +Tout le faisceaux complet neuf
                    (feu AR / WARNING / STOP) Tout Fonctionne.

                    Remorque pouvant accueillir diverses 2 roues ne dépassant pas 350 kg.

                    20.000 FCFA/jour
                    Et plusieurs jours prix offrant
                    Aucun soucis .
                    loueur d’une remorque 1 rail déjà louer +100 fois!
                    Avis + que positif ' total confiance '

                    Je demande Une pièce d'identité ou passeport valide,
                    un chèque de caution,
                    ainsi qu'une plaque d'immatriculation du véhicule
                    qui la tractera ci possible .
                ",
                'lat' => 6.14,
                'lon' => 1.21,
                'city' => 'Lomé',
                'street' => 'Adidogomé',
                'advertiser_id' => 1,
                'created_at' => now()->yesterday()
            ],
            [
                'label' => 'TABLE DE CAMPING',
                'slug' => 'table-de-camping',
                'image' => 'img/table-de-camping.jpg',
                'cost' => 1000,
                'deposit' => 500,
                'description' => "
                    Bonjour,

                    Je loue cette table de camping de décathlon très pratique, compacte et légère avec ces 4 tabourets.

                    Location possible à :
                    la journée : tarif ci-dessous
                    au weekend : tarif ci-dessous
                    ou à la semaine : 7000 FCFA

                    Pour la location je demande :
                    Caution de 5000FCFA non encaissé et rendu à la restitution de la table.
                    Copie d'une pièce d'identité.

                    Tarif Week-end : 7000 FCFA
                    Caution: 50000 FCFA
                    Tarif Journée: 1000 FCFA
                ",
                'lat' => 6.14,
                'lon' => 1.21,
                'city' => 'Lomé',
                'street' => 'Tokoin',
                'advertiser_id' => 1,
                'created_at' => now()->subDays(3)
            ],
            [
                'label' => 'APPAREIL À FONDUE EN BOIS',
                'slug' => 'appareil-a-fondue-en-bois',
                'image' => 'img/appareil-a-fondue-en-bois.jpg',
                'cost' => 6000,
                'deposit' => 3000,
                'description' => "
                    Bonjour,

                    Je loue un appareil à fondue en bois pour se régaler et passer un moment convivial entre proches ou amis. Appareil à fondue neuf et de bonne qualité avec chauffe rapide et 1,5 L de contenant. Idéal pour des fondues savoyardes et bourguignonnes jusqu'à 8 personnes autour de la table.
                    
                    Prix de la location : 6000FCFA/jour
                    
                    Cordialement
                    
                    Tarif Week-end : 40000F
                    Caution: 3000F
                    Tarif Journée: 6000F
                ",
                'lat' => 6.14,
                'lon' => 1.21,
                'city' => 'Lomé',
                'street' => 'Logogomé',
                'advertiser_id' => 2,
                'created_at' => now()->subDays(6)
            ]
        ];

        foreach ($advertisements as $advertisement) {
            Advertisement::create($advertisement);
        }
    }
}
