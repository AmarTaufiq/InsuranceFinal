<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>MYEASY Dashboard</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            --primary-color: #ff833e;
            --secondary-color: #6c757d;
            --dark-color: #2d2d2d;
            --light-color: #f4f4f4;
            --text-color: #333;
            --text-light: #999;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--light-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            width: 100%;
            height: 70px;
            background-color: var(--light-color);
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
            color: white;
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
            color: white;
        }

        .dropdown-toggle {
            background-color: var(--secondary-color);
            border: none;
            width: 100%;
        }

        .dropdown-toggle:hover {
            background-color: #5a6268;
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
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <a href="dashboard.php" style="text-decoration:none">
                <span style="color:rgb(0, 0, 0);">MY</span><span style="color: #ff833e;">EASY</span>
            </a>
        </div>
        <button class="menu-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
            <i class="fas fa-bars me-2"></i>Menu
        </button>
    </header>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                <div class="logo">
                    <span style="color:rgb(0, 0, 0);">MY</span><span style="color: #ff833e;">EASY</span>
                </div>
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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

    <main class="container my-4">
        <h2>Lists of Clients</h2>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Insurance</th>
                <th>Created At</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $host = "localhost";
                $dbusername = "root";
                $dbpassword = "";
                $dbname = "Insurance";

                $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM clients";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[insurance]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/InsuranceFinal/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/InsuranceFinal/delete.php?id=$row[id]'>Delete</a>
                    </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </main>

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