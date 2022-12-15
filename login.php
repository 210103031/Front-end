<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        $query = "SELECT * FROM users WHERE user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if($result) {
            if($result && mysqli_num_rows($result) > 0) {

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
        }

    } else {
        echo "wrong username or password";
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

	#text{

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
            <h1>Login</h1>
            <input type="text" name = "user_name" id = "text"> <br><br>
            <input type="password" name = "password" id = "text"> <br><br>
            <input type="submit" value= "Login" id = "button"> <br><br>
            <a href="signup.php">Click to sign up</a>
        </form>
    </div>
</body>
</html>