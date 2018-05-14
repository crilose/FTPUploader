<?php

class FTPClass{
private $file;
private $new_file;
private $conn;
                                      
            function __construct($filen, $filen1)
            {
                $this->file = $filen;
                $this->new_file = $filen1;
            }
            
            function connect($servname,$porta,$usrname,$pasw)
            {
                //apertura connessione ftp
                $this->conn = ftp_connect($servname, $porta) or die ('Impossibile connettersi al server');
                ftp_login($this->conn, $usrname, $pasw) or die ('username o password errati');
                ftp_pasv($this->conn, true);
            }
            
            function upload()
            {
                //upload del file
                $invia = ftp_put($this->conn, $this>new_file, $this->file, FTP_BINARY);
                echo (!$invia) ? 'Upload fallito' : 'upload completato';
            }
            
            function disconnect()
            {
                //chiusura connessione
                ftp_close($this->conn);
            }
}