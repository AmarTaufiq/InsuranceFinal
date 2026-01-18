<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password";
    } else {
        if ($username == 'gg' && $password == '1234') {
            $_SESSION['user'] = $username;
            $_SESSION['last_activity'] = time();
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MYEASY</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #ff833e;
            --primary-hover: #e67337;
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
            background-color: white;
            display: flex;
            align-items: center;
            padding: 0 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 20px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h2 {
            margin: 0 0 10px 0;
            color: var(--dark-color);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .login-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: var(--primary-hover);
        }

        .message {
            margin: 20px 0;
            padding: 15px;
            border-radius: 4px;
            text-align: center;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #f5c6cb;
        }

        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 60px 0 30px;
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

            .login-container {
                padding: 20px;
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
            <a href="#">
                <span>MY</span><span>EASY</span>
            </a>
        </div>
    </header>

    <main>
        <div class="login-container">
            <div class="login-header">
                <h2>Login</h2>
                <?php if (isset($error)): ?>
                    <div class="message error"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
            </div>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>
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