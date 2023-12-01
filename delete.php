<?php

    include "conn.php";
    
    $id= $_GET['delete'];

    $sql = "DELETE FROM client WHERE ID='$id'";

    if($conn->query($sql)){
        $_SESSION['success']="Successfully Deleted";
    }else{
        $_SESSION['error']="No record Deleted";
    }

    header("location:index.php")
?>