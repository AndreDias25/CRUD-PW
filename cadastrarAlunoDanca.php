<!DOCTYPE html>
<html lang="pt">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CRUD</title>
</head>

<body>

   <form method="post" action="crudAlunoDanca.php?acao=inserir" name="dados" onSubmit="return enviardados();">

      <table width="588" border="0" align="center">
         
         <tr>
            <td width="118">
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Número da dança:</font>
            </td>
            <td width="460">
               <input name="coddanca" type="number" class="formbutton" id="coddanca" size="52" maxlength="150">
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Número de matrícula do Aluno:</font>
            </td>
            <td>
               <font size="2">
                  <input name="nrmatricula" type="number" id="nrmatricula" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Participa de aula:</font>
            </td>
            <td>
               <font size="2">
                  <input name="participaaula" type="text" id="participaaula" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Quantidade de aulas participadas:</font>
            </td>
            <td>
               <font size="2">
                  <input name="qtdeaulasparticipadas" type="number" id="qtdeaulasparticipadas" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Participa de turma:</font>
            </td>
            <td>
               <font size="2">
                  <input name="participaturma" type="text" id="participaturma" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Quantidade de turmas que participa:</font>
            </td>
            <td>
               <font size="2">
                  <input name="qtdeturmaparticipada" type="number" id="qtdeturmaparticipada" size="52" maxlength="150" class="formbutton">
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
               <button class="waves-effect waves-light btn" type="submit" name="action" formaction="crudAlunoDanca.php?acao=selecionar">Visualizar tabela de alunos e danças</button>
               <!--<button type='submit' formaction='pegar.php'>Consultar</button>-->
            </td>
         </tr>
      </table>
   </form>
</body>

</html>