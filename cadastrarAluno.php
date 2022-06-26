<!DOCTYPE html>
<html lang="pt">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CRUD</title>
</head>

<body>

   <form method="post" action="crudAluno.php?acao=inserir" name="dados" onSubmit="return enviardados();">

      <table width="588" border="0" align="center">
         
         <tr>
            <td width="118">
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Número de matrícula:</font>
            </td>
            <td width="460">
               <input name="nrmatricula" type="number" class="formbutton" id="nrmatricula" size="52" maxlength="150">
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome do aluno:</font>
            </td>
            <td>
               <font size="2">
                  <input name="nomealuno" type="text" id="nomealuno" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Idade:</font>
            </td>
            <td>
               <font size="2">
                  <input name="idadealuno" type="number" id="idadealuno" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sexo:</font>
            </td>
            <td>
               <font size="2">
                  <input name="sexo-aluno" type="text" id="sexo-aluno" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>
         
            <td height="85">
               <p><strong>
                     <font face="Verdana, Arial, Helvetica, sans-serif">
                        <font size="1">
                        </font>
                     </font>
                  </strong></p>
            </td>
         </tr>
         <tr>
            <td height="22"></td>
            <td>
               <button class="waves-effect waves-light btn" type="submit" name="action" formaction="inicial.php">Voltar a tela inicial</button>
               <input name="Submit" type="submit" class="formobjects" value="Cadastrar">
               <input name="Reset" type="reset" class="formobjects" value="Limpar campos">
               <button class="waves-effect waves-light btn" type="submit" name="action" formaction="crudAluno.php?acao=selecionar">Visualizar tabela de Aluno</button>
               <!--<button type='submit' formaction='pegar.php'>Consultar</button>-->
            </td>
         </tr>
      </table>
   </form>
</body>

</html>