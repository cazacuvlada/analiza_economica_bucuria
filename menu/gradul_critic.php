<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin page</title>

    <link rel="stylesheet" href="../css/library.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="home-btn">
    <a href="../php/admin_page.php">Analiza Economica S.A."Bucuria"</a>
</div>
<div class="container_2 my-5">
    <h2 style="text-align:center;"  >Gradul Critic</h2>
    <a  style="color:white;background-color:lightslategray; position:relative; left:6vh;"  class="btn btn-primary" href="../php/create_grad_critic.php" role="button">New Row</a>
    <br>
    <table class="new_row">
        <thead>
        <tr>
            <th>Id</th>
            <th>Indicatori</th>
            <th>Produse A</th>
            <th>Produse B</th>
            <th>Produse C</th>
            <th>Total</th>
           
           
        </tr>
        </thead>
        <tbody>
        <?php

        @include '../php/config.php';
        //check connection to db
        if($conn->connect_error){
            die("Connection failed:".$conn->connect_error);
        }
        //read all row from db table
        $sql = "SELECT * FROM gradul_critic";
        $result =mysqli_query($conn,$sql);
        if(!$result){
            die("Invalid query:".$conn->error);
        }
        //read data of each row
        while($row = $result->fetch_assoc()){
            echo " <tr>
           <td>$row[id]</td>
            <td>$row[indicatori]</td>
            <td>$row[produse_A]</td>
            <td>$row[produse_B]</td>
            <td>$row[produse_C]</td>
            <td>$row[total]</td>
           
            <td>
                <a style='color:white;background-color:lightslategray;' class= 'btn btn-primary  btn-sm' href='../php/edit_book.php?id=$row[id]'>Edit</a>
                <a  style='color:white;background-color:lightslategray;' class= 'btn btn-danger btn-sm' href='../php/delete_book.php?id = $row[id]'>Delete</a>
                </td>
           </tr>";
           }
        ?>

        </tbody>
    </table>


</div>
</body>
</html>
