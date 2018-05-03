<?php

class Uploader{
    
    private $ftp_server,$username,$password,$porta;
    
    public function __construct($servername,$user,$pass,$port)
    {
        $this->ftp_server = $servername;
        $this->username = $user;
        $this->password = $pass;
        $this->porta = $port;
    }
    
    public function sanifica()
    {
        if(checkDefault($this->ftp_server, 'ftp_server')&& checkDefault($this->username, 'username')&&checkDefault($this->password,'password'))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function upload()
    {
        if ($this->sanifica()==true) {
                                      $file = $_FILES['file']['tmp_name']; //nome file con percorso assoluto
                                      $new_file = $_FILES['file']['name']; //nome file senza percorso
                                      
                                      //apertura connessione ftp
                                      $conn = ftp_connect($this->ftp_server, $this->porta) or die ('Impossibile connettersi al server');
                                      ftp_login($conn, $this->username, $this->password) or die ('username o password errati');
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
    
}



