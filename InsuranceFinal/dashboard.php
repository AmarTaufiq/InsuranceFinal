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
            --primary-hover: #e67337;
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

        .logout-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .logout-btn:hover {
            background-color: var(--primary-hover);
            color: white;
            transform: translateY(-2px);
        }

        .offcanvas-header {
            background-color: var(--light-color);
            color: var(--dark-color);
            border-bottom: 1px solid #eee;
        }

        .dropdown-toggle {
            background-color: var(--secondary-color);
            border: none;
            width: 100%;
            color: white;
        }

        .dropdown-toggle:hover {
            background-color: #5a6268;
        }

        .offcanvas-body .dropdown-menu {
            width: 100%;
        }

        .offcanvas-body .dropdown-item {
            padding: 10px 15px;
        }

        .offcanvas-body .dropdown-item i {
            width: 20px;
            text-align: center;
            margin-right: 10px;
        }

        main {
            flex: 1;
            padding: 30px 0;
        }

        /* Insurance Plan Cards */
        .plan-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            border: none;
        }

        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .plan-header {
            padding: 20px;
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .plan-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .plan-price {
            font-size: 1.25rem;
            color: var(--primary-color);
            font-weight: 600;
        }

        .plan-body {
            padding: 20px;
            background-color: white;
        }

        .plan-description {
            color: var(--text-light);
            margin-bottom: 20px;
        }

        .plan-features {
            list-style: none;
            padding: 0;
            margin-bottom: 25px;
        }

        .plan-features li {
            padding: 5px 0;
            position: relative;
            padding-left: 25px;
        }

        .plan-features li:before {
            content: "\f00c";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--primary-color);
        }

        .popular-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--primary-color);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .btn-buy {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }

        .btn-buy:hover {
            background-color: var(--primary-hover);
            color: white;
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
            <a href="logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
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
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <main class="container my-4">
        <div class="row g-4">
            <!-- Health Plan Card -->
            <div class="col-md-4">
                <div class="plan-card">
                    <div class="plan-header">
                        <h3 class="plan-title">Health Plan</h3>
                        <div class="plan-price">RM 39.99 / month</div>
                    </div>
                    <div class="plan-body">
                        <p class="plan-description">Comprehensive health coverage for you and your family hospital bills, medications, and emergency care.</p>
                        <ul class="plan-features">
                            <li>In-patient & Out-patient Benefit</li>
                            <li>Surgical Operations Coverage</li>
                            <li>Maternity Benefit Support</li>
                        </ul>
                        <button class="btn-buy" onclick="window.location.href='ins_form.php?plan=Health Plan'">Buy Now <i class="fas fa-arrow-right ms-2"></i></button>
                    </div>
                </div>
            </div>

            <!-- Automotive Plan Card -->
            <div class="col-md-4">
                <div class="plan-card">
                    <div class="popular-badge">Most Popular</div>
                    <div class="plan-header">
                        <h3 class="plan-title">Automotive Plan</h3>
                        <div class="plan-price">RM 199.00 / month</div>
                    </div>
                    <div class="plan-body">
                        <p class="plan-description">Comprehensive vehicle coverage protecting you against accidents, theft, and repairs.</p>
                        <ul class="plan-features">
                            <li>Accidental Damage Repair</li>
                            <li>Theft & Vandalism Protection</li>
                            <li>24/7 Roadside Assistance</li>
                            <li>Windscreen & Parts Replacement</li>
                        </ul>
                        <button class="btn-buy" onclick="window.location.href='ins_form.php?plan=Automotive Plan'">Buy Now <i class="fas fa-arrow-right ms-2"></i></button>
                    </div>
                </div>
            </div>

            <!-- Hibah Takaful Card -->
            <div class="col-md-4">
                <div class="plan-card">
                    <div class="plan-header">
                        <h3 class="plan-title">Hibah Takaful</h3>
                        <div class="plan-price">RM 29.99 / month</div>
                    </div>
                    <div class="plan-body">
                        <p class="plan-description">Provides financial peace of mind for your heirs — a legacy for your family's future.</p>
                        <ul class="plan-features">
                            <li>Death Benefit Payout</li>
                            <li>Debt Settlement Support</li>
                            <li>Flexible Benefit Distribution</li>
                            <li>Transparent Shariah Compliance</li>
                            <li>Trusted Security for Future Generations</li>
                        </ul>
                        <button class="btn-buy" onclick="window.location.href='ins_form.php?plan=Hibah Takaful'">Buy Now <i class="fas fa-arrow-right ms-2"></i></button>
                    </div>
                </div>
            </div>
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