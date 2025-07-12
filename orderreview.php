<?php
// include($_SERVER['DOCUMENT_ROOT'] . '/kickvy/admin/utilities/db.php');
include('https://asrpyropark.com/newadmin/utilities/db.php');

// check url parameter  is set or not
if (isset($_GET['oid'])) {
    $oid = $_GET['oid'];
} else {
    header("Location: $site_url/estimate/");
    exit();
}

// fetch data
$query = "SELECT * FROM tbl_orders WHERE order_id = '$oid' AND status >= 1 LIMIT 1";
$result = mysqli_query($conn, $query);
if ($item = mysqli_fetch_array($result)) {
    $date = $item['date'];
    $c_name = $item['name'];
    $c_email = $item['email'];
    $c_mobile = $item['phone'];
    $c_whatsapp = $item['whatsapp'];
    $c_address = $item['address'];
    $total = $item['total'];
    $pcharge = $item['packing_charge'];
    $promodiscount = $item['promotion_discount'];
    $finialtotal = $total + $pcharge - $promodiscount;
    $product = json_decode($item['products']);
} else {
    header("Location: $site_url/estimate/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head Start -->
<?php include("./utilities/head.php") ?>
<!-- Head END -->

<body>
    <!-- navigation start -->
    <?php include("./utilities/nav.php") ?>
    <!-- navigation end -->

    <h1 class="cat">Order Review</h1>

    <main class="overflow-auto">
        <div class="download">
            <a href="<?= $site_url ?>/pdf?oid=<?= $oid ?>" target="_blank" class="btn btn-success">Download PDF</a>
            <a href="<?= $site_url ?>/estimate/">
                <p class="btn btn-danger">Back</p>
            </a>
        </div>
        <br />
        <main class="pd-15" id="main" style="min-width:600px;color: #000000;font-weight: bold;">
            <div class="container">
                <div class="brd">
                    <div class="brd flex pdlr">
                        <div class="col">Estimate No : <b><?php echo $oid ?></b></div>
                        <div class="col">
                            <center><b>ESTIMATE</b></center>
                        </div>
                        <div class="col" style="text-align: end;">Date : <b><?php echo $date ?></b></div>
                    </div>
                    <div class="brd flex pdlr">
                        <div class="col">Phone : <b><?php echo $site_mobile_number ?>,<?php echo $site_whatsapp_number ?></b></div>
                        <div class="col" style="text-align: end;">Email : <b><?php echo $site_email ?></b></div>
                    </div>
                    <div class="brd flex" style="flex-direction:column">
                        <div style="width:40%">
                            <center>
                                <p class="fw-20" style="color:#000000;"><b><?php echo $site_name ?></b></p>
                                <p style="color:#000000;font-weight:700;"><?php echo $site_address ?></p>
                            </center>
                        </div>
                    </div>
                    <div class="brd flex pd-10" style="width:100%">
                        <div style="width:48%" class="rline">
                            <div>
                                <center><b>Customer Details</b></center>
                            </div>
                            <div>Name : <b><?php echo $c_name ?></b></div>
                            <div>Mobile : <b><?php echo $c_mobile ?></b></div>
                            <div>Whatsapp : <b><?php echo $c_whatsapp ?></b></div>
                            <div>E-Mail Id : <b><?php echo $c_email ?></b></div>
                            <div>Address : <b><?php echo $c_address ?></b></div>
                        </div>
                        <div style="text-align:end;width:48%">
                            <div>
                                <center><b>Bank Details</b></center>
                            </div>
                            <div>Acc Name : <b><?= $account_holder_name ?></b></div>
                            <div>Acc Number : <b><?= $account_number ?></b></div>
                            <div>IFSC Code : <b><?= $ifsc_code ?></b></div>
                            <div>Bank Name : <b><?= $bank_name ?></b></div>
                            <div>Branch : <b><?= $branch_name ?></b></div>
                        </div>
                    </div>
                    <table style="width:100%">
                        <thead>
                            <tr class="rbd bold">
                                <td>S.No</td>
                                <td>Code</td>
                                <td>Product Name</td>
                                <td>MRP (Rs)</td>
                                <td>Discount (%)</td>
                                <td>Quantity</td>
                                <td>Price (Rs)</td>
                                <td>Amount (Rs)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $k = 1;
                            $totalqty = 0;
                            $nettotal = 0;
                            foreach ($product as $key => $prod) {
                                $totalqty += $prod->p_quantity;
                                $nettotal += $prod->p_nettotal;
                            ?>
                                <tr class="rbd">
                                    <td><?php echo $k ?></td>
                                    <td><?php echo $prod->p_id ?></td>
                                    <td><?php echo $prod->p_name ?></td>
                                    <td><?php echo number_format($prod->p_mrp, 2) ?></td>
                                    <td><?php echo $prod->p_discount ?></td>
                                    <td><?php echo $prod->p_quantity ?></td>
                                    <td><?php echo number_format($prod->p_price, 2) ?></td>
                                    <td><?php echo number_format($prod->p_total, 2) ?></td>
                                </tr>
                            <?php $k++;
                            } ?>
                        <tbody class="brd" style="text-align:center;">
                            <tr class="bold">
                                <td colspan="7" style="text-align:end;">Net Total (Rs) : </td>
                                <td><?php echo number_format($nettotal, 2) ?></td>
                            </tr>
                            <tr class="bold">
                                <td colspan="7" style="text-align:end;">Discount Price (Rs) : </td>
                                <td><?php echo number_format(($nettotal - $total), 2) ?></td>
                            </tr>
                            <tr class="bold">
                                <td colspan="7" style="text-align:end;">Sub Total (Rs) : </td>
                                <td><?php echo number_format($total, 2) ?></td>
                            </tr>
                            <tr class="bold">
                                <td colspan="7" style="text-align:end;">Packing Charge (Rs) : </td>
                                <td><?php echo number_format($pcharge, 2) ?></td>
                            </tr>
                            <tr class="bold">
                                <td colspan="7" style="text-align:end;">Promotion Discount (Rs) : </td>
                                <td><?php echo number_format($promodiscount, 2) ?></td>
                            </tr>
                        </tbody>
                        </tbody>
                    </table>
                    <div class="brd flex pdlr">
                        <div class="col">
                            <center>Total items : <b><?php echo $k - 1 ?></center></b>
                        </div>
                        <div class="col">
                            <center>Total Quantity : <b><?php echo number_format($totalqty) ?></b></center>
                        </div>
                        <div class="col">
                            <center><b>Overall Total (Rs) : <?php echo number_format($finialtotal, 2) ?></b></center>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="bottom">
            <a href="<?= $site_url ?>/pdf?oid=<?= $oid ?>" target="_blank" class="btn btn-success">Download PDF</a>
        </div>
    </main>

    <!-- footer - start -->
    <?php include("./utilities/footer.php") ?>
    <!-- footer - end -->
</body>

</html>