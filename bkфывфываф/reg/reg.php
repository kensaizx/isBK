<?php
@include("registration2/block/connect.php");
    $error = "";
    $message = "";
    if (isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["username"])) {
        if ($_POST["email"] != "") {
            $email = $_POST["email"];
        } else {
            $error = "Вы не ввели логин <br>";
        }
         if ($_POST["pass"] != "") {
            $password = $_POST["pass"];
        } else {
            $error .= "Вы не ввели пароль <br>";
        }
        if ($_POST["username"] != "") {
            $username = $_POST["username"];
        } else {
            $error .= "Вы не ввели имя пользователя <br>";
        }
        $sql = $connect -> query("SELECT * FROM `bkBD` WHERE `email` = '$email'");
        $myTable = mysqli_fetch_array($sql);
        if ($myTable) {
            $error .= "Данный пользователь есть в базе данных";
        } else {
            if ($error == "") {
                $sql = $connect -> query("INSERT `bkBD` (`email`, `pass`, `username`) VALUES ('$email', '$password', '$username');");
                $message = "Вы успешно зарегистрировались";   
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reg.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body>
    <div class="container">
        <div class="mainBlock">
            <div class="leftSideBlock">
                <img src="imgs/leftSide.png" alt="#">
            </div>
            <div class="rightSideBlock">
                <form action="" class="form">
                    <h1 class = "title">Регистрация</h1>
                    <input type="email" name="email" id="floatingEmail" placeholder="Введите e-mail" class = "Input">
                    <input type="text" name="username" id="floatingUsername" placeholder="Введите имя" class = "Input">
                    <input type="password" name="pass" id="floatingPassword" placeholder="Введите пароль" class = "Input">
                    <button class = "buttonInput" type="submit" style = "width: 350px;">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
    <style>
        * {
	padding: 0px;
	margin: 0px;
	border: none;
}

*,
*::before,
*::after {
	box-sizing: border-box;
}

/* Links */

a, a:link, a:visited  {
    /* color: inherit; */
    text-decoration: none;
    /* display: inline-block; */
}

a:hover  {
    /* color: inherit; */
    text-decoration: none;
}

/* Common */

aside, nav, footer, header, section, main {
	display: block;
}

h1, h2, h3, h4, h5, h6, p {
    font-size: inherit;
	font-weight: inherit;
}

ul, ul li {
	list-style: none;
}

img {
	vertical-align: top;
}

img, svg {
	max-width: 100%;
	height: auto;
}

address {
  font-style: normal;
}

/* Form */

input, textarea, button, select {
	font-family: inherit;
    font-size: inherit;
    color: inherit;
    background-color: transparent;
}

input::-ms-clear {
	display: none;
}

button, input[type="submit"] {
    display: inline-block;
    box-shadow: none;
    background-color: transparent;
    background: none;
    cursor: pointer;
}

input:focus, input:active,
button:focus, button:active {
    outline: none;
}

button::-moz-focus-inner {
	padding: 0;
	border: 0;
}

label {
	cursor: pointer;
}

legend {
	display: block;
}

body{
    font-family: 'Rubik', sans-serif;
}

.container
{
     /* border: solid #502314 4px; */
     margin: 0 auto;
}

.leftSideBlock
{
    width: 1030px;
}

img
{
    height: 100%;
}

.mainBlock
{
    display: flex;
}

.title{
    font-family: 'Rubik';
    font-style: normal;
    font-weight: 400;
    font-size: 40px;
    line-height: 47px;
    color: #502314;
    padding-bottom: 53px;
    text-align: center;
}


.rightSideBlock
{
    display: flex;
    flex-direction: column;
    width: 440px;
    justify-content: center;
}
.form{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    max-width: 536px;
}
.Input
{
    /* width: 536px; */
    width: 100%;
    height: 48px;
    background: #FFFFFF;
    border: 1px solid #502314;
    border-radius: 10px;
    padding: 10px 20px;
    font-family: 'Rubik';
    font-style: normal;
    font-weight: 300;
    font-size: 20px;
    line-height: 30px;
    color: rgba(0, 0, 0, 0.44);
}

.Input
{
    margin-bottom: 33px;
}
.buttonInput{
    width: 350px;
    height: 50px;
    border: 1px solid #502314;
    border-radius: 5px;
    font-family: 'Rubik';
    font-style: normal;
    font-weight: 400;
    font-size: 28px;
    line-height: 38px;
    color: #886C69;
    margin: 40px 0;
    cursor: pointer;
}
.passLink, .regLink{
    font-family: 'Rubik';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    line-height: 24px;
    color: #886C69;
}
.test{
    text-decoration: underline;
    margin-bottom: 7px;
}
body{
    overflow: hidden;
}
    </style>
</body>
<?php
    if ($error != "") {
        echo "
        <div class='alert alert-danger mt-3' role='alert'>
             $error
        </div>
        ";
    }
    if ($message != "") {
        echo "
        <div class='alert alert-success mt-3' role='alert'>
             $message
        </div>
        ";
    }
?>
</html>