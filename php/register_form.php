<?php

@include '../php/config.php';


if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];


    $select = "SELECT * FROM user_form  WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result)>0) {
  $error[] = 'user already exists!';
 }
    else
    {
        if($pass != $cpass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT  INTO  user_form (name,email,password ,user_type	) VALUES ('$name', '$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:../php/login_form.php');
        }
    }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Form </title>
    <link rel="stylesheet" href="../css/library.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="form-container">
    <form action="" method="post">
        <h3>Register now</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            }
        };
        ?>
        <input type="text" name="name" required placeholder="enter your name">
        <input type="email" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password" name="cpassword" required placeholder="confirm your password">
     <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
     </select>
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p>Already have an account? <a href="login_form.php">login now</a></p>



    </form>
</div>
</body>
</html>
