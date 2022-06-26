<?php
include_once "conexao.php";
$acao = $_GET['acao'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
}


switch($acao){
    case 'inserir':
        $codinstrutor = $_POST['codinstrutor'];
        $nrmatricula = $_POST['nrmatricula'];
        
        echo "Recebi os seguintes valores: $codinstrutor, $nrmatricula<br>";

        $sqlInsert = "INSERT INTO Ensina (Cod_Instrutor,Nr_Matricula) values ('$codinstrutor', '$nrmatricula');";
        
        
        if(!mysqli_query($conn, $sqlInsert)){
            die("Erro ao inserir as informações do formulário nas tabelas:".mysqli_error($conn));
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados cadastrados com sucesso!')
            window.location.href='cadastrarAlunoInstrutor.php'</script>";
        }
        break;
    case 'montar':
        $id = $_GET['id'];
        $sql = 'SELECT * FROM Ensina WHERE Cod_Ensina ='.$id;
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
        
        //montando formulário
        echo "<form method='post' name='dados' action='crudAlunoInstrutor.php?acao=atualizar' onSubmit='return enviardados();'>";
        echo "<table width='588' border='0' align='center'>";
        
        
        while($registro = mysqli_fetch_array($resultado)){
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Código de vínculo:</font></td>";
            echo "      <td width='460'>";
            echo "     <input name='codvinculo' type='text' class='formbutton' id='codvinculo' size='5' maxlength='10' value=" . $id. " readonly>";
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Número do instrutor:</font></td>";
            echo "      <td width='460'>";
            echo "     <textarea name='codinstrutor' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Cod_Instrutor'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Número de matrícula do aluno:</font></td>";
            echo "      <td width='460'>";
            echo "     <textarea name='nrmatricula' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Nr_Matricula'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td height='22'></td>";
            echo "      <td>";
            echo "<input name='Submit' type='submit' class='formobjects' value='Atualizar'>";
            echo "<button class='formobjects' type='submit' formaction='crudAlunoInstrutor.php?acao=selecionar'>Selecionar</button>";
            echo " <input name='Reset' type='reset' class='formobjects' value='Limpar campos'>";
            echo "      </td>";
            echo "      </tr>";
            
            
            echo "</table>";
            echo "</form>";
            
        };
        
        mysqli_close($conn);
        break;
    case 'atualizar':
        $id = $_POST['codvinculo'];
        $codinstrutor = $_POST['codinstrutor'];
        $nrmatricula = $_POST['nrmatricula'];
        
        $sql = "UPDATE Ensina SET Cod_Instrutor = '".$codinstrutor."',Nr_Matricula ='".$nrmatricula."'WHERE Cod_Ensina='".$id."'";
        
        if(!mysqli_query($conn, $sql)){
            die('</br>Erro no comando SQL UPDATE'.mysqli_error($conn));
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizado com sucesso!')
            window.location.href='crudAlunoInstrutor.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        
        break;
    case 'deletar':
        $sql = "DELETE FROM Ensina WHERE Cod_Ensina = '" . $id . "'";

        if(!mysqli_query($conn, $sql)){
            die('Error: ' . mysqli_error($conn));
        } else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados excluídos com sucesso!')
        window.location.href='crudAlunoInstrutor.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        header("Locatio:crudAlunoInstrutor.php?acao=selecionar");
        break;
    case 'selecionar':

        echo "<meta charset='UTF-8'>";
        echo "<center><table border=1>";
        echo "<tr>";
        echo "<th>CoddeVínculo</th>";
        echo "<th>Cod_Instrutor</th>";
        echo "<th>Nr_Matricula</th>";
        echo "</tr>";
    
        $sql = "SELECT * FROM Ensina";
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
    
        echo "<CENTER>Registros cadastrados na base de dados.<br/></CENTER>";
        echo "</br>";
    
        while($registro = mysqli_fetch_array($resultado)){
            $id = $registro['Cod_Ensina'];
            $codinstrutor = $registro['Cod_Instrutor'];
            $nrmatricula = $registro['Nr_Matricula'];
        
    
            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $codinstrutor . "</td>";
            echo "<td>" . $nrmatricula . "</td>";
            echo "<td><a href='crudAlunoInstrutor.php?acao=deletar&id=$id'><img src='delete.png' alt='Deletar' title='Deletar registro'></a><a href='crudAlunoInstrutor.php?acao=montar&id=$id'><img src='update.png' alt='Atualizar' title='Atualizar registro'></a><a href='cadastrarAlunoInstrutor.php'><img src='insert.png' alt='Inserir' title='Inserir registro'></a>";
            echo "<tr>";
        }
        mysqli_close($conn);
        break;
    default:
        header("Location:crudAlunoInstrutor.php?acao=selecionar");
        break;
}

?>