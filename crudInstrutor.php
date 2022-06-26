<?php
include_once "conexao.php";
$acao = $_GET['acao'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
}


switch($acao){
    case 'inserir':
        $codinstrutor = $_POST['codinstrutor'];
        $nomeinstrutor = $_POST['nomeinstrutor'];
        $dancainstrutor = $_POST['dancainstrutor'];
        $salarioinstrutor = $_POST['salarioinstrutor'];
        $qtdeaula = $_POST['qtdeaula'];
        $tipo = $_POST['tipo'];
        $individual = $_POST['individual'];
        $noturna = $_POST['noturna'];
        $integral = $_POST['integral'];
        $tiposal = $_POST['tiposal'];

        echo "Recebi os seguintes valores: $codinstrutor, $nomeinstrutor, $dancainstrutor, $salarioinstrutor, $qtdeaula, $tipo, $individual, $noturna, $integral, $tiposal<br>";

        $sqlInsert = "INSERT INTO Instrutor (Cod_Instrutor,Nome_Instrutor,Danca_Instrutor, Salario_Instrutor, QtdedeAula, Tipo_Instrutor,Aula_Individual,Aula_Noturna,Aula_Integral,Tipo_Salario) values ('$codinstrutor', '$nomeinstrutor', '$dancainstrutor', '$salarioinstrutor', '$qtdeaula', '$tipo', '$individual', '$noturna', '$integral', '$tiposal');";
        
        
        if(!mysqli_query($conn, $sqlInsert)){
            die("Erro ao inserir as informações do formulário nas tabelas:".mysqli_error($conn));
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados cadastrados com sucesso!')
            window.location.href='cadastrarInstrutor.php'</script>";
        }
        break;
    case 'montar':
        $id = $_GET['id'];
        $sql = 'SELECT * FROM Instrutor WHERE Cod_Instrutor ='.$id;
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
        
        //montando formulário
        echo "<form method='post' name='dados' action='crudInstrutor.php?acao=atualizar' onSubmit='return enviardados();'>";
        echo "<table width='588' border='0' align='center'>";
        
        
        while($registro = mysqli_fetch_array($resultado)){
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Número do Instrutor</font></td>";
            echo "      <td width='460'>";
            echo "     <input name='codinstrutor' type='text' class='formbutton' id='codinstrutor' size='5' maxlength='10' value=" . $id. " readonly>";
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Nome do Instrutor</font></td>";
            echo "      <td width='460'>";
            echo "     <textarea name='nomeinstrutor' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Nome_Instrutor'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Dança do Instrutor:</font></td>";
            echo "      <td width='460'>";
            echo "     <textarea name='dancainstrutor' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Danca_Instrutor'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Salário do Instrutor:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='salarioinstrutor' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Salario_Instrutor'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Quantidade de aulas dadas:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='qtdeaula' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['QtdedeAula'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Tipo de Instrutor:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='tipo' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Tipo_Instrutor'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Aula Individual:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='individual' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Aula_Individual'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Aula Noturna:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='noturna' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Aula_Noturna'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Aula Integral:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='integral' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Aula_Integral'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";

            
            echo "    <tr>";
            echo "    <td width='118'><font size='1' face='Verdana, Arial, Helvetica,sans-serif'>Tipo do Salário:</font></td>";
            echo "      <td width='460'>";
             echo "     <textarea name='tiposal' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Tipo_Salario'])."</textarea>" ;
            echo "      </td>";
            echo "      </tr>";
            
            
            echo "    <tr>";
            echo "    <td height='22'></td>";
            echo "      <td>";
            echo "<input name='Submit' type='submit' class='formobjects' value='Atualizar'>";
            echo "<button class='formobjects' type='submit' formaction='crudInstrutor.php?acao=selecionar'>Selecionar</button>";
            echo " <input name='Reset' type='reset' class='formobjects' value='Limpar campos'>";
            echo "      </td>";
            echo "      </tr>";
            
            
            echo "</table>";
            echo "</form>";
            
        };
        
        mysqli_close($conn);
        break;
    case 'atualizar':
        $codinstrutor = $_POST['codinstrutor'];
        $nomeinstrutor = $_POST['nomeinstrutor'];
        $dancainstrutor = $_POST['dancainstrutor'];
        $salarioinstrutor = $_POST['salarioinstrutor'];
        $qtdeaula = $_POST['qtdeaula'];
        $tipo = $_POST['tipo'];
        $individual = $_POST['individual'];
        $noturna = $_POST['noturna'];
        $integral = $_POST['integral'];
        $tiposal = $_POST['tiposal'];
        
        $sql = "UPDATE Instrutor SET Nome_Instrutor = '".$nomeinstrutor."',Danca_Instrutor ='".$dancainstrutor."',Salario_Instrutor ='".$salarioinstrutor."',QtdedeAula='".$qtdeaula."',Tipo_Instrutor ='".$tipo."',Aula_Individual ='".$individual."',Aula_Noturna ='".$noturna."',Aula_Integral ='".$integral."',Tipo_Salario ='".$tiposal."'WHERE Cod_Instrutor='".$codinstrutor."'";
        
        if(!mysqli_query($conn, $sql)){
            die('</br>Erro no comando SQL UPDATE'.mysqli_error($conn));
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizado com sucesso!')
            window.location.href='crudInstrutor.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        
        break;
    case 'deletar':
        $sql = "DELETE FROM Instrutor WHERE Cod_Instrutor = '" . $id . "'";

        if(!mysqli_query($conn, $sql)){
            die('Error: ' . mysqli_error($conn));
        } else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados excluídos com sucesso!')
        window.location.href='crudInstrutor.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        header("Locatio:crudInstrutor.php?acao=selecionar");
        break;
    case 'selecionar':

        echo "<meta charset='UTF-8'>";
        echo "<center><table border=1>";
        echo "<tr>";
        echo "<th>Cod_Instrutor</th>";
        echo "<th>Nome_Instrutor</th>";
        echo "<th>Danca_Instrutor</th>";
        echo "<th>Salario_Instrutor</th>";
        echo "<th>Qtde_AulasDadas</th>";
        echo "<th>Tipo_Instrutor</th>";
        echo "<th>Aula_Individual</th>";
        echo "<th>Aula_Noturna</th>";
        echo "<th>Aula_Integral</th>";
        echo "<th>Tipo_Salario</th>";
        echo "</tr>";
    
        $sql = "SELECT * FROM Instrutor";
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
    
        echo "<CENTER>Registros cadastrados na base de dados.<br/></CENTER>";
        echo "</br>";
    
        while($registro = mysqli_fetch_array($resultado)){
            $codinstrutor = $registro['Cod_Instrutor'];
            $nomeinstrutor = $registro['Nome_Instrutor'];
            $dancainstrutor = $registro['Danca_Instrutor'];
            $salarioinstrutor = $registro['Salario_Instrutor'];
            $qtdeaula = $registro['QtdedeAula'];
            $tipo = $registro['Tipo_Instrutor'];
            $individual = $registro['Aula_Individual'];
            $noturna = $registro['Aula_Noturna'];
            $integral = $registro['Aula_Integral'];
            $tiposal = $registro['Tipo_Salario'];
    
            echo "<tr>";
            echo "<td>" . $codinstrutor . "</td>";
            echo "<td>" . $nomeinstrutor . "</td>";
            echo "<td>" . $dancainstrutor . "</td>";
            echo "<td>" . $salarioinstrutor . "</td>";
            echo "<td>" . $qtdeaula . "</td>";
            echo "<td>" . $tipo . "</td>";
            echo "<td>" . $individual . "</td>";
            echo "<td>" . $noturna . "</td>";
            echo "<td>" . $integral . "</td>";
            echo "<td>" . $tiposal . "</td>";
            echo "<td><a href='crudInstrutor.php?acao=deletar&id=$codinstrutor'><img src='delete.png' alt='Deletar' title='Deletar registro'></a><a href='crudInstrutor.php?acao=montar&id=$codinstrutor'><img src='update.png' alt='Atualizar' title='Atualizar registro'></a><a href='cadastrarInstrutor.php'><img src='insert.png' alt='Inserir' title='Inserir registro'></a>";
    
            echo "<tr>";
        }
        mysqli_close($conn);
        break;
    default:
        header("Location:crudInstrutor.php?acao=selecionar");
        break;
}

?>