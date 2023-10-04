<?php 

    // get data from input 'title'
    if(isset($_POST['id'])){
        // connect to page for db
        require '../db_conn.php';

        $id = $_POST['id'];
        

        //if the column is empty then send to page 'index.php' with 'error' message
        //else SAVE data
        if(empty($id)){
            echo 0;
        }else{
            $stmt = $conn->prepare("DELETE FROM todos WHERE id =? ");
            $res = $stmt ->execute([$id]);

            //if data available send to page 'index.php(url) with 'success' message
            if($res){
                echo 1;
            }else{
                echo 0;
            }

            //close connection
            $conn = null;
            exit();
        }
    }else{
        header("Location: ../index.php?mess=error");
    }
?>