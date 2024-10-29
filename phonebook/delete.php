<?php
    include "db.php";

    if (isset($GET["id"])){
        $id = $_GET["id"];

        $sql="DELETE FROM contacts WHERE id=$id";
        if ($conn->query($sql)===TRUE){
            echo "Contact succesfully deleted!";
        }
        else{
            echo "Error deleting record." . $sql / "<br>". $conn->error;
        }
    }

    header("location: index.php");
?>