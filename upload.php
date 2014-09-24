<?php
    include 'configuration.php';

    $tmp_file_name = $_FILES['Filedata']['tmp_name'];
    $file_name = $_FILES['Filedata']['name'];

    if(isset($_GET['news']))
    {
        $path = $image_news_path;
    }
    else
    {
        $path = $image_libro_path;
    }

    if(move_uploaded_file($tmp_file_name, $path.$file_name))
    {
      echo $file_name;
    }
    else
    {
        echo "L'upload non è andato a buon fine.";
    }