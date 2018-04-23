<?php

    require("sanifica.php");
        //se secondo accesso prendo i dati dal form
            if (isset($_POST['send_file'])) {
                
                $ftp_server = pulisciClient($_POST['ftp_server']);
                $username = pulisciClient($_POST['username']);
                $password = pulisciClient($_POST['password']);
                
                
                $porta = $_POST['port'];
                
                if(checkDefault($ftp_server, 'ftp_server')&& checkDefault($username, 'username')&&checkDefault($password,'password'))
                {
                     if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                                      $file = $_FILES['file']['tmp_name']; //nome file con percorso assoluto
                                      $new_file = $_FILES['file']['name']; //nome file senza percorso
                                      
                                      //apertura connessione ftp
                                      $conn = ftp_connect($ftp_server, $porta) or die ('Impossibile connettersi al server');
                                      ftp_login($conn, $username, $password) or die ('username o password errati');
                                      ftp_pasv($conn, true);
                                      
                                      //upload del file
                                      $invia = ftp_put($conn, $new_file, $file, FTP_BINARY);
                                      echo (!$invia) ? 'Upload fallito' : 'upload completato';
                                      
                                      //chiusura connessione
                                      ftp_close($conn);
                                      }
                                        else
                                      {
                                        echo "<b>Inserire il file</b>";
                                      }
                }
                else
                {
                    echo "<h1> Hai lasciato dei dati di default</h1>";
                }
                
            }

