<?php
<<<<<<< HEAD
 $err = [];
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
=======
session_start();
require_once 'connection.php';
>>>>>>> ef64c67179be69cf4673d71c02a00276a5fe6a07

$connection = new mysqli('localhost', 'root', '', 'jobportal');

$email = $password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
<<<<<<< HEAD
   
    
=======
    $err = [];

>>>>>>> ef64c67179be69cf4673d71c02a00276a5fe6a07
    if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $err['email'] = 'Enter Email';
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $err['password'] = 'Enter password';
    }

<<<<<<< HEAD
    if (count($err) == 0) {
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $connection->query($sql);
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($user['user_type'] == 'jobseeker') {
                $_SESSION['email'] = $email;
                header('location:jobseekerdashboard.php');
                exit;
            } elseif ($user['user_type'] == 'employer') {
                $_SESSION['email'] = $email;
                header('location:empdashboard.php');
                exit;
            } else {
       echo 'Invalid usename';
        // $err['password'] = 'Enter password';

            }
        } else {
            // echo 'Login failed';
            $err['user_type'] = 'Invalid Username';
=======
    // If there are no errors, proceed with authentication
    if (empty($err)) {
        // Prepare the SQL statement to fetch user credentials
        $sql = "SELECT user_type FROM users WHERE email = ? AND password = ?";
        $stmt = $connection->prepare($sql);

        // Bind parameters
        $stmt->bind_param("ss", $email, $password);

        // Execute the query
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result($user_type);

        // Fetch the result
        $stmt->fetch();

        // Close statement
        $stmt->close();

        // If user exists and credentials match
        if ($user_type) {
            // Store user type in session
            $_SESSION['user_type'] = $user_type;

            // Redirect based on user type
            switch ($user_type) {
                case 'recruiter':
                    header('Location: empdashboard.php');
                    exit(); // Ensure script execution stops after redirect
                case 'jobseeker':
                    header('Location: jobseekerdashboard.php');
                    exit(); // Ensure script execution stops after redirect
                // Handle other user types if needed
                default:
                    // Handle invalid user types
                    break;
            }
        } else {
            // Authentication failed, display error message or redirect back to login page with error
            $err['authentication'] = 'Invalid email or password';
>>>>>>> ef64c67179be69cf4673d71c02a00276a5fe6a07
        }
    }
}

// If not submitted or authentication failed, display login form
// Display login form here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css"> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <nav>
            <div class="logo">
            <h2 onclick="window.location.href='index.php'">Job Portal</h2>
            </div>
        </nav>
    </div>
    <section class="form-box">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="login_form">
            <h3>LOGIN</h3>
<<<<<<< HEAD
            <span><?php echo isset($err['user_type'])?$err['user_type']:''; ?></span>
=======
>>>>>>> ef64c67179be69cf4673d71c02a00276a5fe6a07
            <div class="field-group">
                <label for="email"><b>Email:</b></label>
                <input type="text" id="email" name="email">
                <span><?php echo isset($err['email'])?$err['email']:''; ?></span>
            </div>
            <div class="field-group">
                <label for="password"><b>Password:</b></label>
                <input type="password" id="password" name="password" >
                <span><?php echo isset($err['password'])?$err['password']:''; ?></span>
            </div>
            <div class="btn-group">
                <button type="login" name="btnLogin">Log In</button>
            </div>
            <?php if(isset($err['authentication'])) echo "<p>{$err['authentication']}</p>"; ?>
            <p>Don't have an account yet? <a href="user.php">Create a new account</a> today.</p>
        </form>
    </section>
</body>
</html>
