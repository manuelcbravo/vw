<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CatRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cat_roles')->delete();
        
        \DB::table('cat_roles')->insert(array (
            0 => 
            array (
                'id' => 0,
                'nombre' => 'Desarrollo',
                'descripcion' => 'Desarrollo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),1 =>
            array (
                'id' => 1,
                'nombre' => 'Administrador',
                'descripcion' => 'admin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}