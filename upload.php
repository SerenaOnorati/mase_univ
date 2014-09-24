<?php
    $tmp_file_name = $_FILES['Filedata']['tmp_name'];
    $file_name = $_FILES['Filedata']['name'];

    if(move_uploaded_file($tmp_file_name, 'upload/images/news/'.$file_name))
    {
      echo $file_name;
    }
    else
    {
        echo "L'upload non è andato a buon fine.";
    }