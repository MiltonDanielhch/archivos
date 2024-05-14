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
                'nomdoc' => 'Decreto Departamental',
                'created_at' => '2024-05-08 11:16:59',
                'updated_at' => '2024-05-08 11:16:59',
            ),
            1 => 
            array (
                'id' => 2,
                'nomdoc' => 'Decreto de Gobernacion',
                'created_at' => '2024-05-08 11:20:50',
                'updated_at' => '2024-05-08 11:20:50',
            ),
            2 => 
            array (
                'id' => 4,
                'nomdoc' => 'Resolución Administrativa de Gobernación',
                'created_at' => '2024-05-08 11:23:27',
                'updated_at' => '2024-05-08 11:23:27',
            ),
            3 => 
            array (
                'id' => 5,
                'nomdoc' => 'Resolución de Gobernación',
                'created_at' => '2024-05-08 11:24:55',
                'updated_at' => '2024-05-08 11:24:55',
            ),
            4 => 
            array (
                'id' => 6,
                'nomdoc' => 'Informe Legal',
                'created_at' => '2024-05-08 11:25:39',
                'updated_at' => '2024-05-08 11:25:39',
            ),
        ));
        
        
    }
}