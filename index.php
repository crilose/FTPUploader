<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload file - versione base</title>
    </head>
    <body>
        <!-- form html e tabella -->
        <form enctype="multipart/form-data" name = "modulo_ftp" action="carica.php" method="POST">
              <table>
                  <tr><td>Server FTP</td><td><input type="text" name="ftp_server" value="ftp_server" required/></td></tr>
                  <tr><td>Porta</td><td><input type="text" name="port" value="21" required readonly/></td></tr>
                  <tr><td>Username</td><td><input type="text" name="username" value="username" required/></td></tr>
                  <tr><td>Password</td><td><input type="password" name="password" value="password" required/></td></tr>
                  <tr><td>File</td><td><input type="file" name="file" required/></td></tr>
                  <tr><td><input type="submit" name="send_file" value="Carica file" required/></td>
              </table> 
        </form>
    </body>
</html>
