<?php
session_start();
?>



<?php
include('database.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="pharmacy.css">
</head>
<body>
   <div class="container">
    <div class="section-header">
        <h2>Pharmacy Management</h2>
        <p>Comprehensive pharmacy records and management</p>
    </div>

    <div id="form">
        <form action="pharmacy.php" method="post">
            <div class="pharmacy-controls">
                <input type="text" name="medicene_name" placeholder="Medicine Name">

                <select name="category" >
                    <option value="" disabled selected>Select Category</option>
                    <option value="Antibiotics">Antibiotics</option>
                    <option value="BP Medication">BP Medication</option>
                    <option value="Diabetes">Diabetes</option>
                </select>
                <input type="text" name="quantity" placeholder="Quantity">

                <input type="text" name="price" placeholder="Price">
                <div>
                    <label>Expiry Date</label>
                    <input type="date" name="expiry_date">
                </div>

                <button type="submit" class="btn-save" name="submit">Save Medicine</button>
            </div>
            <div class="back">
                <input type="submit" class="btn-save" name="back" value="Back to home">
                <input type="submit" class="btn-save" name="back-tologin" value="Back to Login">
            </div>
        </form>
    </div>
</div>
<?php

if(isset($_POST['submit']))
    {
if(isset($_POST['medicene_name']) && isset($_POST['category']) && isset($_POST['quantity']) && isset($_POST['price']) &&
 isset($_POST['expiry_date']))
 {
    $medicene_name=$_POST['medicene_name'];
$mcatagory=$_POST['category'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$exdate=$_POST['expiry_date'];
    $query="INSERT INTO pharmacy(Medicene_name,Catagory,Quantity,Price,	Expiry_Date)
    VALUES('$medicene_name','$mcatagory','$quantity','$price','$exdate')";
    $presulte=mysqli_query($conn,$query);
    if($presulte)
        {
            echo "<script> alert('Medicine added successfully');</script>";

        }
        else{
            echo "<script> alert('Failed to add medicine'); </script>";
        }
    
 }
    }
    if(isset($_POST['back']))
        {
            header("Location:hospital.php");
        }
        if(isset($_POST['back-tologin']))
            {
                header("Location:index.php");
            }

?>
</body>
</html>