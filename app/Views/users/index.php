<?= $this->extend('templates\default\default') ?>

<?= $this->section('content') ?>    
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Senha</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
    <?php

    foreach($this->data["usuarios"] AS $dadosUsers){
        
        echo "<tr>
        <td>{$dadosUsers['id']}</td>
        <td>{$dadosUsers['name']}</td>
        <td>{$dadosUsers['email']}</td>
        <td>{$dadosUsers['password']}</td>
        <td>{$dadosUsers['type']}</td>";
        echo "</tr>";
    }
    ?>
  </tbody>

  <form action="<?php echo site_url ("/user/cadastro")?>" method="POST">
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nome</label>
  <input name="name" type="name" class="form-control" id="exampleFormControlInput1" placeholder="Digite seu nome aqui">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Digite seu email aqui">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Senha</label>
  <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Digite sua senha aqui">
</div>
<select name="type">
        <option value="user">Usuario</option>
        <option value="admin">Administrador</option>
    </select>
<button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
<?= $this->endSection() ?>