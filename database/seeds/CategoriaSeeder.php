<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use Illuminate\Support\Facades\DB;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->delete();
        Categoria::insert([
        	[
	            'nombre' => 'Lacteos',
                'descripcion' => 'Todos los productos derivados de la leche',
	            'condicion' => 1,
	            'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
	            'nombre' => 'Granos',
                'descripcion' => 'Todos los granos y abarrotes',
	            'condicion' => 1,
	            'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
	            'nombre' => 'Bebidas',
                'descripcion' => 'Todos las bebidas envasadas no retornables',
	            'condicion' => 1,
	            'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
	            'nombre' => 'Carnes',
                'descripcion' => 'Carnes rojas, blancas y de mar',
	            'condicion' => 1,
	            'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
	            'nombre' => 'Snacks',
                'descripcion' => 'Pasabocas, mekatos, galletas y dulces',
	            'condicion' => 1,
	            'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	]
    	]);
    }
}
