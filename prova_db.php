<html>
<head>
    <title>Universitalia S.r.l</title>
</head>
<body>

    <?php
    /**
     * Created by PhpStorm.
     * User: Serena Onorati
     * Date: 20/08/14
     * Time: 10.28
     */
    include("configuration.php");

    try
    {
        echo "sto tentando di connettermi<br>";
        $pdo = new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_psw);
        echo 'connesso';

    }
    catch (PDOException $e)
    {
        $output = 'impossibile connettersi al db';
        echo $e->getMessage();
        exit();
    }
    ?>
</body>
</html>