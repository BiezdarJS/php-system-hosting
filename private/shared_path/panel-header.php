
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        html {
            font-family: 'Montserrat', sans-serif;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 50px auto;
        }
        .new-admin {
            display: block;
            padding: 25px 0;
        }
        table {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        thead {
            background: #000;
            color: #fff;
        }
        tbody {
            background-color: #999;
        }
        td {
            border: 1px solid #000;
            padding: 10px;
        }
        dt, dd {
            display: inline-block;
        }
        dt {
            width: 80px;
        }
        * {
            box-sizing: border-box;
        }
        header {
            background-color: #555;
            color: #fff;
            padding: 20px 0;
        }
        header h1 {
            padding: 0 0 15px;
            text-align: center;
        }
        .header-misc {
            text-align: center;
        }
        .logout-link {
            color: #ffffff;
            display: block;
            text-decoration: none;
        }
        .login-form {
            border: 1px solid #000;
            width: 100%;
            max-width: 300px;
            padding: 20px;
            margin: 20px auto;
            text-align: center;
        }
        .error-list {
            list-style-type: none;
            margin: 0;
            padding: 10px 0 0;
        }
        .errors {
            padding: 10px;
            border: 2px solid #f00;
            margin: 0 0 20px;            
        }
        .password {
            padding: 10px;
            border: 2px solid orange;
            margin: 20px 0 0;
        }
        .o-list {
            list-style-type: none;
            padding: 0;
        }
        .center {
            text-align: center;
        }
        .menu li a {
            display: inline-block;
            padding: 0 5px;
            color: #fff;
            font-weight: 900;
            text-decoration: none;
        }
        .form_new {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

    </style>
</head>
<header>
        <h1>Panel Admina</h1>
                <?php if ($session->is_logged_in()) { ?>
        <div class="header-misc">
            <p>User: <?php if($_SESSION) { echo $_SESSION['username']; } ?></p>
            <a class="logout-link" href="<?php echo url_for('/wyloguj'); ?>">Wyloguj się</a>
        </div>
        <ul class="o-list center menu">
            <li>
                <a href="/domeny">Domeny</a>
            </li>
            <li>
                <a href="/serwery">Serwery</a>
            </li>            
        </ul>
        <?php } ?>
</header>
<body>

