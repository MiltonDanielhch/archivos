<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DocumentTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('document_types')->delete();
        
        \DB::table('document_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'RESOLUCIÓN ADMINISTRATIVA DE GOBERNACIÓN',
                'created_at' => '2024-05-17 08:58:27',
                'updated_at' => '2024-05-17 08:58:27',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'DECRETO DEPARTAMENTAL',
                'created_at' => '2024-05-17 08:58:36',
                'updated_at' => '2024-05-17 08:58:36',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'DECRETO DE GOBERNACIÓN',
                'created_at' => '2024-05-17 08:58:46',
                'updated_at' => '2024-05-17 08:58:46',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'RESOLUCIÓN DE GOBERNACIÓN',
                'created_at' => '2024-05-17 08:58:53',
                'updated_at' => '2024-05-17 08:58:53',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'INFORME LEGAL',
                'created_at' => '2024-05-17 08:58:59',
                'updated_at' => '2024-05-17 08:58:59',
            ),
        ));
        
        
    }
}