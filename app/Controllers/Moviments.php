<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MovimentsModel;

class Moviments extends BaseController
{
    public function index()
    {
        $moviment = new MovimentsModel();
        $dados["listaMoviment"] = $moviment-> findAll();
        $dados["cash_balance"] = $moviment-> cash_balance();
        $dados["entrada"] = $moviment-> input();
        $dados["saida"] = $moviment-> output();
        return view('moviments/moviments', $dados);
    }

    public function add()
    {
        return view('moviments/add');
    }

    public function addAcao()
    {
        $moviment = new MovimentsModel();
        $moviment-> add();
        return view('moviments/add');
    }

    public function filtro()
    {
        $moviment = new MovimentsModel();
        $dados["listaMoviment"] = $moviment-> filtro();
        $dados["cash_balance"] = $moviment-> cash_balance();
        $dados["entrada"] = $moviment-> input();
        $dados["saida"] = $moviment-> output();
        return view('moviments/moviments', $dados);
    }

    public function indexHome()
    {   
        $moviment = new MovimentsModel();
        $dados["listaMoviment"] = $moviment-> findAll();
        $dados["cash_balance"] = $moviment-> cash_balance();
        $dados["entrada"] = $moviment-> input();
        $dados["saida"] = $moviment-> output();
        return view('home/home', $dados);
        
    }
}