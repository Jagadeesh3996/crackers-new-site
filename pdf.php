<?php
try {
    // include($_SERVER['DOCUMENT_ROOT'] . '/kickvy/admin/utilities/db.php');
    // include($_SERVER['DOCUMENT_ROOT'] . '/kickvy/admin/pdf/pdf.php');

    include($_SERVER['DOCUMENT_ROOT'] . '../newadmin/utilities/db.php');
    include($_SERVER['DOCUMENT_ROOT'] . '../admin/pdf/pdf.php');

    // check url parameter  is set or not
    if (isset($_GET['oid'])) {
        $oid = $_GET['oid'];
    } else {
        header("Location: $site_url/estimate/");
        exit();
    }

    // fetch data
    $query2 = "SELECT * FROM tbl_orders WHERE order_id = '$oid' AND status >= 1 LIMIT 1";
    $result2 = mysqli_query($conn, $query2);
    if ($pitem = mysqli_fetch_array($result2)) {
        pdfGenration($pitem, $oid, true);
    } else {
        header("Location: $site_url/estimate/");
        exit();
    }
} catch (Exception $ex) {
    print_r($ex->getMessage());
}
