<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "Insurance";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $sql = "DELETE FROM clients WHERE id=$id";
    $conn->query($sql);
}
// Redirect back to table after delete
header("location: /InsuranceFinal/edit_delete.php");
exit;
?>