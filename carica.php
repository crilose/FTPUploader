<?php

    require("sanifica.php");
    require("uploader.php");
        //se secondo accesso prendo i dati dal form
            if (isset($_POST['send_file'])) {
                
                $servclean = pulisciClient($_POST['ftp_server']);
                $userclean = pulisciClient($_POST['username']);
                $passclean = pulisciClient($_POST['password']);
                $portaclean = $_POST['port'];
                $file1 = $_FILES['file']['tmp_name'];
                $file2 = $_FILES['file']['name'];
                
                $uploader1 = new Uploader($servclean,$userclean,$passclean,$portaclean);
                if(is_uploaded_file($_FILES['file']['tmp_name']))
                {  
                    $uploader1->getFileData($file1, $file2);
                    $uploader1->upload();
                }
                
                
            }

