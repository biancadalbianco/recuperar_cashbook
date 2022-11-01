<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\HomeModel;

class Home extends BaseController
{
    public function index()
    {   
        $moviment = new HomeModel();
        $dados["listaMoviment"] = $moviment-> grafico();
        $dados["cash_balance"] = $moviment-> cash_balance();
        $dados["entrada"] = $moviment-> input();
        $dados["saida"] = $moviment-> output();
        return view('home/home', $dados);
        
    }
}
