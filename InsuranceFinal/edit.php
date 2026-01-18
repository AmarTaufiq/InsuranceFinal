<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "Insurance";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

$id = "";
$name = "";
$email = "";
$phone = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: Show the data of the client
    if (!isset($_GET["id"])) {
        header("location: /InsuranceFinal/edit_delete.php");
        exit;
    }

    $id = $_GET["id"];

    // read the row of the selected client from database table
    $sql = "SELECT * FROM clients WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /InsuranceFinal/edit_delete.php");
        exit;
    }
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    do {
        if (empty($id) || empty($name) || empty($email) || empty($phone)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE clients " .
            "SET name = '$name', email = '$email', phone = '$phone' " .
            "WHERE id = $id";

        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $successMessage = "Client updated correctly";
        header("location: /InsuranceFinal/edit_delete.php");
        exit;
    } while (true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Edit</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            --primary-color: #ff833e;
            --primary-hover: #e67337;
            --secondary-color: #6c757d;
            --dark-color: #2d2d2d;
            --light-color: #f4f4f4;
            --text-color: #333;
            --text-light: #999;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--light-color);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            width: 100%;
            height: 70px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1000;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .logo a {
            text-decoration: none;
        }

        .logo span:first-child {
            color: var(--dark-color);
        }

        .logo span:last-child {
            color: var(--primary-color);
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .menu-btn {
            background-color: var(--dark-color);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .menu-btn:hover {
            background-color: #1a1a1a;
            transform: translateY(-2px);
        }

        .offcanvas-header {
            background-color: var(--light-color);
            color: var(--dark-color);
            border-bottom: 1px solid #eee;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            flex: 1;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 60px 0 30px;
            margin-top: auto;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 40px;
        }

        .footer-col {
            flex: 1;
            min-width: 250px;
        }

        .footer-col h5 {
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .footer-col p {
            color: var(--text-light);
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            color: var(--text-light);
            font-size: 20px;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: var(--primary-color);
        }

        .footer-divider {
            border: none;
            border-top: 1px solid #444;
            margin: 40px 0 20px;
        }

        .copyright {
            text-align: center;
            color: var(--text-light);
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .footer-row {
                flex-direction: column;
            }
            
            header {
                padding: 0 15px;
            }
            
            .nav-buttons {
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <a href="dashboard.php">
                <span>MY</span><span>EASY</span>
            </a>
        </div>
        <div class="nav-buttons">
            <button class="menu-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                <i class="fas fa-bars me-2"></i>Menu
            </button>
        </div>
    </header>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                <div class="logo">
                    <span>MY</span><span>EASY</span>
                </div>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-list me-2"></i>MYEASY Category
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="dashboard.php"><i class="fas fa-home me-2"></i>Home Page</a></li>
                    <li><a class="dropdown-item" href="list.php"><i class="fas fa-clipboard-list me-2"></i>List of Clients</a></li>
                    <li><a class="dropdown-item" href="edit_delete.php"><i class="fas fa-edit me-2"></i>Edit and Delete</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2>Edit Client</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <?php
            if (!empty($successMessage)) {
                echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="edit_delete.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-row">
                <div class="footer-col">
                    <h5>MYEASY</h5>
                    <p>Secure your future with reliable insurance solutions — from health and life to property and beyond. We've got
                        you covered with plans built for peace of mind and real-life protection.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/03-2175-5134"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="footer-col">
                    <h5>Contact Info</h5>
                    <p><i class="fas fa-phone me-2"></i> +03-2175-5134</p>
                    <p><i class="fas fa-envelope me-2"></i> myez@support.com</p>
                </div>
            </div>

            <hr class="footer-divider">

            <div class="copyright">
                <p>Copyright © 2025 Amar & Wafri. All rights reserved</p>
            </div>
        </div>
    </footer>
</body>
</html>