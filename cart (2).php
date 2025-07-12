<?php
//today date
$dateonly = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!--<< Header Area >>-->
    <?php $meta_title = 'Cart Page' ?>
    <?php $meta_description = 'Cart Page' ?>
    <?php $meta_keywords = 'Cart Page' ?>
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
                            <h1 class="breadcumb-title">Cart</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Section - Start -->
    <section class="section-cart pt-3 padding-b-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cr-cart-content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="row">
                            <form method="post" id="form">
                                <div class="cr-table-content">
                                    <table class="table table-secondary table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Product</th>
                                                <th class="text-center">price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cart-list"></tbody>
                                    </table>
                                </div>
                                <div class="row mt-4 details text-center">
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="name">Name : </label>
                                        <input type="text" id="name" name="name" placeholder="Enter Your Name ..." required />
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="number">Number : </label>
                                        <input type="number" id="number" name="number" placeholder="Enter Your Number ..." oninput="numvalitate()" required />
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="whatsapp">Whatsapp : </label>
                                        <input type="number" id="whatsapp" name="whatsapp" placeholder="Enter Your Whatsapp ..." oninput="numvalitate()" required />
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="email">E-Mail : </label>
                                        <input type="email" id="email" name="email" placeholder="Enter Your E-Mail ..." required />
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3 d-flex align-items-center justify-content-center">
                                        <label class="pt-0" for="address">Address : </label>
                                        <textarea class="ms-1" name="address" id="address" placeholder="Enter Your Address ..." cols="24" required></textarea>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="email">Select State : </label>
                                        <select class="state" required>
                                            <option value="" hidden>Select State</option>
                                            <?php
                                            $squery = "select * from `tbl_state` where status=1";
                                            $sresult = mysqli_query($conn, $squery);
                                            while ($srow = mysqli_fetch_array($sresult)) {
                                                $minimumOrder = ($srow['minimum_order_value'] == "") ? $site_minimum_order : $srow['minimum_order_value'];
                                            ?>
                                                <option value="<?= $srow['state'] ?>/<?= $srow['packing_charge'] ?>/<?= $minimumOrder ?>/<?= $srow['max_order_value'] ?>"><?= $srow['state'] ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="refer">Refer by : </label>
                                        <input type="text" id="refer" name="refer" placeholder="Refer by ..." />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="promo" id="hpc" class="fw-20" style="cursor: pointer;">Have Promotion Code ?</label>
                                        <input type="text" class="promo" id="promo" style="display:none;">
                                        <input class="btn btn-success promo rounded-2 m-1" style="width:90px;display:none;" id="pcodeapply" value="Apply" readonly />
                                        <input class="btn btn-danger promo rounded-2 m-1" style="width:90px;display:none;" id="pcodeclear" value="Clear" readonly />
                                    </div>
                                </div>
                                <div class="cr-table-content">
                                    <table class="table tfinal">
                                        <tbody class="final">
                                            <tr>
                                                <td class="text-center p-3 bg-color fs-5">Minimum Order : &#8377; <span id="mov">0</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center p-3 logo-bg text-light fs-5">Total Quantity : <span id="finalqty">0</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center p-3 bg-color fs-5">Total : &#8377; <span id="amt">0</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center p-3 logo-bg text-light fs-5">Packing Charge : &#8377; <span id="pcamt">0</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center p-3 bg-color fs-5">Promotion Discount : &#8377; <span id="pdamt">0</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center logo-bg p-3 text-light fs-4">Overall Total : &#8377; <span id="finalamt">0</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cr-cart-update-bottom">
                                            <a href="<?= $site_url ?>/buy-crackers-sivakasi-online-price-list/" class="btn btn-success text-light">Continue Shopping</a>
                                            <input type="submit" class="btn btn-success text-light" value="Confirm Order" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Section - End -->

    <!--<< Footer Section Start >>-->
    <?php include './utilities/footer.php' ?>

    <!--<< All JS Plugins >>-->
    <?php include './utilities/script.php' ?>

    <script>
        let data = JSON.parse(sessionStorage.getItem("carts"));
        // noofprd();
        //checking data
        if (!data || data.length == 0)
            window.location.href = "<?= $site_url ?>/sivakasi-crackers-price-list/";
        let amt = 0;
        pcamt = 0;
        pdamt = 0;
        maxOrder = 0;
        finalamt = 0;
        let order_id;
        let state;
        let miniOrder = <?= $site_minimum_order ?>;
        $("#mov").text(miniOrder.toLocaleString());
        $("#hpc").on("click", () => ($(".promo").toggle()));

        // final values - start
        const overall = () => {
            finalamt = Math.ceil(amt + pcamt - pdamt);
            $("#finalamt").text(finalamt.toLocaleString());
        };
        // final values - end

        // discount - start
        $("#pcodeapply").click((event) => {
            const code = $("#promo").val();
            let formData = {
                'promocode': code,
                'req_type': 'checkCode'
            };
            $.ajax({
                type: "POST",
                url: "<?= $site_url ?>/admin/dashboard/backend/coupon.php",
                data: formData,
                success: (response) => {
                    if (response.trim() == "No Discount") {
                        Swal.fire({
                            text: `Code Not Valit - No Discount`,
                            icon: "error"
                        }).then(() => {
                            $("#pdamt").text("0");
                            pdamt = 0;
                            overall();
                        });
                    } else {
                        pdamt = Math.round(amt * (response / 100));
                        Swal.fire({
                            text: `Congratulation! You got a discount of Rs. ${pdamt.toLocaleString()}`,
                            icon: "success"
                        }).then(() => {
                            $("#pdamt").text(pdamt.toLocaleString());
                            overall();
                        });
                    }
                },
                error: (error) => {
                    console.log(error);
                }
            });
        });
        $("#pcodeclear").click((event) => {
            $("#promo").val("");
            $("#pdamt").text("0");
            pdamt = 0;
            overall();
        });
        // discount - end

        // state - start
        $(".state").on("change", (event) => {
            const option = $(event.target).val();
            if (option) {
                state = option.split("/")[0];
                const charge = Number(option.split("/")[1]);
                miniOrder = Number(option.split("/")[2]);
                let maxOrder = Number(option.split("/")[3]);
                pcamt = (amt >= maxOrder) ? 0 : Math.round(amt * (charge / 100));
                $("#pcamt").text(pcamt.toLocaleString());
                $("#mov").text(miniOrder.toLocaleString());
            } else {
                pcamt = 0;
                $("#pcamt").text("0");
            }
            overall();
        });
        // state - end

        // total amount - start
        const ctotal = () => {
            let total = 0;
            $("#finalqty").text((Math.ceil(data.reduce((acc, item) => acc + +item.prd_qty, 0))).toLocaleString());
            amt = data.map((data) => {
                return (total += data.prd_price * data.prd_qty);
            }).pop();
            $("#amt").text(Math.ceil(amt).toLocaleString());
            overall();
        };
        // total amount - end

        // qty validate start
        const cvalitate = (id) => {
            let val = $("#cqty_" + id).val();
            (!Number(val)) ? $("#cqty_" + id).val(1): $("#cqty_" + id).val(val.replace(/[^0-9]/g, '').substring(0, 3))
            const indexToChange = data.findIndex(obj => obj.prd_id == id);
            let qty = $("#cqty_" + id).val();
            let price = data[indexToChange].prd_price;
            let mrp = data[indexToChange].prd_mrp;
            data[indexToChange].prd_qty = qty;
            data[indexToChange].prd_nettotal = mrp * qty;
            data[indexToChange].prd_total = price * qty;
            sessionStorage.setItem("carts", JSON.stringify(data));
            // noofprd();
            $(".subtotal_" + id).text(($(".amount_" + id).text() * $("#cqty_" + id).val()).toLocaleString());
            ctotal();
        };
        // qty validate end

        // number validate start
        const numvalitate = () => $(event.target).val($(event.target).val().replace(/[^0-9]/g, '').substring(0, 10));
        // number validate end

        // quantity - start
        const cqty = (opt, id) => {
            let qty = $("#cqty_" + id).val();
            if (opt == 'minus') {
                if (qty > 1)
                    qty -= 1;
            }
            if (opt == "plus") {
                if (qty < 999)
                    qty = 1 + +qty;
            }
            const indexToChange = data.findIndex(obj => obj.prd_id == id);
            let price = data[indexToChange].prd_price;
            let mrp = data[indexToChange].prd_mrp;
            data[indexToChange].prd_qty = qty;
            data[indexToChange].prd_nettotal = mrp * qty;
            data[indexToChange].prd_total = price * qty;
            sessionStorage.setItem("carts", JSON.stringify(data));
            // noofprd();
            $("#cqty_" + id).val(qty);
            $(".subtotal_" + id).text(($(".amount_" + id).text() * qty).toLocaleString());
            ctotal();
        };
        // quantity - end

        // remove product - start
        const remove = (id) => {
            data = data.filter(item => item.prd_id != id);
            sessionStorage.setItem("carts", JSON.stringify(data));
            // noofprd();
            if (data.length == 0)
                window.location.href = "<?= $site_url ?>/sivakasi-crackers-price-list/";
            addData();
        };
        // remove product - end

        // add product to cart - start
        const addData = () => {
            ctotal();
            $(".cart-list").empty();
            data.forEach((data, index) => {
                let imageurl = (data.prd_image == "") ? "<?= $site_url ?>/assets/images/logo.png" : `<?= $site_url ?>/admin/dashboard/uploads/${data.prd_image}`;
                let mrp = (Number(data.prd_mrp)).toFixed(2);
                let subtotal = data.prd_price * data.prd_qty;
                const items = $(
                    `<tr>
                            <td class="cr-cart-name">
                                <p><img src="${imageurl}" alt="${data.prd_name}" class="cr-cart-img" />${data.prd_name}</p>
                            </td>
                            <td class="cr-cart-price text-center">
                                <span>&#8377; <span class="amount_${data.prd_id}">${data.prd_price.toLocaleString()}</span></span>
                            </td> 
                            <td class="cr-cart-qty">
                                <div class="cart-qty-plus-minus">
                                    <button type="button" onclick="cqty('minus', ${data.prd_id})">-</button>
                                    <input type="text" placeholder="0" oninput="cvalitate(${data.prd_id})" id="cqty_${data.prd_id}" value="${data.prd_qty}" />
                                    <button type="button" onclick="cqty('plus', ${data.prd_id})">+</button>
                                </div>
                            </td>
                            <td class="cr-cart-subtotal text-center">&#8377; <span class="subtotal_${data.prd_id}">${subtotal.toLocaleString()}</span></td>
                            <td class="cr-cart-remove text-center">
                                <a href="#" onclick="remove(${data.prd_id})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 448 512">
                                        <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>`
                );
                $(".cart-list").append(items);
            });
        };
        // add product to cart - end

        // form submit - start
        $("#form").on("submit", (event) => {
            $("#form [type='submit']").prop('disabled', true).val('...');
            data = data.filter(item => item.prd_qty != 0);
            sessionStorage.setItem("carts", JSON.stringify(data));
            event.preventDefault();
            let name = $("#name").val().trim();
            let email = $("#email").val().trim();
            let ads = $('#address').val().trim();
            let address = ads.replace(/\n/g, ' ');
            let number = $("#number").val();
            let whatsapp = $("#whatsapp").val();

            if (name == "" && address == "") {
                Swal.fire({
                    title: "Field Cannot be Empty!",
                    icon: "warning",
                }).then(() => {
                    $("#form [type='submit']").prop('disabled', false).val('Confirm Order');
                });
                return false;
            };
            if (!/^[6789]\d{9}$/.test(number)) {
                Swal.fire({
                    title: "Please enter valid Mobile number!",
                    icon: "warning",
                }).then(() => {
                    $("#form [type='submit']").prop('disabled', false).val('Confirm Order');
                });
                return false;
            };
            if (!/^[6789]\d{9}$/.test(whatsapp)) {
                Swal.fire({
                    title: "Please enter valid whatsapp number!",
                    icon: "warning",
                }).then(() => {
                    $("#form [type='submit']").prop('disabled', false).val('Confirm Order');
                });
                return false;
            };
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                Swal.fire({
                    title: "Please enter valid Email Id!",
                    icon: "warning",
                }).then(() => {
                    $("#form [type='submit']").prop('disabled', false).val('Confirm Order');
                });
                return false;
            };
            if (amt < miniOrder) {
                Swal.fire({
                    title: `Minimum Order Value for Your State : ₹ ${miniOrder}`,
                    icon: "warning"
                }).then(() => {
                    $("#form [type='submit']").prop('disabled', false).val('Confirm Order');
                });
                return false;
            } else {
                const formdata = {
                    'date': '<?= $dateonly ?>',
                    'name': name,
                    'phone': number,
                    'whatsapp': whatsapp,
                    'email': email,
                    'address': `${address}, ${state}.`,
                    'refer': $("#refer").val().trim(),
                    'products': sessionStorage.getItem("carts"),
                    'total': amt,
                    'packing_charge': pcamt,
                    'promotion_discount': pdamt,
                    'final_total': finalamt,
                    'req_type': 'add',
                };                
                $.ajax({
                    type: 'POST',
                    url: '<?= $site_url ?>/admin/dashboard/backend/orders.php',
                    data: formdata,
                    success: (response) => {
                        console.log(response);
                        let result = JSON.parse(response);
                        if (result.status.trim() == "Success") {
                            order_id = result.order_id;
                            Swal.fire({
                                title: 'Order Placed successfully!',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'my-swal-confirm-button',
                                },
                            }).then(() => {
                                sessionStorage.setItem("carts", JSON.stringify([]));
                                // noofprd();
                                window.location.href = `<?= $site_url ?>/orderreview?oid=${order_id}`;
                            })
                        } else {
                            Swal.fire({
                                title: result.message.trim(),
                                icon: 'error',
                                customClass: {
                                    confirmButton: 'my-swal-confirm-button',
                                },
                            }).then(() => {
                                $("#form [type='submit']").prop('disabled', false).val('Confirm Order');
                            });
                        }
                    },
                    error: (xhr, status, error) => {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        // form submit - end
        addData();
    </script>
</body>

</html>