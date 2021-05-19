<?php

    function deleteRecord(){

        $severname = 'localhost';
        $username = 'root';
        $password = '';
        $databasename = 'movieflix_database';

        //Create connection to database

        $connection = mysqli_connect($severname, $username, $password, $databasename);

        //Storing user inputs into variables
        $id = $_POST['delete-id'];

        //SQL Update Query
        $sql = "DELETE FROM movieflix_database WHERE id='$id'";
        $deleteQuery = mysqli_query($connection, $sql); //Excuted sql query

        if(!$deleteQuery){
            echo 'Error :'.$sql.mysqli_error($connection);
        }

        //Close connection
        mysqli_close($connection);

        //Re-direct to main page
        header('location: index.php'); 

    }

    if(isset($_POST['delete-button'])){
        deleteRecord();
    }
?>