<?php
$fname = $lname = $dob = $mobno = $address = $cv = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset ($_POST['fname']) && !empty($_POST['fname']) && trim($_POST['fname'])){
        $fname = $_POST['fname'];
    }
    else{
        $err['fname'] = 'Enter First Name';
    }
    if (isset ($_POST['lname']) &&!empty($_POST['lname']) && trim($_POST['lname'])) {
        $lname = $_POST['lname'];
    }
    else{
        $err['lname'] = 'Enter Last Name';
    }
    if (isset ($_POST['dob']) &&!empty($_POST['dob']) && trim($_POST['dob'])) {
        $dob = $_POST['dob'];
    }
    else{
        $err['dob'] = 'Enter Date of birth';
    }
    if (isset ($_POST['mobno']) &&!empty($_POST['mobno']) && trim($_POST['mobno'])) {
        $mobno = $_POST['mobno'];
    }
    else{
        $err['mobno'] = 'Enter Mobile number';
    }
    if (isset ($_POST['address']) &&!empty($_POST['address']) && trim($_POST['address'])) {
        $address = $_POST['address'];
    }
    else{
        $err['address'] = 'Enter Address';
    }
    if (isset ($_POST['cv']) &&!empty($_POST['cv']) && trim($_POST['cv'])) {
        $cv = $_POST['cv'];
    }
    else{
        $err['cv'] = 'Select file';
    }

   $fname = $_POST['fname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$mobno = $_POST['mobno'];
$address = $_POST['address'];
$cv = $_POST['cv'];
try {
    require_once 'connection.php';
    // Prepare the SQL statement with placeholders
    $sql = "UPDATE jobseeker SET fname=?, lname=?, dob=?, mobno=?, address=?, cv=? WHERE p_id=?";
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssssi", $fname, $lname, $dob, $mobno, $address, $cv, $p_id);

    // Execute the query
    $stmt->execute();

    // Check if any rows were affected
    if ($stmt->affected_rows > 0) {
        echo "Jobseeker updated successfully";
    } else {
        echo "No changes made";
    }
} catch (Exception $ex) {
    die('Error: ' . $ex->getMessage());
}

}
?>
<?php
$p_id = $_GET['id'];
    try{
        require_once 'connection.php';
        $sql = "select * from jobseeker where p_id =$p_id";
        $result = $connection->query($sql);
        if ($result->num_rows == 1) {
            $record = $result->fetch_assoc();
        }
        else{
            die ('Data not found');
        }
    }
    catch (Exception $ex){
        die('Error: '. $ex->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <nav>
            <div class="logo">
            <h2> Job Portal </h2>
            </div>
        </nav>
    </div>
        <section class="form-box">
        <form action="" method="post" name="login_form">
            <h3>Create your free job seeker account</h3>
            <p>Register with basic information, complete your profile and start applying for jobs for free.</p>
            <div class="field-group">
                <label for="fname"><b>First Name:</b></label>
                <input type="text" name="fname" value="<?php echo $record['fname']?>">
                <span><?php echo isset($err['fname'])?$err['fname']:''; ?></span>
            </div>
            <div class="field-group">
                <label for="lname"><b>Last Name:</b></label>
                <input type="text" name="lname" value="<?php echo $record['lname']?>">
                <span><?php echo isset($err['lname'])?$err['lname']:''; ?></span>
            </div>
            <div class="field-group">
                <label for="dob"><b>Date of Birth:</b></label>
                <input type="dob" name="dob" value="<?php echo $record['dob']?>">
                <span><?php echo isset($err['dob'])?$err['dob']:''; ?></span>
            </div>
            <div class="field-group">
                <label for="mobno"><b>Mobile Number:</b></label>
                <input type="number" name="mobno" value="<?php echo $record['mobno']?>">
                <span><?php echo isset($err['mobno'])?$err['mobno']:''; ?></span>
            </div>
            <div class="field-group">
                <label for="address"><b>Address:</b></label>
                <input type="address" name="address" value="<?php echo $record['address']?>">
                <span><?php echo isset($err['address'])?$err['address']:''; ?></span>
            </div>
            <div>
                <label for="cv"><b>CV:</b></label>
                <input type="file" name="cv" value="<?php echo $record['cv']?>">
                <span><?php echo isset($err['cv'])?$err['cv']:''; ?></span>
            </div>
            <div class="btn-group">
            <button type="login" name="register">Update</button>
               
            </div>
        </form>
    </section>
    <footer id="footer">
        <div class="footer-content">
          <div class="logo">
            <h2>Job Portal</h2>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et labore suscipit nisi non, laudantium delectus?
                <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, molestias!
            </p>
            <div class="socail-links">
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-pinterest-p"></i>
            </div>
        </div>
        <div class="footer-bottom-content">
            <p>Designed By Job Portal teams</p>
            <div class="copyright">
                <p>&copy;Copyright <strong>Job portal</strong>.All Rights Reserved</p>
            </div>
        </div>
    </footer>
</body>
</html>