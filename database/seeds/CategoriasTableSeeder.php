<?php

use Illuminate\Database\Seeder;
use \App\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::truncate();
        $categorias = new Categoria;
        $categorias->categoria = "Cuidado de Piel";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Cuidado de Cabello";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Perfumes";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Sombras";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Delineador de Ojos";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Pestaninas";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Pestanas Postizas";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Cuidado de Cejas";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Polvos para el rostro";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Bases";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Rubores";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Iluminadores";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Bronzers";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Primer de Rostro";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Productos para Contorno";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Correctores";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Esmaltes";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Labiales";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Brochas";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Cuidado Corporal";
        $categorias->save();

        $categorias = new Categoria;
        $categorias->categoria = "Primer de Ojos";
        $categorias->save();
    }
}
