<?php

use Illuminate\Database\Seeder;
use App\Persona;
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
                DB::table('personas')->delete();
                Persona::insert([
                        [
                                'nombre' => 'Andres Ramírez',
                                'tipo_documento' => 'Cédula',
                                'num_documento' => '1036789456',
                                'direccion' => 'Calle 52 # 67 -32 Barrio Obrero',
                                'telefono' => '3167895632',
                                'email' => 'andresr@gmail.com',
                                'condicion' => 1,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                        ],
                        [
                                'nombre' => 'Juan Carlos Álvarez',
                                'tipo_documento' => 'Cédula',
                                'num_documento' => '1076893567',
                                'direccion' => 'Calle 3 # 25 -67 Barrio Laureles',
                                'telefono' => '3007695643',
                                'email' => 'juaca@outlook.com',
                                'condicion' => 1,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                        ],
                        [
                                'nombre' => 'Jorge Posada',
                                'tipo_documento' => 'Cédula',
                                'num_documento' => '13078563',
                                'direccion' => 'Carrera 23 # 2 -78 Barrio las Granjas',
                                'telefono' => '3015673489',
                                'email' => 'jposada@gmail.com',
                                'condicion' => 1,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                        ],
                        [
                                'nombre' => 'Isabel Díaz',
                                'tipo_documento' => 'Cédula',
                                'num_documento' => '10685683489',
                                'direccion' => 'Avenida 5 # 34 -32 Barrio Alcalá',
                                'telefono' => '3156789356',
                                'email' => 'isadiaz@hotmail.com',
                                'condicion' => 1,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                        ],
                        [
                                'nombre' => 'Alvaro Sánchez',
                                'tipo_documento' => 'Cédula',
                                'num_documento' => '15678932',
                                'direccion' => 'Calle 3 # 12 -56 Barrio Nuevo',
                                'telefono' => '3125673589',
                                'email' => 'alvaro12@gmail.com',
                                'condicion' => 1,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                        ]
                ]);
        }
}
