<?php
$conn = mysqli_connect("localhost", "root", "","okey");
if(isset($_POST['button'])){
$name = $_POST['bur'];
$email = $_POST['biya'];
$pass = $_POST['loura'];
if( $name =="" || $email =="" || $pass =="" ){
    header("Location:index.php?error=1");
    die();
}
$sql = "INSERT INTO `profils`(`Name`, `E-mail`, `password`) VALUES ('$name','$email ','$pass')";
mysqli_query($conn,$sql);
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM `profils` WHERE id = $id";
    mysqli_query($conn,$delete);
    header("Location:index.php");
}
if(isset($_POST['update'])){
  $name = $_POST['bur'];
  $email = $_POST['biya'];
  $pass = $_POST['loura'];
  $id = $_POST['edit'];
  $sql = "UPDATE `profils` SET `Name`='$name',`E-mail`='$email',`password`='$pass' WHERE id= $id";
  mysqli_query($conn,$sql);
  header("Location:index.php");
  }
  if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $fetch = "SELECT * FROM `profils` WHERE id = $id";
    $query = mysqli_query($conn,$fetch);
    $row = mysqli_fetch_assoc($query);
    $name = $row['Name'];
    $email = $row['E-mail'];
    $pass = $row['password'];
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div  class ="text-center my-5">
        <?php
    if(isset($_GET["error"])){
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Vaag madharchod</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
         ?>
      

      
 
       <?php
      if(isset($_GET['edit'])){?>
        <form action="" method= "post" >
        <input type="hidden" value="<?php echo $_GET['edit']; ?>" name="edit">
        <input type="text" placeholder="NAME" name= "bur" value="<?php echo $name; ?>" style="background-color:whiter; color:green;" >
        <input type="text" placeholder="E-mail"  name= "biya"  value="<?php echo $email; ?>"  >
        <input type="password" placeholder="PASS" name= "loura"  value="<?php echo $pass; ?>">
        <input type="SUBMIT" value="Update" name="update">
       </form>
      <?php }else{?>
         <form action="" method= "post" >
        <input type="text" placeholder="NAME" name= "bur" style="background-color:whiter; color:green;" >
        <input type="text" placeholder="E-mail" name= "biya"  >
        <input type="password" placeholder="PASS" name= "loura">
        <input type="SUBMIT" name="button">
       </form>
       <?php }?>

        <?php
       $fetch = "SELECT * FROM `profils` ";
       $query = mysqli_query($conn,$fetch);
       while($row = mysqli_fetch_assoc($query)){
       echo $row['Name'].' - '. $row['E-mail'].' - '. $row['password'];
       echo ' <a href="index.php?delete='.$row['id'].'">Delete</a>';
       echo ' <a href="index.php?edit='.$row['id'].'">Update</a>';
       echo '<br>';


       }
      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
