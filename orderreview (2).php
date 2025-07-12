<?php
include('admin/dashboard/db.php');

// check url parameter  is set or not
if (isset($_GET['oid'])) {
    $oid = $_GET['oid'];
} else {
    header("Location: $site_url/sivakasi-crackers-price-list/");
    exit();
}

// fetch data
$query = "select * from tbl_orders where order_id='$oid' and status>='1' limit 1";
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
    $finialtotal = $item['final_total'];
    $product = json_decode($item['products']);
} else {
    header("Location: $site_url/sivakasi-crackers-price-list/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--<< Header Area >>-->
    <?php $meta_title = 'Order Review Page' ?>
    <?php $meta_description = 'Order Review Page' ?>
    <?php $meta_keywords = 'Order Review Page' ?>
    <?php include './utilities/head.php' ?>
    <link rel="stylesheet" href="<?= $site_url ?>/assets/css/estimate.css">
</head>

<body>
    <!-- navigation - start -->
    <?php include("./utilities/navbar.php") ?>
    <!-- navigation - End -->

    <!-- Breadcumb Section   S T A R T -->
    <div class="breadcumb-section mt-3">
        <div class="breadcumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcumb-content">
                            <h1 class="breadcumb-title">Order Review</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Section - Start -->
    <main class="overflow-auto mt-3">
        <div class="download">
            <a href="<?= $site_url ?>/orderpdf?oid=<?= $oid ?>" target="_blank">
                <p class="btn btn-success">Download PDF</p>
            </a>
            <a href="<?= $site_url ?>/sivakasi-crackers-price-list/">
                <p class="btn btn-danger">Back</p>
            </a>
        </div>
        <br />
        <main class="pd-15" id="main" style="min-width:600px">
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
                                <p class="fw-20"><b><?php echo $site_name ?></b></p>
                                <p><?php echo $site_address ?></p>
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
                            <div>Refer by : <b><?php echo $item['refer'] ?></b></div>
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
                                <td colspan="2">Product Name</td>
                                <td>MRP (Rs)</td>
                                <!--<td>Discount (%)</td>-->
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
                                $totalqty += $prod->prd_qty;
                                $nettotal += $prod->prd_nettotal;
                                $p_id = $prod->prd_id;
                                $q2 = "select * from tbl_product where id='$p_id' limit 1";
                                $res2 = mysqli_query($conn, $q2);
                                $item = mysqli_fetch_array($res2);
                            ?>
                                <tr class="rbd">
                                    <td><?php echo $k ?></td>
                                    <td><?php echo $item['alignment'] ?></td>
                                    <td colspan="2"><?php echo $prod->prd_name ?></td>
                                    <td><?php echo number_format($prod->prd_mrp, 2) ?></td>
                                    <!--<td><?php echo $prod->prd_discount ?></td>-->
                                    <td><?php echo $prod->prd_qty ?></td>
                                    <td><?php echo number_format($prod->prd_price, 2) ?></td>
                                    <td><?php echo number_format($prod->prd_total, 2) ?></td>
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
                            <tr style="border-top: 2px solid black;">
                                <td colspan="3">
                                    <center>Total items : <b><?php echo $k - 1 ?></b></center>
                                </td>
                                <td colspan="2">
                                    <center>Total Quantity : <b><?php echo number_format($totalqty) ?></b></center>
                                </td>
                                <td colspan="2" class="text-end"><b>Overall Total (Rs) : </b></td>
                                <td colspan="2"><b><?php echo number_format($finialtotal, 2) ?></b></td>
                            </tr>
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <div class="bottom">
            <a href="<?= $site_url ?>/orderpdf?oid=<?= $oid ?>" target="_blank" class="btn btn-success text-light">Download PDF</a>
        </div>
    </main>
    <!-- Main Section - End -->

    <!--<< Footer Section Start >>-->
    <?php include './utilities/footer.php' ?>

    <!--<< All JS Plugins >>-->
    <?php include './utilities/script.php' ?>

</body>

</html>