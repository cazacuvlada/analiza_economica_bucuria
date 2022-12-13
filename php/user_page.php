<?php

@include '../php/config.php';
session_start();
if(!isset($_SESSION['user_name'])){
    header('location:../php/login_form.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User page</title>

    <link rel="stylesheet" href="../css/library.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div  class="container">
<h1>Analiza Economica S.A."Bucuria"</h1>
<div class="content">
    <h3>Hi,<span>User</span></h3>
    <h2>Welcome<span>
            <?php
            echo $_SESSION['user_name'];
            ?>
        </span></h2>
    <p>This is user page</p>

    <a href="../php/logout.php" class="btn">logout</a>
</div>
</div>
<div class="wrapper">
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
        <li><a href="../menu/analiza_cheltuielilor.php" class="btn" >Analiza cheltuielilor</a></li>
            <li><a href="../menu/analiza_profitului.php" class="btn" >Analiza profitului aferent cifrei de afaceri</a></li>
            <li><a href="../menu/gradul_critic.php" class="btn" >Gradul critic de utilizare a capacitatii de productie</a></li>
            <li><a href="../menu/faliment.php" class="btn" >Probabilitatea de faliment</a></li>
            <li><a href="../menu/indicatori_valorici.php" class="btn" >Indicatori valorici</a></li>
        </ul>
    </div>
</div>

</body>
</html>