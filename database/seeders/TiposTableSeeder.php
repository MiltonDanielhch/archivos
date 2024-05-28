<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Tipos')->delete();
        
        \DB::table('Tipos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nomdoc' => 'RESOLUCIÓN ADMINISTRATIVA DE GOBERNACIÓN',
                'created_at' => '2024-05-17 08:58:27',
                'updated_at' => '2024-05-17 08:58:27',
            ),
            1 => 
            array (
                'id' => 2,
                'nomdoc' => 'DECRETO DEPARTAMENTAL',
                'created_at' => '2024-05-17 08:58:36',
                'updated_at' => '2024-05-17 08:58:36',
            ),
            2 => 
            array (
                'id' => 3,
                'nomdoc' => 'DECRETO DE GOBERNACIÓN',
                'created_at' => '2024-05-17 08:58:46',
                'updated_at' => '2024-05-17 08:58:46',
            ),
            3 => 
            array (
                'id' => 4,
                'nomdoc' => 'RESOLUCIÓN DE GOBERNACIÓN',
                'created_at' => '2024-05-17 08:58:53',
                'updated_at' => '2024-05-17 08:58:53',
            ),
            4 => 
            array (
                'id' => 5,
                'nomdoc' => 'INFORME LEGAL',
                'created_at' => '2024-05-17 08:58:59',
                'updated_at' => '2024-05-17 08:58:59',
            ),
        ));
        
        
    }
}