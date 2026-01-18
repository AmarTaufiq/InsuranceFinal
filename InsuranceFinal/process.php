<?php
session_start();

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "Insurance"; 

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $category = $_POST['insurance_category'];
    $sql = "INSERT INTO clients (name, email, phone, insurance) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $contact, $email, $category);

    if ($stmt->execute()) {
        // Kira amount based on plan
        $amount = 'RM 43.99'; // Default utk Health Plan
        if ($category == 'Automotive Plan') {
            $amount = 'RM 199.00';
        } elseif ($category == 'Hibah Takaful') {
            $amount = 'RM 33.99';
        }

        // Tunjuk receipt
        $_SESSION['receipt'] = [
            'name' => $name,
            'contact' => $contact,
            'email' => $email,
            'insurance_category' => $category,
            'amount' => $amount
        ];
        header("Location: ins_form.php?submitted=1");
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>