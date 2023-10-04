<?php 

    // get data from input 'title'
    if(isset($_POST['title'])){
        // connect to page for db
        require '../db_conn.php';

        $title = $_POST['title'];
        

        //if the column is empty then send to page 'index.php' with 'error' message
        //else SAVE data
        if(empty($title)){
            header("Location: ../index.php?mess=error");
        }else{
            $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
            $res = $stmt ->execute([$title]);

            //if data available send to page 'index.php(url) with 'success' message
            if($res){
                header("Location: ../index.php?mess=success");
            }else{
                header("Location: ../index.php");
            }

            //close connection
            $conn = null;
            exit();
        }
    }else{
        header("Location: ../index.php?mess=error");
    }
?>