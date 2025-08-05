<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP - SAW</title>
    <link href="./assets/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
</head>
<?php
session_start();
if ($_SESSION['status'] != 'login') {
    header('location:./login.php');
}
