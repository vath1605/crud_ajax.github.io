<?php 
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "dbAjax";

    try {
        $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
?>