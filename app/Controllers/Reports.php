<?php

namespace App\Controllers;

class Reports extends BaseController
{
    public function index()
    {
        return view('reports/reports');
    }
}