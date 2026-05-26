<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function empresa()
    {
        return 'página empresarial';
    }
    public function servicos()
    {
        return 'página de serviços';
    }

    public function portfolio()
    {
        return view('portfolio');
    }

public function blog()
    {
        return view('blog');
    }
    
}
