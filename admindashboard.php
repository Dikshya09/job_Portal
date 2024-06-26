<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
            border: 1px solid grey;
        }
        th, td{
            padding: 10px;
            text-align: center;
        }
        
        table tr {
            border-bottom: 1px solid lightgrey;
        }
        table tr:last-child {
            border-bottom: none;
        }


    h2 {
        color: #338573;
    }

    nav {
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    nav a {
        display: block;
        color: #338573;
        padding: 14px 16px;
        text-decoration: none;
        font-weight: normal;
        font-size: 16px;
    }

    nav a:hover, nav a:active, .active {
        text-decoration: underline;
        background-color: #338573;
        color: white;
    }

    .logo {
        margin-right: 20px;
    }

    .nav-links ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        display: flex;
    }

    .nav-links li {
        margin-right: 20px;
    }

    .nav-links a {
        font-weight: bold;
        font-size: 18px;
        
    }

    .nav-links a:hover {
        background-color: #338573;
        color: white;
    }

    .nav-links .active a {
        background-color: #338573;
        color: white;
    }

    .nav-links a:last-child {
        margin-right: 0;
    }
</style>
</head>
<body>
    <?php
    $activePage = isset($_GET['page']) ? $_GET['page'] : 'jobseeker';
    ?>
    <div class="header">
        <nav>
            <div class="logo">
            <h2>Job Portal</h2>
            </div>
            <div class="nav-links">
            <ul>
                <li><a href="?page=jobseeker" <?php echo ($activePage === 'jobseeker') ? 'class="active"' : ''; ?>>Job Seeker</a></li>
                <li><a href="?page=employer" <?php echo ($activePage === 'employer') ? 'class="active"' : ''; ?>>Employer</a></li>
                <li><a href="?page=job" <?php echo ($activePage === 'job') ? 'class="active"' : ''; ?>>Jobs</a></li>
            </ul>
            </div>
            </div>
        </nav>
        
        
        <?php
        // Include the content based on the active page
        switch ($activePage) {
            case 'jobseeker':
            include 'jobseeker.php';
            break;
            case 'employer':
            include 'employer.php';
            break;
            case 'job':
            include 'job.php';
            break;
            default:
            // Handle other cases or set a default behavior
            include 'jobseeker.php';
            break;
        }
        ?>


        <footer id="footer">
        <div class="footer-bottom-content">
          <p>Designed By Job Portal teams</p>
          <div class="copyright">
              <p>&copy;Copyright <strong>Job portal</strong>.All Rights Reserved</p>
          </div>
        </div>
        </footer>
</body>
</html>