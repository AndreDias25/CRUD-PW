<!DOCTYPE html>
<html lang="pt">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CRUD</title>
</head>

<body>

   <form method="post" action="crudInstrutor.php?acao=inserir" name="dados" onSubmit="return enviardados();">

      <table width="588" border="0" align="center">
         
         <tr>
            <td width="118">
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Número do Instrutor:</font>
            </td>
            <td width="460">
               <input name="codinstrutor" type="number" class="formbutton" id="codinstrutor" size="52" maxlength="150">
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome do Instrutor:</font>
            </td>
            <td>
               <font size="2">
                  <input name="nomeinstrutor" type="text" id="nomeinstrutor" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Dança do Instrutor:</font>
            </td>
            <td>
               <font size="2">
                  <input name="dancainstrutor" type="text" id="dancainstrutor" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Salário do Instrutor:</font>
            </td>
            <td>
               <font size="2">
                  <input name="salarioinstrutor" type="number" id="salarioinstrutor" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Quantidade de aulas dadas:</font>
            </td>
            <td>
               <font size="2">
                  <input name="qtdeaula" type="number" id="qtdeaula" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Tipo de instrutor:</font>
            </td>
            <td>
               <font size="2">
                  <input name="tipo" type="text" id="tipo" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         
         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Aula individual:</font>
            </td>
            <td>
               <font size="2">
                  <input name="individual" type="text" id="individual" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         
         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Aula noturna:</font>
            </td>
            <td>
               <font size="2">
                  <input name="noturna" type="text" id="noturna" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         
         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Aula integral:</font>
            </td>
            <td>
               <font size="2">
                  <input name="integral" type="text" id="integral" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Tipo salário:</font>
            </td>
            <td>
               <font size="2">
                  <input name="tiposal" type="text" id="tiposal" size="52" maxlength="150" class="formbutton">
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
               <button class="waves-effect waves-light btn" type="submit" name="action" formaction="crudInstrutor.php?acao=selecionar">Visualizar tabela de Instrutor</button>
               <!--<button type='submit' formaction='pegar.php'>Consultar</button>-->
            </td>
         </tr>
      </table>
   </form>
</body>

</html>