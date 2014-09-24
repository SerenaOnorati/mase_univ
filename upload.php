<?php
    $tmp_file_name = $_FILES['Filedata']['tmp_name'];
    $file_name = $_FILES['Filedata']['name'];
    move_uploaded_file($tmp_file_name, 'upload/images/news/'.$file_name);