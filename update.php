<?php

    function updateRecord(){

        $severname = 'localhost';
        $username = 'root';
        $password = '';
        $databasename = 'movieflix_database';

        //Create connection to database

        $connection = mysqli_connect($severname, $username, $password, $databasename);

        //Storing user inputs into variables

        $id = $_POST['update-id'];
        $movieTitle = $_POST['update-title'];
        $movieGenre = $_POST['update-genre'];
        $movieDirector = $_POST['update-director'];

        //SQL Update Query

        $sql = "UPDATE movieflix_table SET title='$movieTitle', genre='$movieGenre', director='$movieDirector' WHERE id='$id'";
        $updateQuery = mysqli_query($connection, $sql); //Excuted sql query

        if(!$updateQuery){
            echo 'Error :' .$sql.mysqli_error($connection);
        }

        //Close connection
        mysqli_close($connection);

        //Re-direct to main page
        header('location: index.php'); 

    }

    if(isset($_POST['update-button'])){
        updateRecord();
    }
?>