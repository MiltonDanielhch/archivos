<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DocumentosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('documentos')->delete();
        
        
        
    }
}