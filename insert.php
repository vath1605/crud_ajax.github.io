<?php 
    if(isset($_POST['scope'])){
        include 'db.php';
        $name = $_POST['name'];
        $title = $_POST['title'];
        $discount = $_POST['discount'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $des = $_POST['des'];
        $total = $_POST['total'];
        $pay = $_POST['pay'];
        
        if($name != '' && $title != '' && $discount != '' && $price != '' && $qty != '' && $total != '' && $pay != ''){
            $query_insert = "INSERT INTO tbl_product(name,title,description,price,qty,dis,total,pay) VALUES (
                '$name',
                '$title',
                '$des',
                '$price',
                '$qty',
                '$discount',
                '$total',
                '$pay'
            )";
            try {
                $query_insert_run = mysqli_query($conn,$query_insert);
                if($query_insert_run){
                    echo 168;
                }
            } catch (mysqli_sql_exception $e) {
                echo $e->getMessage();
            }
        }else{
            echo 101;
        }
        
    }
?>