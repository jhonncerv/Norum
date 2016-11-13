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
        $usuario->name = 'Noe';
        $usuario->email = 'pff@pff.com';
        $usuario->password = bcrypt('123');
        $usuario->save();
    }
}
