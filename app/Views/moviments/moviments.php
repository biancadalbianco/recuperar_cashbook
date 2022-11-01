<?= $this->extend('templates\default\default') ?>

<?= $this->section('content') ?>
<?php
$ano=date("Y");
$mes=date("m");
$cash_balance = $this->data["cash_balance"];

?>
<form action="<?php base_url("/filtro")?>">


<div id="header-moviment">
    <div class="input-group">
        <a class="btn btn-primary"> Add </a>
    </div>
    <div class="input-group">
        <label class="input-group-text" for="inputGroupSelect01">Year</label>
        <select class="form-select" id="inputGroupSelect01">
            <?php  
                echo "<option value='$ano' selected>$ano</option>";
                $ano=$ano-1;
                echo "<option value='$ano' >$ano</option>";
                $ano=$ano-1;
                echo "<option value='$ano' >$ano</option>";
                $ano=$ano-1;
                echo "<option value='$ano' >$ano</option>";
            ?>
            
        </select>
    </div>
    <div class="input-group">
        <label class="input-group-text" for="inputGroupSelect01">Month</label>
        <select class="form-select" id="inputGroupSelect01">
            <?php  
                echo "<option value='$mes'>Mes Atual </option>";
            ?>

            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
        </select>
    </div>
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">Cash balance</span>
        <input type="text" class="form-control" id="input-cash-balance" value="<?php echo $cash_balance; ?>"  disabled>
    </div>
</div>
<div class="text-center p-3">
  <button class="btn btn-primary"">Filtrar</button>
    
</div>
</form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Description</th>
      <th scope="col">Value</th>
      <th scope="col">Input</th>
      <th scope="col">Output</th>
    </tr>
  </thead>
  <tbody>
    <?php

    foreach($this->data["listaMoviment"] AS $dadosMoviment){
        
        echo "<tr>
        <td>{$dadosMoviment['id']}</td>
        <td>{$dadosMoviment['date']}</td>
        <td>{$dadosMoviment['description']}</td>
        <td>{$dadosMoviment['value']}</td>";
        if($dadosMoviment['type']=="input"){
            echo "<td>*</td><td> - </td>";
        }else{
            echo "<td> - </td><td> * </td>";
        }
        echo "</tr>";
    }
    ?>
  </tbody>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<div class="text-center p-3">
  <button type="button" class="btn btn-primary"onclick="emitirPdf()">emitirPdf</button>
</div>
<script type="text/javascript"> 

    function emitirPdf(){
        var pdf = new jsPDF();
        pdf.text(10, 20, "Relatório");

        <?php 
        
        $contador=60;
        $dados = $this->data;
        echo 'pdf.text(10, 30, "saldo: R$'.$dados['cash_balance'].'" )
        ';
        echo 'pdf.text(60, 30,"entrada: R$'.$dados['entrada'].'" )
        ';
        echo 'pdf.text(150, 30, "saida: R$'.$dados['saida'].'" )
        ';
        foreach($dados["listaMoviment"] AS $dadosMovimento){
            echo 'pdf.text(10, ' .$contador.', "'.$dadosMovimento['id'].'" )
            ';
            echo 'pdf.text(20, ' .$contador.', "'.$dadosMovimento['date'].'" )
            ';
            echo 'pdf.text(80, ' .$contador.', "'.$dadosMovimento['description'].'" )
            ';
            echo 'pdf.text(170, ' .$contador.', "'.$dadosMovimento['value'].'" )
            ';
            echo 'pdf.text(190, ' .$contador.', "'.$dadosMovimento['type'].'" )
            ';
            
            $contador = $contador+5;

        }
        ?>
        pdf.output("dataurlnewwindow");
    }
    
</script>
<table><?= $this->endSection() ?>