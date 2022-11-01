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
    public function filtrado(){
        $moviment = new MovimentsModel();
        $dados["listaMoviment"] = $moviment-> filtro();
        $dados["cash_balance"] = $moviment-> cash_balance();
        return view('moviments/moviments', $dados);
    }
}