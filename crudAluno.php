<?php
include_once "conexao.php";
$acao = $_GET['acao'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
}


switch($acao){
    case 'inserir':
        $nrmatricula = $_POST['nrmatricula'];
        $nomealuno = $_POST['nomealuno'];
        $idadealuno = $_POST['idadealuno'];
        $sexoaluno = $_POST['sexo-aluno'];
        

        echo "Recebi os seguintes valores: $nrmatricula, $nomealuno, $idadealuno, $sexoaluno<br>";

        $sqlInsert = "INSERT INTO Aluno (Nr_Matricula,Nome_Aluno,Idade_Aluno,Sexo) values ('$nrmatricula', '$nomealuno', '$idadealuno', '$sexoaluno');";
        
        
        if(!mysqli_query($conn, $sqlInsert)){
            die("Erro ao inserir as informações do formulário nas tabelas:".mysqli_error($conn));
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados cadastrados com sucesso!')
            window.location.href='cadastrarAluno.php'</script>";
        }
        break;
    case 'montar':
        $id = $_GET['id'];
        $sql = 'SELECT * FROM Aluno WHERE Nr_Matricula ='.$id;
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
        
        //montando formulário
        echo "<form method='post' name='dados' action='crudAluno.php?acao=atualizar' onSubmit='return enviardados();'>";
        echo "<table width='588' border='0' align='center'>";
        
        
        while($registro = mysqli_fetch_array($resultado)){
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Número de matrícula:</font></td>";
            echo "      <td width='460'>";
            echo "     <input name='nrmatricula' type='text' class='formbutton' id='nrmatricula' size='5' maxlength='10' value=" . $id. " readonly>";
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Nome do aluno:</font></td>";
            echo "      <td width='460'>";
            echo "     <textarea name='nomealuno' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Nome_Aluno'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Idade:</font></td>";
            echo "      <td width='460'>";
            echo "     <textarea name='idadealuno' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Idade_Aluno'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Sexo:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='sexo-aluno' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Sexo'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            
            
            echo "    <tr>";
            echo "    <td height='22'></td>";
            echo "      <td>";
            echo "<input name='Submit' type='submit' class='formobjects' value='Atualizar'>";
            echo "<button class='formobjects' type='submit' formaction='crudAluno.php?acao=selecionar'>Selecionar</button>";
            echo " <input name='Reset' type='reset' class='formobjects' value='Limpar campos'>";
            echo "      </td>";
            echo "      </tr>";
            
            
            echo "</table>";
            echo "</form>";
            
        };
        
        mysqli_close($conn);
        break;
    case 'atualizar':
        $nrmatricula = $_POST['nrmatricula'];
        $nomealuno = $_POST['nomealuno'];
        $idadealuno = $_POST['idadealuno'];
        $sexoaluno = $_POST['sexo-aluno'];
        
        $sql = "UPDATE Aluno SET Nome_Aluno = '".$nomealuno."',Idade_Aluno ='".$idadealuno."',Sexo ='".$sexoaluno."'WHERE Nr_Matricula='".$nrmatricula."'";
        
        if(!mysqli_query($conn, $sql)){
            die('</br>Erro no comando SQL UPDATE'.mysqli_error($conn));
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizado com sucesso!')
            window.location.href='crudAluno.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        
        break;
    case 'deletar':
        $sql = "DELETE FROM Aluno WHERE Nr_Matricula = '" . $id . "'";

        if(!mysqli_query($conn, $sql)){
            die('Error: ' . mysqli_error($conn));
        } else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados excluídos com sucesso!')
        window.location.href='crudAluno.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        header("Locatio:crudAluno.php?acao=selecionar");
        break;
    case 'selecionar':

        echo "<meta charset='UTF-8'>";
        echo "<center><table border=1>";
        echo "<tr>";
        echo "<th>Nr_Matricula</th>";
        echo "<th>Nome_Aluno</th>";
        echo "<th>Idade_Aluno</th>";
        echo "<th>Sexo_Aluno</th>";
        echo "</tr>";
    
        $sql = "SELECT * FROM Aluno";
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
    
        echo "<CENTER>Registros cadastrados na base de dados.<br/></CENTER>";
        echo "</br>";
    
        while($registro = mysqli_fetch_array($resultado)){
            $nrmatricula = $registro['Nr_Matricula'];
            $nomealuno = $registro['Nome_Aluno'];
            $idadealuno = $registro['Idade_Aluno'];
            $sexoaluno = $registro['Sexo'];
    
            echo "<tr>";
            echo "<td>" . $nrmatricula . "</td>";
            echo "<td>" . $nomealuno . "</td>";
            echo "<td>" . $idadealuno . "</td>";
            echo "<td>" . $sexoaluno . "</td>";
            echo "<td><a href='crudAluno.php?acao=deletar&id=$nrmatricula'><img src='delete.png' alt='Deletar' title='Deletar registro'></a><a href='crudAluno.php?acao=montar&id=$nrmatricula'><img src='update.png' alt='Atualizar' title='Atualizar registro'></a><a href='cadastrarAluno.php'><img src='insert.png' alt='Inserir' title='Inserir registro'></a>";
    
            echo "<tr>";
        }
        mysqli_close($conn);
        break;
    default:
        header("Location:crudAluno.php?acao=selecionar");
        break;
}

?>