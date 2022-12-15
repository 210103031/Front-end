<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

            $user_id = random_num(20);
            $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;

        } else {
            echo "Please enter some valid information!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <style type="text/css">
	
	* {
        margin: 0px;
        padding: 0px;
    }

	.text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		width: 100%;
        height: 50px;
		color: black;
        background-color: white;
		border: solid green;
	}

	#box{
		margin-left: auto;
        margin-right: auto;
		width: 50%;
		padding: 20px;
	}

    h1 {
        margin-bottom: 20px
    }

	</style>

    <div id="box">
        <form method="post">
            <h1>SignUp</h1>
            <input type="text" name = "user_name" class = "text"> <br><br>
            <input type="password" name = "password" class = "text"> <br><br>
            <input type="submit" value= "SignUp" id = "button"> <br><br>
            <a href="login.php">Click to login</a>
        </form>
    </div>
</body>
</html>