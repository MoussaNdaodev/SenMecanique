<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            'description' => "SenMecanique se fixe pour mission de réduire le taux de chômage des mécaniciens et de faciliter l'accès des jeunes mécaniciens au marché du travail. Nous proposons une solution complète et innovante qui combine une plateforme d'assistance en ligne et un site de e-commerce spécialisé dans les pièces détachées pour véhicules. Chez SenMecanique, trouvez rapidement un mécanicien qualifié proche de vous pour des réparations urgentes, ou explorez notre vaste catalogue de pièces détachées de qualité pour entretenir et réparer vos véhicules. Rejoignez-nous pour bénéficier d'un service rapide, fiable et adapté aux besoins spécifiques des mécaniciens et des clients. Ensemble, contribuons à dynamiser le secteur de la mécanique au Sénégal.",
            'short_des' => "SenMecanique : Réduire le chômage des mécaniciens et faciliter leur accès au marché. Trouvez des mécaniciens qualifiés et achetez des pièces détachées de qualité via notre plateforme complète d'assistance en ligne et de e-commerce.",
            'photo' => "image.jpg",
            'logo' => "logo.jpg",
            'address' => "Pikine Rue 10 - Dakar - Sénégal",
            'email' => "senmecanique@gmail.sn",
            'phone' => "+221 78 175 11 21 / +221 78 585 17 97 ",
        );
        DB::table('settings')->insert($data);
    }
}

DB::table('settings')->insert([

]);

