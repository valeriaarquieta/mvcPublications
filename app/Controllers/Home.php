<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        echo view('header'); // Renderiza el archivo header.php
        echo view('home');   // Renderiza el archivo home.php
        echo view('footer'); // Renderiza el archivo footer.php
        return ''; // Esto asegura que no haya salida adicional
    }
}
