<?php
$host="localhost";
$user="root";
$password="";
$db="user";
session_start();

$data = mysqli_connect($host, $user, $password, $db);
if($data===false)
{
    die("connection error");
}
if($_SERVER["REQUEST_METHOD"]=="POST" ){
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "select * from login where username='".$username."' and password='".$password."' 
";
$result = mysqli_query($data, $sql);
$row = mysqli_fetch_array($result);
if($row["usertype"]=="user"){

    $_SESSION["username"]=$username;
    header("location:userhome.php");
}

elseif($row["usertype"]=="admin"){
    $_SESSION["username"] = $username;
    header("location:adminhome.php");
}

else{

    echo "username or password incorrect";
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    input {
        width: 200px;
        height: 30px;
    }
</style>

<body>

    <center>
        <h1>Login Form</h1>
        <br><br>
        <div style="background-color:grey; width:500px; height:500px; font-size:40px;">
            <br><br><br><br>

            <form action="#" method="POST">
                <div>
                    <label>username</label>
                    <input type="text" name="username" required>
                </div>
                <br>
                <div>
                    <label>password</label>
                    <input type="password" name="password" required>
                </div>
                <br>
                <div>
                    <input type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>
    </center>
</body>

</html>