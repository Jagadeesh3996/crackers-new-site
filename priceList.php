<?php
require('admin/dompdf/autoload.inc.php');
include("admin/utilities/db.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Create HTML content for the PDF
$html = '
                <!DOCTYPE html>
                <html>
                    <head>
                        <title>Price List</title>
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
                        <style>
                            body {
                                font-family: Poppins;
                                font-style: normal;
                            }
                            table tr th,
                            table tr td{
                                padding: 5px !important;
                                vertical-align: middle !important;
                                border: 1px solid #000 !important;
                                line-height: 15px;
                            }
                            .cat{
                                font-weight: 600 !important;
                            }
                            .w-big{
                                width:300px;
                            }
                            .w-med{
                                width:100px;
                            }
                            .w-small{
                                width: 50px;
                            }
                        </style>
                    </head>
                    <body>
                        <main>';
$html .= '
                            <table class="table-bordered text-center border">
                                <tr>
                                    <td colspan="6" class="p-0"><h2 class="bg-danger mb-0 text-white">' . $site_name . ' <a href="' . $site_url . '" target="_blank">(' . $domain . ')</a></h2></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="p-0"><h5 class="mb-0">' . $site_address . '</h5></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="p-0"><h5 class="mb-0">Whatsapp number: ' . $site_whatsapp_number . ', Mobile number: ' . $site_mobile_number . '</h5></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="p-0"><h5 class="mb-0">Discount upto 80% offer! Hurry Up....</h5></td>
                                </tr>
                                <thead class="text-uppercase bg-danger text-white">
                                    <tr>
                                        <th>S.No</th>
                                        <th class="w-big">Product Name</th>
                                        <th class="w-med">MRP Price (Rs)</th>
                                        <th>Discount Price (Rs)</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>';
$pquery = "SELECT * FROM tbl_category WHERE status = 1 GROUP BY CAST(SUBSTRING_INDEX(alignment, ' ', 1) AS UNSIGNED), SUBSTRING(alignment, LOCATE(' ', alignment) + 1)";
$presult = mysqli_query($conn, $pquery);
$sno = 1;
while ($row = mysqli_fetch_array($presult)) {
    $c_id = $row['id'];
    $category = $row['name'];
    $discount  = $row['discount'] ? $row['discount'] : "0";
    $queryitems = "SELECT * FROM tbl_product WHERE category='$category' AND status = 1 GROUP BY CAST(SUBSTRING_INDEX(alignment, ' ', 1) AS UNSIGNED), SUBSTRING(alignment, LOCATE(' ', alignment) + 1)";
    $resultitems = mysqli_query($conn, $queryitems);
    $row_count = mysqli_num_rows($resultitems);
    if ($row_count !== 0) {
        $html .= '
                                                    <tr class="pt-0">
                                                        <td colspan="6" class="bg-info text-white cat">' . $category . ' (' . $discount . '%)</td>
                                                    </tr>';
        while ($items = mysqli_fetch_array($resultitems)) {
            $mrp = $items['mrp'];
            $disprice = round($mrp - ($mrp * ($discount / 100)), 2);
            $html .= '
                                                                <tr>
                                                                    <td class="w-small">' . $sno . '</td>
                                                                    <td>' . $items['name'] . ' (' . $items['type'] . ')</td>
                                                                    <td><s>' . $mrp . '</s></td>
                                                                    <td>' . $disprice . '</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>';
            $sno++;
        }
    }
}
$html .= '
                                </tbody>
                            </table>
                        </main>
                    </body>
                </html>';

// Initialize dompdf
$dompdf->set_option('enable_html5_parser', TRUE);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter', 'portrait');
$dompdf->render();
$dompdf->stream("Price_List_'.$site_name.'.pdf", ["Attachment" => false]);
