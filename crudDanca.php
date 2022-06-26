<?php
include_once "conexao.php";
$acao = $_GET['acao'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
}


switch($acao){
    case 'inserir':
        $coddanca = $_POST['coddanca'];
        $nomedanca = $_POST['nomedanca'];
        $dancatipo = $_POST['dancatipo'];
        $periodo = $_POST['periodo'];
        $tipoaula = $_POST['tipoaula'];
        $horario = $_POST['horario'];
        $qtdesemana = $_POST['qtdesemana'];
        $codinstrutor = $_POST['codinstrutor'];
    

        echo "Recebi os seguintes valores: $coddanca, $nomedanca, $dancatipo, $periodo, $tipoaula, $horario, $qtdesemana, $codinstrutor<br>";

        $sqlInsert = "INSERT INTO Danca_de_Salao (Cod_Danca,Nome_Danca,Tipo_Danca,Periodo_Aula,Tipo_Aula,Horario,Qtde_Semana,Cod_Instrutor) values ('$coddanca', '$nomedanca', '$dancatipo', '$periodo', '$tipoaula', '$horario', '$qtdesemana', '$codinstrutor');";
        
        
        if(!mysqli_query($conn, $sqlInsert)){
            die("Erro ao inserir as informações do formulário nas tabelas:".mysqli_error($conn));
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados cadastrados com sucesso!')
            window.location.href='cadastrarDanca.php'</script>";
        }
        break;
    case 'montar':
        $id = $_GET['id'];
        $sql = 'SELECT * FROM Danca_de_Salao WHERE Cod_Danca ='.$id;
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
        
        //montando formulário
        echo "<form method='post' name='dados' action='crudDanca.php?acao=atualizar' onSubmit='return enviardados();'>";
        echo "<table width='588' border='0' align='center'>";
        
        
        while($registro = mysqli_fetch_array($resultado)){
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Número da dança:</font></td>";
            echo "      <td width='460'>";
            echo "     <input name='coddanca' type='text' class='formbutton' id='coddanca' size='5' maxlength='10' value=" . $id. " readonly>";
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Nome da dança:</font></td>";
            echo "      <td width='460'>";
            echo "     <textarea name='nomedanca' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Nome_Danca'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Tipo da dança:</font></td>";
            echo "      <td width='460'>";
            echo "     <textarea name='dancatipo' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Tipo_Danca'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Período da aula:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='periodo' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Periodo_Aula'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Tipo da aula:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='tipoaula' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Tipo_Aula'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Horário:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='horario' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Horario'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Quantidade de aula por semana:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='qtdesemana' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Qtde_Semana'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Número do Instrutor:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='codinstrutor' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Cod_Instrutor'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            
            
            echo "    <tr>";
            echo "    <td height='22'></td>";
            echo "      <td>";
            echo "<input name='Submit' type='submit' class='formobjects' value='Atualizar'>";
            echo "<button class='formobjects' type='submit' formaction='crudDanca.php?acao=selecionar'>Selecionar</button>";
            echo " <input name='Reset' type='reset' class='formobjects' value='Limpar campos'>";
            echo "      </td>";
            echo "      </tr>";
            
            
            echo "</table>";
            echo "</form>";
            
        };
        
        mysqli_close($conn);
        break;
    case 'atualizar':
        $coddanca = $_POST['coddanca'];
        $nomedanca = $_POST['nomedanca'];
        $dancatipo = $_POST['dancatipo'];
        $periodo = $_POST['periodo'];
        $tipoaula = $_POST['tipoaula'];
        $horario = $_POST['horario'];
        $qtdesemana = $_POST['qtdesemana'];
        $codinstrutor = $_POST['codinstrutor'];
        
        $sql = "UPDATE Danca_de_Salao SET Nome_Danca = '".$nomedanca."',Tipo_Danca ='".$dancatipo."',Periodo_Aula ='".$periodo."',Tipo_Aula='".$tipoaula."',Horario ='".$horario."',Qtde_Semana ='".$qtdesemana."',Cod_Instrutor ='".$codinstrutor."'WHERE Cod_Danca='".$coddanca."'";
        
        if(!mysqli_query($conn, $sql)){
            die('</br>Erro no comando SQL UPDATE'.mysqli_error($conn));
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizado com sucesso!')
            window.location.href='crudDanca.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        
        break;
    case 'deletar':
        $sql = "DELETE FROM Danca_de_Salao WHERE Cod_Danca = '" . $id . "'";

        if(!mysqli_query($conn, $sql)){
            die('Error: ' . mysqli_error($conn));
        } else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados excluídos com sucesso!')
        window.location.href='crudDanca.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        header("Locatio:crudDanca.php?acao=selecionar");
        break;
    case 'selecionar':

        echo "<meta charset='UTF-8'>";
        echo "<center><table border=1>";
        echo "<tr>";
        echo "<th>Cod_Danca</th>";
        echo "<th>Nome_Danca</th>";
        echo "<th>Tipo_Danca</th>";
        echo "<th>Periodo_Aula</th>";
        echo "<th>Tipo_Aula</th>";
        echo "<th>Horario</th>";
        echo "<th>Qtde_Semana</th>";
        echo "<th>Cod_Instrutor</th>";
        echo "</tr>";
    
        $sql = "SELECT * FROM Danca_de_Salao";
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
    
        echo "<CENTER>Registros cadastrados na base de dados.<br/></CENTER>";
        echo "</br>";
    
        while($registro = mysqli_fetch_array($resultado)){
            $coddanca = $registro['Cod_Danca'];
            $nomedanca = $registro['Nome_Danca'];
            $dancatipo = $registro['Tipo_Danca'];
            $periodo = $registro['Periodo_Aula'];
            $tipoaula = $registro['Tipo_Aula'];
            $horario = $registro['Horario'];
            $qtdesemana = $registro['Qtde_Semana'];
            $codinstrutor = $registro['Cod_Instrutor'];
    
            echo "<tr>";
            echo "<td>" . $coddanca . "</td>";
            echo "<td>" . $nomedanca . "</td>";
            echo "<td>" .  $dancatipo . "</td>";
            echo "<td>" . $periodo . "</td>";
            echo "<td>" . $periodo . "</td>";
            echo "<td>" . $tipoaula . "</td>";
            echo "<td>" . $horario . "</td>";
            echo "<td>" . $codinstrutor . "</td>";
            echo "<td><a href='crudDanca.php?acao=deletar&id=$coddanca'><img src='delete.png' alt='Deletar' title='Deletar registro'></a><a href='crudDanca.php?acao=montar&id=$coddanca'><img src='update.png' alt='Atualizar' title='Atualizar registro'></a><a href='cadastrarDanca.php'><img src='insert.png' alt='Inserir' title='Inserir registro'></a>";
    
            echo "<tr>";
        }
        mysqli_close($conn);
        break;
    default:
        header("Location:crudDanca.php?acao=selecionar");
        break;
}

?>