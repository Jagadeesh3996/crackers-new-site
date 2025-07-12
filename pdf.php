<?php
// try {
//     // include($_SERVER['DOCUMENT_ROOT'] . '/kickvy/admin/utilities/db.php');
//     // include($_SERVER['DOCUMENT_ROOT'] . '/kickvy/admin/pdf/pdf.php');

//     include($_SERVER['DOCUMENT_ROOT'] . '/../newadmin/utilities/db.php');
//     include($_SERVER['DOCUMENT_ROOT'] . '/../newadmin/pdf/pdf.php');

//     // check url parameter  is set or not
//     if (isset($_GET['oid'])) {
//         $oid = $_GET['oid'];
//     } else {
//         header("Location: $site_url/estimate/");
//         exit();
//     }

//     // fetch data
//     $query2 = "SELECT * FROM tbl_orders WHERE order_id = '$oid' AND status >= 1 LIMIT 1";
//     $result2 = mysqli_query($conn, $query2);
//     if ($pitem = mysqli_fetch_array($result2)) {
//         pdfGenration($pitem, $oid, true);
//     } else {
//         header("Location: $site_url/estimate/");
//         exit();
//     }
// } catch (Exception $ex) {
//     print_r($ex->getMessage());
// }

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {

    $dbPath = $_SERVER['DOCUMENT_ROOT'] . '/../newadmin/utilities/db.php';
    $pdfPath = $_SERVER['DOCUMENT_ROOT'] . '/../newadmin/pdf/pdf.php';

    if (!file_exists($dbPath)) {
        die('DB include not found: ' . $dbPath);
    }
    if (!file_exists($pdfPath)) {
        die('PDF include not found: ' . $pdfPath);
    }

    include($dbPath);
    include($pdfPath);

    if (!$conn) {
        die('Database connection failed: ' . mysqli_connect_error());
    }

    if (!isset($_GET['oid']) || empty($_GET['oid'])) {
        header("Location: $site_url/estimate/");
        exit();
    }

    $oid = mysqli_real_escape_string($conn, $_GET['oid']);

    $query2 = "SELECT * FROM tbl_orders WHERE order_id = ? AND status >= 1 LIMIT 1";
    $stmt = $conn->prepare($query2);
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }
    $stmt->bind_param("s", $oid);
    $stmt->execute();
    $result2 = $stmt->get_result();

    if ($pitem = $result2->fetch_assoc()) {
        if (!function_exists('pdfGenration')) {
            die('pdfGenration() function not found.');
        }
        pdfGenration($pitem, $oid, true);
    } else {
        header("Location: $site_url/estimate/");
        exit();
    }
} catch (Exception $ex) {
    echo "Error: " . $ex->getMessage();
}
