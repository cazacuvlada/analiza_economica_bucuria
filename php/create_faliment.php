
<?php
$valoarea_scorului="";
$probabilitatea_faliment="";
$bilant_activ="";
$bilant_pasiv="";
$rata_investiti_nete="";
$rata_investiti_extern="";


//create connection

@include '../php/config.php';

$conn = mysqli_connect('localhost','root','','analiz_econom_bucuria');

$errorMessage="";
$successeMessage ="";

if($_SERVER['REQUEST_METHOD']=='POST'){
   

  
    $valoarea_scorului=$_POST["valoarea_scorului"];
    $probabilitatea_faliment=$_POST["probabilitatea_faliment"];
    $bilant_activ=$_POST["bilant_activ"];
    $bilant_pasiv=$_POST["bilant_pasiv"];
    $rata_investiti_nete = $_POST["rata_investiti_nete"];
    $rata_investiti_extern=$_POST["rata_investiti_extern"];
    
   

    do{
        if(empty($valoarea_scorului)||empty ($probabilitatea_faliment) || empty ( $bilant_activ)|| empty ( $bilant_pasiv)|| empty ( $bilant_activ) ||empty($rata_investiti_nete)||empty($rata_investiti_extern)){
            $errorMessage = "All the fields are required";
            break;
        }
       
        //add a new book to DB
        $sql = "INSERT INTO `faliment`(valoarea_scorului,probabilitate_faliment,bilant_activ, bilant_pasiv,rata_investiti_nete, rata_investiti_extern)
        VALUES ('$valoarea_scorului','$probabilitatea_faliment,' $bilant_activ',' $bilant_pasiv',' $bilant_activ','$rata_investiti_nete','$rata_investiti_extern')";
        $result = mysqli_query($conn,$sql);
        #$result=$conn->query($sql);
        if(!$result){
      $errorMessage = "Invalid query:".$conn->error;
      break;
        }
        mysqli_close($conn);

       

$valoarea_scorului="";
$probabilitatea_faliment="";
$bilant_activ="";
$bilant_pasiv="";
$rata_investiti_nete="";
$rata_investiti_extern="";
        


$successeMessage = "Row added correctly";
header("location:../menu/faliment.php");
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
    <a href="../menu/faliment.php">Faliment </a>
</div>
    <div class="container my-5">
        <h2 style="position:relative;top:-50vh;left:20vh;">New Row</h2>
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
<label class="col-sm-3 col-form-label ">Valoarea Scorului</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="valoarea_scorului" value="<?php echo $valoarea_scorului; ?>">
</div>
            </div>
           
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Probabilitatea faliment</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="probabilitatea_faliment" value="<?php echo $probabilitatea_faliment; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Bilant Activ</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="bilant_activ" value="<?php echo $bilant_activ; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Bilant Pasiv</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="bilant_pasiv" value="<?php echo $bilant_pasiv; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Rata Investitii Nete</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="rata_investiti_nete" value="<?php echo $rata_investiti_nete; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Rata Investitii Externe</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="rata_investiti_extern"  value="<?php echo $rata_investiti_extern; ?>">
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