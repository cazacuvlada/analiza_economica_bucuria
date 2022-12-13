
<?php
$activitati="";
$an_curent="";
$programat="";
$realizat="";
$pondere_cheltuieli="";

//create connection

@include '../php/config.php';

$conn = mysqli_connect('localhost','root','','analiz_econom_bucuria');

$errorMessage="";
$successeMessage ="";

if($_SERVER['REQUEST_METHOD']=='POST'){
   
    $activitati=$_POST["activitati"];
    $an_curent=$_POST["an_curent"];
    $programat=$_POST["programat"];
    $realizat=$_POST["realizat"];
    $pondere_cheltuieli=$_POST["pondere_cheltuieli"];
   

    do{
        if(empty($activitati)||empty ($an_curent) ||empty ($programat) || empty ($realizat)||empty ($pondere_cheltuieli)){
            $errorMessage = "All the fields are required";
            break;
        }
       
        //add a new book to DB
        $sql = "INSERT INTO `analiza_cheltuieli`(activitati,an_curent,programat,realizat,pondere_cheltuieli)
        VALUES ('$activitati','$an_curent','$programat,'$realizat','$pondere_cheltuieli')";
        $result = mysqli_query($conn, $sql);
        # or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
        #die(mysqli_error($analiz_econom_bucuria));
        #$result=$conn->query($sql);
        if(!$result){
            $errorMessage = "Invalid query:".$conn->error;
            break;
              }
       

       

        $activitati="";
        $an_curent="";
        $programat="";
        $realizat="";
        $pondere_cheltuieli="";


$successeMessage = "Row added correctly";
header("location:../menu/analiza_cheltuielilor.php");
exit;

    }while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/library.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<title>Create a new row registration </title>
</head>
<body style="font-family: 'Garamond', sans-serif;">
<div class="home-btn">
    <a href="../php/admin_page.php">Analiza Economica S.A."Bucuria"</a>
</div>
<div class="home-btn">
    <a href="../menu/analiza_cheltuielilor.php">Analiza Cheltuieli </a>
</div>
    <div class="container my-5">
        <h2 style="position:relative;top:-30vh;left:20vh;">New Row</h2>
<?php
if(!empty($errorMessage)){
    echo"
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>$errorMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    
    ";
}


?>
        <form method="post">
          
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Activitati</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="activitati" value="<?php echo $activitati; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">An curent</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="an_curent" value="<?php echo $an_curent; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Programat</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="programat" value="<?php echo $programat; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Realizat</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="realizat" value="<?php echo $realizat; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Pondere cheltuieli</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="pondere_cheltuieli" value="<?php echo $pondere_cheltuieli; ?>">
</div>
            </div>
           
<?php
if(!empty($successeMessage)){
    echo"
    div class='row mb-3'>
    <div class='offset-sm-3 col-sm-6'>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>$successeMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    </div>
    </div>
    ";
    
}


?>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button style="color:white;background-color:lightslategray;"type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="col-sm-3 d-grid">
    <a style="color:lightslategray;background-color:white;" class="btn btn-outline-primary" href="../menu/analiza_cheltuielilor.php" role="button">Cancel</a>
</div>
            </div>
        </form>
    </div>
</body>
</head>
</html>