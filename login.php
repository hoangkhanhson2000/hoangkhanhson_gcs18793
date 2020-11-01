<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
   <body>
      <h3 style="text-align: center;">LOGIN</h3>
      
      <form id="frm-login">
         <table style="margin-left: auto; margin-right: auto;">
            <tr>
               <td>Username:</td>
               <td><input type="email" name="username" id="username" required></td>
            </tr>

            <tr>
               <td>Password:</td>
               <td><input type="password" name="password" id="password" required></td>
            </tr>

            <tr style="text-align: center;">
               <td colspan="2">
                  <br>
                  <input type="submit" value="Login">
               </td>
            </tr>
         </table>
      </form>

      <p style="text-align: center;">Don't have an account? Click <a href="create_account.php" rel="external">here</a> to create an account.</p>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="js/index.js"></script>
   </body>
</html>
