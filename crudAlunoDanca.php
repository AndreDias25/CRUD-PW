<?php
include_once "conexao.php";
$acao = $_GET['acao'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
}


switch($acao){
    case 'inserir':
        $coddanca = $_POST['coddanca'];
        $nrmatricula = $_POST['nrmatricula'];
        $participaaula = $_POST['participaaula'];
        $qtdeaulasparticipadas = $_POST['qtdeaulasparticipadas'];
        $participaturma = $_POST['participaturma'];
        $qtdeturmaparticipada = $_POST['qtdeturmaparticipada'];
    

        echo "Recebi os seguintes valores: $coddanca, $nrmatricula, $participaaula, $qtdeaulasparticipadas, $participaturma, $qtdeturmaparticipada<br>";

        $sqlInsert = "INSERT INTO Participa (Cod_Danca,Nr_Matricula,ParticipadeAula,Qtde_AulasParticipadas,ParticipadeTurma,Qtde_ParticpadeTurma) values ('$coddanca', '$nrmatricula', '$participaaula', '$qtdeaulasparticipadas', '$participaturma', '$qtdeturmaparticipada');";
        
        
        if(!mysqli_query($conn, $sqlInsert)){
            die("Erro ao inserir as informações do formulário nas tabelas:".mysqli_error($conn));
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados cadastrados com sucesso!')
            window.location.href='cadastrarAlunoDanca.php'</script>";
        }
        break;
    case 'montar':
        $id = $_GET['id'];
        $sql = 'SELECT * FROM Participa WHERE Cod_Participa ='.$id;
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
        
        //montando formulário
        echo "<form method='post' name='dados' action='crudAlunoDanca.php?acao=atualizar' onSubmit='return enviardados();'>";
        echo "<table width='588' border='0' align='center'>";
        
        
        while($registro = mysqli_fetch_array($resultado)){
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Código de matrícula:</font></td>";
            echo "      <td width='460'>";
            echo "     <input name='codmatricula' type='text' class='formbutton' id='codmatricula' size='5' maxlength='10' value=" . $id. " readonly>";
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Número da dança:</font></td>";
            echo "      <td width='460'>";
            echo "     <textarea name='coddanca' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Cod_Danca'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Número de matrícula do aluno:</font></td>";
            echo "      <td width='460'>";
            echo "     <textarea name='nrmatricula' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Nr_Matricula'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Participa da aula:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='participaaula' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['ParticipadeAula'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Quantidade de aulas participadas:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='qtdeaulasparticipadas' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Qtde_AulasParticipadas'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Partipa de turma:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='participaturma' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['ParticipadeTurma'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Quantidade de turmas que participa:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='qtdeturmaparticipada' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Qtde_ParticpadeTurma'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            
            echo "    <tr>";
            echo "    <td height='22'></td>";
            echo "      <td>";
            echo "<input name='Submit' type='submit' class='formobjects' value='Atualizar'>";
            echo "<button class='formobjects' type='submit' formaction='crudAlunoDanca.php?acao=selecionar'>Selecionar</button>";
            echo " <input name='Reset' type='reset' class='formobjects' value='Limpar campos'>";
            echo "      </td>";
            echo "      </tr>";
            
            
            echo "</table>";
            echo "</form>";
            
        };
        
        mysqli_close($conn);
        break;
    case 'atualizar':
        $id = $_POST['codmatricula'];
        $coddanca = $_POST['coddanca'];
        $nrmatricula = $_POST['nrmatricula'];
        $participaaula = $_POST['participaaula'];
        $qtdeaulasparticipadas = $_POST['qtdeaulasparticipadas'];
        $participaturma = $_POST['participaturma'];
        $qtdeturmaparticipada = $_POST['qtdeturmaparticipada'];
        
        $sql = "UPDATE Participa SET Cod_Danca = '".$coddanca."',Nr_Matricula ='".$nrmatricula."',ParticipadeAula ='".$participaaula."',Qtde_AulasParticipadas='".$qtdeaulasparticipadas."',ParticipadeTurma ='".$participaturma."',Qtde_ParticpadeTurma ='".$qtdeturmaparticipada."'WHERE Cod_Participa='".$id."'";
        
        if(!mysqli_query($conn, $sql)){
            die('</br>Erro no comando SQL UPDATE'.mysqli_error($conn));
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizado com sucesso!')
            window.location.href='crudAlunoDanca.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        
        break;
    case 'deletar':
        $sql = "DELETE FROM Participa WHERE Cod_Participa = '" . $id . "'";

        if(!mysqli_query($conn, $sql)){
            die('Error: ' . mysqli_error($conn));
        } else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados excluídos com sucesso!')
        window.location.href='crudAlunoDanca.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        header("Locatio:crudAlunoDanca.php?acao=selecionar");
        break;
    case 'selecionar':

        echo "<meta charset='UTF-8'>";
        echo "<center><table border=1>";
        echo "<tr>";
        echo "<th>Cod_Danca</th>";
        echo "<th>Nr_Matricula</th>";
        echo "<th>ParticipadeAula</th>";
        echo "<th>Qtde_AulasParticipadas</th>";
        echo "<th>ParticipadeTurma</th>";
        echo "<th>Qtde_ParticpadeTurma</th>";
        echo "<th>Cod_Participa</th>";
        echo "</tr>";
    
        $sql = "SELECT * FROM Participa";
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
    
        echo "<CENTER>Registros cadastrados na base de dados.<br/></CENTER>";
        echo "</br>";
    
        while($registro = mysqli_fetch_array($resultado)){
            $coddanca = $registro['Cod_Danca'];
            $nrmatricula = $registro['Nr_Matricula'];
            $participaaula = $registro['ParticipadeAula'];
            $qtdeaulasparticipadas = $registro['Qtde_AulasParticipadas'];
            $participaturma = $registro['ParticipadeTurma'];
            $qtdeturmaparticipada = $registro['Qtde_ParticpadeTurma'];
            $Cod_Participa = $registro['Cod_Participa'];
        
    
            echo "<tr>";
            echo "<td>" . $coddanca . "</td>";
            echo "<td>" . $nrmatricula . "</td>";
            echo "<td>" . $participaaula . "</td>";
            echo "<td>" . $qtdeaulasparticipadas . "</td>";
            echo "<td>" . $participaturma . "</td>";
            echo "<td>" . $qtdeturmaparticipada . "</td>";
            echo "<td>" . $Cod_Participa . "</td>";
            echo "<td><a href='crudAlunoDanca.php?acao=deletar&id=$Cod_Participa'><img src='delete.png' alt='Deletar' title='Deletar registro'></a><a href='crudAlunoDanca.php?acao=montar&id=$Cod_Participa'><img src='update.png' alt='Atualizar' title='Atualizar registro'></a><a href='cadastrarAlunoDanca.php'><img src='insert.png' alt='Inserir' title='Inserir registro'></a>";
    
            echo "<tr>";
        }
        mysqli_close($conn);
        break;
    default:
        header("Location:crudAlunoDanca.php?acao=selecionar");
        break;
}

?>