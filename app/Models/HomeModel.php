<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table ="moviment";
    protected $returnType ="array";

    public function cash_balance(){
        $db = db_connect();
        $sql = "SELECT sum(value) AS input FROM moviment WHERE type='input'";
        $entrada = $db -> query($sql)->getResultArray();
        $sql = "SELECT sum(value) AS output FROM moviment WHERE type='output'";
        $saida = $db -> query($sql)->getResultArray();
        $cash_balance = $entrada[0]["input"]-$saida[0]["output"];
        return $cash_balance;
    }
    public function input(){
        $db = db_connect();
        $sql = "SELECT AVG(value) AS input FROM moviment WHERE type='input'";
        $entrada = $db -> query($sql)->getResultArray();
        return $entrada[0]["input"];
      }
      public function output(){
        $db = db_connect();
        $sql = "SELECT AVG(value) AS output FROM moviment WHERE type='output'";
        $saida = $db -> query($sql)->getResultArray();
        return $saida[0]["output"];
      }

      public function grafico(){
        $db = db_connect();
        $sql = "SELECT value, type, date FROM moviment ORDER BY date";
        $saida = $db -> query($sql)->getResultArray();
        return $saida;
      }

    
}