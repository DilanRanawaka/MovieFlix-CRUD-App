<!DOCTYPE html>
<html>

<head>
    <title>Movieflix CRUD App</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        #create-form,
        #update-form,
        #delete-form {
            display: none;
        }

        .main-div {
            width: 80vw;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }

        table {
            margin: 15px auto;
            width: 50vw;
            text-align: center;
        }

        table tr td {
            padding: 12px;
        }

        .content-wrapper {
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }

        .small-button {
            width: 75px;
            height: 30px;
            background-color: gray;
            color: white;
            border-radius: 2px;
            border: none;
            cursor: pointer;

        }

        input[type="text"] {
            margin: 5px;
            width: 250px;
            height: 30px;
        }
    </style>

</head>

<body>
    <?php
    require_once 'create.php';
    ?>

    <div class="main-div">
        <h2>Movieflix CRUD App</h2>

        <?php
        $severname = 'localhost';
        $username = 'root';
        $password = '';
        $databasename = 'movieflix_database';

        //Create connection to database

        $connection = mysqli_connect($severname, $username, $password, $databasename);

        //Check connection
        if (!$connection) {
            die('Connection Unsuccessful :' . mysqli_connect_error());
        }

        //Query select table records
        $sql = "SELECT * FROM movieflix_table";
        $result = mysqli_query($connection, $sql); //store the result
        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) {
            echo "
                    <table>
                        <thead>
                            <tr>
                                <th>Record ID</th>
                                <th>Title</th>
                                <th>Genre</th>
                                <th>Director </th>
                            </tr>
                        </thead>
                ";
        }
        ?>
        <?php
        while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['genre'] ?></td>
                <td><?php echo $row['director'] ?></td>
            </tr>
        <?php endwhile ?>
        </table>

    </div>

    <div class="content-wrapper">

        <button id="create-button" class="btn btn-info">Create Record</button>
        <button id="update-button" class="btn btn-info">Edit Record</button>
        <button id="delete-button" class="btn btn-info">Delete Record</button>

        <form action="create.php" method="POST" id="create-form">
            <input type="text" placeholder="Enter movie title" name="create-title"> <br>
            <input type="text" placeholder="Enter movie genre" name="create-genre"> <br>
            <input type="text" placeholder="Enter movie director" name="create-director"> <br>
            <input type="submit" value="Save" name="create-button" class="small-button">
        </form>

        <form action="update.php" method="POST" id="update-form">
            <input type="text" placeholder="Enter record id" name="update-id"> <br>
            <input type="text" placeholder="Enter movie title" name="update-title"> <br>
            <input type="text" placeholder="Enter movie genre" name="update-genre"> <br>
            <input type="text" placeholder="Enter movie director" name="update-director"> <br>
            <input type="submit" value="Save" name="update-button" class="small-button">
        </form>

        <form action="delete.php" method="POST" id="delete-form">
            <input type="text" placeholder="Enter record id" name="delete-id"> <br>
            <input type="submit" value="Save" name="delete-button" class="small-button">
        </form>

    </div>

    <script src="script.js"></script>
</body>

</html>