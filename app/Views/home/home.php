<?= $this->extend('templates\default\default') ?>

<?= $this->section('content') ?>
<div class="container" style="margin-top: 2vh;">
      <div class="row">
        <div class="col-4 txt-center" style="display: flex; justify-content: center;">
          <div class="card text-center" style="width: 18rem; background-color: #29DB01;">
            <div class="card-body">
              <strong> <p style="font-size: 16px;">Saldo atual:</p> </strong>
                <h5 class="card-title" id="saldo">R$ <?php $cash_balance = $this->data["cash_balance"];
                echo $cash_balance;?></h5>
            </div>
          </div>
        </div>
        <div class="col-4 txt-center" style="display: flex; justify-content: center;">
          <div class="card text-center" style="width: 18rem; background-color: #FF0105;">
            <div class="card-body">
            <strong> <p style="font-size: 16px;">Média de valor de saída: </p> </strong>
              <h5 class="card-title" id="mediaSaida">R$ <?php $entrada = $this->data["entrada"];
                echo round($entrada, 2);?></h5>
            </div>
          </div>
        </div>
        <div class="col-4 txt-center" style="display: flex; justify-content: center;">
          <div class="card text-center" style="width: 18rem; background-color: #1567FF;">
           <div class="card-body">
           <strong> <p style="font-size: 16px;">Média de valor de entrada:</p> </strong>
            <h5 class="card-title" id="mediaEntrada">R$ <?php $saida = $this->data["saida"];
                echo round($saida, 2);;?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php


  foreach($this->data["listaMoviment"] AS $dadosMoviment){
        
    //echo $dadosMoviment['value']."  ".$dadosMoviment['date']."  ".$dadosMoviment['type']."<br>";
}


?>
<?= $this->endSection() ?>