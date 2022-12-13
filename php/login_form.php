<?php

@include '../php/config.php';
session_start();

if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];


    $select = "SELECT * FROM user_form  WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result)>0) {
    $row = mysqli_fetch_array($result);
    if($row['user_type']=='admin'){
        $_SESSION['admin_name'] = $row['name'];
        header('location:../php/admin_page.php');
    }
    else if
    ($row['user_type']=='user'){

        $_SESSION['user_name'] = $row['name'];
        header('location:../php/user_page.php');
    }
    }
    else{
        $error[]='incorrect email or password';
    }

};
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login Form </title>
        <link rel="stylesheet" href="../css/library.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>

    <div class="form-container">
        <form action="" method="post">
            <h3>Login now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            };
            ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Don't have an account? <a href="register_form.php">Register now</a></p>
            <a style="color:black; font-size:4vh;text-decoration:none;" href="../php/login_form.php">Analiza Economica S.A."Bucuria"</a>
        </form>
    </div>
    </body>
    </html>
<?php
