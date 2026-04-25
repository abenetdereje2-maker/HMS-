<?php
session_start();
include('database.php');

// 1. Handle "Add Patient" Button (Show Modal)
if(isset($_POST['patient'])) {
    echo "<script>
        window.onload = function() {
            document.querySelector('.registration-card').style.display='block';
            document.body.style.overflow='hidden';
        };
    </script>";
}
                     


// 2. Handle Registration Form Submission
if(isset($_POST['register'])) {
    $pdata = array(
        "pname"   => mysqli_real_escape_string($conn, $_POST['full_name']),
        "page"    => mysqli_real_escape_string($conn, $_POST['age']),
        "pgender" => mysqli_real_escape_string($conn, $_POST['gender']),
        "pdoc"    => mysqli_real_escape_string($conn, $_POST['doctor']),
        "pdept"   => mysqli_real_escape_string($conn, $_POST['department'])
    );

    $sql = "INSERT INTO patients (`FULL_NAME`, `Age`, `Gender`, `Doctor`, `DEPT`) 
            VALUES ('{$pdata['pname']}', '{$pdata['page']}', '{$pdata['pgender']}', '{$pdata['pdoc']}', '{$pdata['pdept']}')";
    
    if(mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Patient Registration Successful');
            window.location.href='reg.php'; // Refresh to show new data
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// 3. Fetch Data for Table
// Make sure this happens AFTER insertion logic
$result = mysqli_query($conn, "SELECT * FROM patients ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="hospital.css">
    <style>
        /* Ensure card is hidden by default */
        .registration-card { display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; background: white; padding: 20px; box-shadow: 0 0 20px rgba(0,0,0,0.5); }
    </style>
</head>
<body>

<section id="patients" class="patients-section">
    <div class="container">
        <div class="section-header">
            <h2>Patient Management</h2>
            <p>Comprehensive patient records and management</p>
        </div>

        <div class="patient-controls">
            <form action="reg.php" method="post">
                <input type="submit" class="btn-add" name="patient" value="Add Patient">
            </form>
        </div>

        <div class="patients-table">
            <h2>Registered Patients</h2>
            <table border="1" style="width:100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Doctor</th>
                        <th>Department</th>
                        <th>Registration Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result && mysqli_num_rows($result) > 0): ?>
                     <?php 
                        $rowCount = mysqli_num_rows($result);?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $row['ID']; ?></td>
                                <td><?= htmlspecialchars($row['FULL_NAME']); ?></td>
                                <td><?= $row['Age']; ?></td>
                                <td><?= $row['Gender']; ?></td>
                                <td><?= $row['Doctor']; ?></td>
                                <td><?= $row['DEPT']; ?></td>
                                <td><?= isset($row['reg_date']) ? $row['reg_date'] : 'N/A'; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="7">No patients found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div><br><br>
        <form action="reg.php" method="post">
         <input type="submit" value="Back to home" name="Back-tohome" id="register_btn">
                    </form>
   
    </div>

</section>

<div class="registration-card">
    <div class="card-header">
      <div class="icon-circle">
         <i class="fa-solid fa-user-plus"></i>
                    </div>
        <h2 id="phead">Patient Registration</h2>
         <p>Enter the details to enroll a new patient</p>
    </div>
    <form action="reg.php" method="post" class="registration-form">
        <div class="form-group">
            <label for="full_name" >Full Name</label>
            <input type="text" name="full_name" required placeholder="Full name" >
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Age</label>
                <input type="number" name="age" required placeholder="Age">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="text" name="gender" placeholder="Male/Female" required>
            </div>
        </div>
        <div class="form-group">
            <label for="departement">Department</label>
            <select name="department" required >
                <option value="OPD">OPD</option>
                <option value="ICU">ICU</option>
                 <option value="ot">OT</option>
                <option value="inpatient">IP</option>
                 <option value="Emergency">Emergency</option>
            </select>
        </div>
        <div class="form-group">
            <label>Assigned Doctor</label>
            <select name="doctor" required>
                <option value="Dr. Smith">Dr. Smith</option>
                <option value="Dr. Adams">Dr. Adams</option>
                 <option value="Dr_chen">Dr. Chen (Pediatrics)</option>
                            <option value="Dr_Admasu">Dr. Admasu (Orthopedics)</option>
                              <option value="Dr_Dereje">Dr. Dereje (Neurology)</option>
                                <option value="Dr_Mekdelawit">Dr. Mekdelawit (Gynecology)</option>
            </select>
        </div>
        <input type="submit" value="Register" name="register" id="register_btn">
        <button id="register_btn" type="button" onclick="document.querySelector('.registration-card').style.display='none'; document.body.style.overflow='auto';">Cancel</button>

    </form>
</div>


</body>
</html>