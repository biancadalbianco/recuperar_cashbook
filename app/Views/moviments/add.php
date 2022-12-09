<?= $this->extend('templates\default\default') ?>

<?= $this->section('content') ?>
<form action="<?php echo site_url ("/moviments/addAcao")?>" method="POST">
<div>
    <input placeholder="Data: Ex" type="text" name="date"/>
    <input placeholder="Descrição: Ex" type="text" name="description"/>
    <input placeholder="Valor: Ex"type="text" name="value"/>
    <select name="type">
        <option value="input">Entrada</option>
        <option value="output">Saida</option>
    </select>
    <button type="submit" class="btn btn-primary">Add</button>
</div>
</form>

<?= $this->endSection() ?>

