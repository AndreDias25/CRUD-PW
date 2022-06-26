<!DOCTYPE html>
<html lang="pt">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CRUD</title>
</head>

<body>

   <form method="post" action="crudDanca.php?acao=inserir" name="dados" onSubmit="return enviardados();">

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
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome da dança:</font>
            </td>
            <td>
               <font size="2">
                  <input name="nomedanca" type="text" id="nomedanca" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Tipo da dança:</font>
            </td>
            <td>
               <font size="2">
                  <input name="dancatipo" type="text" id="dancatipo" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Período da aula:</font>
            </td>
            <td>
               <font size="2">
                  <input name="periodo" type="text" id="periodo" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Tipo da aula:</font>
            </td>
            <td>
               <font size="2">
                  <input name="tipoaula" type="text" id="tipoaula" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Horário:</font>
            </td>
            <td>
               <font size="2">
                  <input name="horario" type="time" id="horario" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         
         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Quantidade de aula por semana:</font>
            </td>
            <td>
               <font size="2">
                  <input name="qtdesemana" type="number" id="qtdesemana" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Código do Instrutor:</font>
            </td>
            <td>
               <font size="2">
                  <input name="codinstrutor" type="number" id="codinstrutor" size="52" maxlength="150" class="formbutton">
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
               <button class="waves-effect waves-light btn" type="submit" name="action" formaction="crudDanca.php?acao=selecionar">Visualizar tabela de Dança</button>
               <!--<button type='submit' formaction='pegar.php'>Consultar</button>-->
            </td>
         </tr>
      </table>
   </form>
</body>

</html>