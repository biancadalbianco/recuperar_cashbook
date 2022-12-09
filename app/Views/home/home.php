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

    <div class="wrap" id="input">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
			'packages': ['corechart']
		  });
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        //Grafico de todos os movimentos
        var data = google.visualization.arrayToDataTable([
          ['Descrição', 'Valor do movimento'],
          <?php	foreach ($listaMoviment as $listaMoviment) {?>
          ['<?php echo $listaMoviment['description'];?>',<?php echo $listaMoviment['value'];?>], <?php } ?>
        ]);
        var options = {
          title: 'Movimentos',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('movimentos'));

        chart.draw(data, options);
      }
    </script>
    </div>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-12">
             <div id="movimentos" style="width: 80%; height: 500px; margin-left:10%;" class="col"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
             <div id="dashboard" style="width: 80%; height: 500px; margin-left:10%;" class="col"></div>
          </div>
        </div>
      </div>
  </body>
<?php


  foreach($this->data["listaMoviment"] AS $dadosMoviment){
        
    //echo $dadosMoviment['value']."  ".$dadosMoviment['date']."  ".$dadosMoviment['type']."<br>";
}


?>
<?= $this->endSection() ?>