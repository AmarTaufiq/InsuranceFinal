<?php
session_start();
if (isset($_GET['submitted']) && isset($_SESSION['receipt'])) {
    $receipt = $_SESSION['receipt'];
    echo '
<script>
    window.onload = function() {
        var receiptModal = new bootstrap.Modal(document.getElementById("receiptModal"));
        receiptModal.show();
    };
</script>';
    unset($_SESSION['receipt']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance Ticket Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

        .back-btn-container {
            max-width: 1200px;
            margin: 20px auto 0;
            padding: 0 15px;
        }

        .back-btn {
            background-color: var(--secondary-color);
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s;
        }

        .back-btn:hover {
            background-color: #5a6268;
            color: white;
            transform: translateY(-2px);
        }

        .form-section {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .plan-section {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: 100%;
        }

        .payment-section {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: 100%;
        }

        h1 {
            color: var(--dark-color);
            text-align: center;
            margin-bottom: 5px;
        }

        h2 {
            color: var(--text-light);
            text-align: center;
            font-size: 1.2em;
            margin-top: 0;
            margin-bottom: 30px;
        }

        h3 {
            color: var(--dark-color);
            font-size: 1em;
            margin-bottom: 5px;
        }

        .required:after {
            content: " *";
            color: red;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            background-color: var(--primary-hover);
        }

        .payment-details {
            margin-top: 20px;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .payment-total {
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }

        .plan-features {
            list-style: none;
            padding: 0;
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

        .plan-price {
            font-size: 1.5rem;
            color: var(--primary-color);
            font-weight: 600;
            margin: 15px 0;
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

    <!-- Back to Dashboard Button -->
    <div class="back-btn-container">
        <a href="dashboard.php" class="back-btn">
            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
        </a>
    </div>

    <div class="container">
        <h1>Insurance Form</h1>
        <h2>FILL THE INFO</h2>
        
        <div class="row g-4">
            <!-- Left Column - Plan Details -->
            <div class="col-md-4">
                <div class="plan-section">
                    <h3>Plan Details</h3>
                    <?php
                    // Get the selected plan from URL parameter
                    $plan = isset($_GET['plan']) ? $_GET['plan'] : 'Health Plan';
                    $price = 'RM 39.99 / month';
                    
                    if ($plan == 'Automotive Plan') {
                        $price = 'RM 199.00 / month';
                        $features = [
                            'Accidental Damage Repair',
                            'Theft & Vandalism Protection',
                            '24/7 Roadside Assistance',
                            'Windscreen & Parts Replacement'
                        ];
                    } elseif ($plan == 'Hibah Takaful') {
                        $price = 'RM 29.99 / month';
                        $features = [
                            'Death Benefit Payout',
                            'Debt Settlement Support',
                            'Flexible Benefit Distribution',
                            'Transparent Shariah Compliance',
                            'Trusted Security for Future Generations'
                        ];
                    } else {
                        // Default to Health Plan
                        $features = [
                            'In-patient & Out-patient Benefit',
                            'Surgical Operations Coverage',
                            'Maternity Benefit Support'
                        ];
                    }
                    ?>
                    
                    <h4><?php echo $plan; ?></h4>
                    <div class="plan-price"><?php echo $price; ?></div>
                    
                    <ul class="plan-features">
                        <?php foreach ($features as $feature): ?>
                            <li><?php echo $feature; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            <!-- Middle Column - User Details Form -->
            <div class="col-md-4">
                <div class="form-section">
                    <form method="post" action="process.php">
                        <input type="hidden" name="insurance_category" value="<?php echo $plan; ?>">
                        
                        <h3 class="required">Name:</h3>
                        <input type="text" id="name" name="name" required>

                        <h3 class="required">Contact No.:</h3>
                        <input type="tel" id="contact" name="contact" required>

                        <h3 class="required">Email Address:</h3>
                        <input type="email" id="email" name="email" required>

                        <input type="submit" name="submit" class="submit-btn" value="Make Payment">
                    </form>
                </div>
            </div>
            
            <!-- Right Column - Payment Details -->
            <div class="col-md-4">
                <div class="payment-section">
                    <h3>Payment Details</h3>
                    
                    <div class="payment-details">
                        <div class="payment-row">
                            <span>Credit Card Number</span>
                        </div>
                        <input type="text" id="card_number" name="card_number" required placeholder="xxxx xxxx xxxx xxxx" pattern="\d{4}[\s]?\d{4}[\s]?\d{4}[\s]?\d{4}" title="Enter a valid 16-digit card number" required>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="payment-row">
                                    <span>Expiry Date</span>
                                </div>
                                <input type="text" id="expiry" name="expiry" required placeholder="mm/yy" required>
                            </div>
                            <div class="col-md-6">
                                <div class="payment-row">
                                    <span>CVV</span>
                                </div>
                                <input type="text" id="cvv" name="cvv" required placeholder="xxx" pattern="\d{3}" title="Enter a valid 3-digit CVV" required>
                            </div>
                        </div>
                        
                        <div class="payment-row">
                            <span>Subtotal</span>
                            <span>
                                <?php 
                                if ($plan == 'Automotive Plan') {
                                    echo 'RM 199.00';
                                } elseif ($plan == 'Hibah Takaful') {
                                    echo 'RM 29.99';
                                } else {
                                    echo 'RM 39.99';
                                }
                                ?>
                            </span>
                        </div>
                        
                        <div class="payment-row">
                            <span>Platform Fee</span>
                            <span>RM 4.00</span>
                        </div>
                        
                        <div class="payment-total">
                            <span>Total Amount</span>
                            <span>
                                <?php 
                                if ($plan == 'Automotive Plan') {
                                    echo 'RM 203.00';
                                } elseif ($plan == 'Hibah Takaful') {
                                    echo 'RM 33.99';
                                } else {
                                    echo 'RM 43.99';
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: var(--primary-color);">
                    <h5 class="modal-title" id="receiptLabel">Payment Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> <?= $receipt['name'] ?></p>
                    <p><strong>Contact:</strong> <?= $receipt['contact'] ?></p>
                    <p><strong>Email:</strong> <?= $receipt['email'] ?></p>
                    <p><strong>Insurance Plan:</strong> <?= $receipt['insurance_category'] ?></p>
                    <p><strong>Amount Paid:</strong> 
                        <?php 
                        if ($receipt['insurance_category'] == 'Automotive Plan') {
                            echo 'RM 203.00';
                        } elseif ($receipt['insurance_category'] == 'Hibah Takaful') {
                            echo 'RM 33.99';
                        } else {
                            echo 'RM 43.99';
                        }
                        ?>
                    </p>
                    <p><strong>Payment Status:</strong> <span class="text-success">Success</span></p>
                </div>
                <div class="modal-footer">
                    <a href="dashboard.php" class="btn btn-primary me-2">
                        <i class="fas fa-home me-2"></i>Back to Dashboard
                    </a>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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