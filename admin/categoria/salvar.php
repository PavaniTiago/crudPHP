<!--admin/categoria/salvar.php-->
<h3>Cadastro de Categoria</h3>
<a class="btn btn-outline-danger float-right" href="?p=categoria/listar">Voltar</a>
<br><br>

<form method="post" enctype="multipart/form-data" name="frmCadastro" id="frmCadastro">
    <div class="form-group">
        <label for="exampleInputId">ramal</label>
        <input type="number" class="form-control" id="exampleInputramal" name="txtramal">       
    </div>    
    <div class="form-group">
        <label for="exampleInputText">Descrição</label>
        <input type="text" class="form-control" id="exampleInputText" placeholder="Informe a descrição da categoria" name="txtdescricao">
    </div>
    <input type="submit" class="btn btn-primary" name="btnsalvar" value="Salvar">
</form>
<?php
//se eu clicar no botão salvar
if(filter_input(INPUT_POST, 'btnsalvar')){
    //capturei dados do form HTML para variáveis
    $ramal = filter_input(INPUT_POST, 'txtramal');
    $descricao = filter_input(INPUT_POST, 'txtdescricao', FILTER_SANITIZE_STRING);
    
    //comunicação com class Categoria
    include_once '../class/Categoria.php';
    $cat = new Categoria();
    
    //enviar dados que capturei do form para class Categoria
    $cat->setId($ramal);
    $cat->setDescricao($descricao);
    
    //efetivar o cadastro
    $cat->salvar();
    
}