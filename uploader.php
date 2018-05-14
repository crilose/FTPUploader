<?php
require("FTPClass.php");
class Uploader{
    
    private $ftp_server,$username,$password,$porta;
    
    private $filename;
    private $symfile;
    
    public function __construct($servername,$user,$pass,$port)
    {
        $this->ftp_server = $servername;
        $this->username = $user;
        $this->password = $pass;
        $this->porta = $port;
    }
    
    public function getFileData($file,$sym)
    {
        $this->filename = $file;
        $this->symfile = $sym;
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
        if ($this->sanifica()==false) {
            $fileclass = new FTPClass($this->filename,$this->symfile);
            $fileclass->connect($this->ftp_server,$this->porta,$this->username,$this->password);
            $fileclass->upload();
            $fileclass->disconnect();
        }                         
                
    }
    
}



