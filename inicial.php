<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Início</title>
</head>
<body>
    <form method="post" action="cadastrarInstrutor.php" name="dados" onSubmit="return enviardados();">    
        <button type="submit" class="waves-effect waves-light btn" name="action" action="cadastrarInstrutor.php">Cadastrar Instrutor</button>
    </form>
    <form method="post" action="cadastrarDanca.php" name="dados" onSubmit="return enviardados();">    
        <button type="submit" class="waves-effect waves-light btn" name="action" action="cadastrarDanca.php">Cadastrar Dança</button>
    </form>
    <form method="post" action="cadastrarAluno.php" name="dados" onSubmit="return enviardados();">    
        <button type="submit" class="waves-effect waves-light btn" name="action" action="cadastrarAluno.php">Cadastrar Aluno</button>
    </form>
    <form method="post" action="cadastrarAlunoDanca.php" name="dados" onSubmit="return enviardados();">    
        <button type="submit" class="waves-effect waves-light btn" name="action" action="cadastrarAluno.php">Cadastrar Aluno em dança</button>
    </form>
    <form method="post" action="cadastrarAlunoInstrutor.php" name="dados" onSubmit="return enviardados();">    
        <button type="submit" class="waves-effect waves-light btn" name="action">Ligar aluno ao instrutor</button>
    </form>
    <form method="post" action="crudInstrutor.php?acao=selecionar" name="dados" onSubmit="return enviardados();">    
        <button type="submit" class="waves-effect waves-light btn" name="action">Visualizar dados dos instrutores</button>
    </form>
    <form method="post" action="crudAluno.php?acao=selecionar" name="dados" onSubmit="return enviardados();">    
        <button type="submit" class="waves-effect waves-light btn" name="action">Visualizar dados dos alunos</button>
    </form>
    <form method="post" action="crudDanca.php?acao=selecionar" name="dados" onSubmit="return enviardados();">    
        <button type="submit" class="waves-effect waves-light btn" name="action">Visualizar dados da dança</button>
    </form>
     <form method="post" action="crudAlunoDanca.php?acao=selecionar" name="dados" onSubmit="return enviardados();">    
        <button type="submit" class="waves-effect waves-light btn" name="action">Visualizar alunos matriculados em danças</button>
    </form>
    <form method="post" action="crudAlunoInstrutor.php?acao=selecionar" name="dados" onSubmit="return enviardados();">    
        <button type="submit" class="waves-effect waves-light btn" name="action">Visualizar alunos e seus instrutores</button>
    </form>
</body>
<?php
    echo "<script language='javascript' type='text/javascript'>
            alert('Ordem de cadastro: Instrutor --> Dança de Salão --> Aluno --> Demais tabelas')
            alert('Ordem de exclusão: Ligação Aluno/Instrutor --> Cadastro Aluno em Dança --> Dança --> Instrutor --> Aluno')</script>";
?>
</html>