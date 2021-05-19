<?php

            //Create record function
            function createRecord(){
                
                $severname = 'localhost';
                $username = 'root';
                $password = '';
                $databasename = 'movieflix_database';

                //Create connection to database

                $connection = mysqli_connect($severname, $username, $password, $databasename);

                if(!$connection){
                    die('Connection unsuccessful ;'.mysqli_connect_error());
                }else{
                    echo 'Connection successful';
                }

                //Storing user inputs into variables

                $movieTitle = $_POST['create-title'];
                $movieGenre = $_POST['create-genre'];
                $movieDirector = $_POST['create-director'];

                //SQL insert query

                $sql = "INSERT INTO movieflix_table (title, genre, director) VALUES ('$movieTitle','$movieGenre','$movieDirector')";
                
                if(mysqli_query($connection, $sql)){
                    echo '';
                }else{
                    echo 'Error :'.$sql.mysqli_error($connection);
                }

                //Close connection
                mysqli_close($connection);

                //Re-direct to main page
                header('location: index.php'); 
            }
            

            if(isset($_POST['create-button'])){
                createRecord();
            }
