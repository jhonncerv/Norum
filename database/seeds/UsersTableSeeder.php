<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usuario = new App\User;
        $usuario->name = 'Jhonn';
        $usuario->email = 'jhonncerv@gmail.com';
        $usuario->password = bcrypt('psswrd');
        $usuario->save();

        $usuario = new App\User;
        $usuario->name = 'Norum';
        $usuario->email = 'norum@norum.com';
        $usuario->password = bcrypt('123456');
        $usuario->save();

        $opcion = new App\Opcion;
        $opcion->activo = 1;
        $opcion->save();

    }
}
