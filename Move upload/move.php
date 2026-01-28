<?php
    if(isset($_POST['btnSubmit'])){
        if(!is_dir('upload')){              // condition that set to create upload file if it had it is not create, else it will create
            mkdir('upload', 077, true);
        }
        $file = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];  // tmp_name = name of tmp in drive C or D ....
        $path = 'upload/'.$file;
        move_uploaded_file($tmp_name, $path);
    }
?>