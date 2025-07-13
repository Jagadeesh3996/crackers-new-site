<?php $device = $_COOKIE['device']; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- Head Start -->
<?php include("./utilities/head.php") ?>
<link rel="stylesheet" href="<?= $site_url ?>/assets/css/estimate.css">
<!-- Head END -->

<body>
    <!-- navigation - start -->
    <?php include("./utilities/nav.php") ?>
    <!-- navigation - end -->

    <!-- Main Section - Start -->
    <main>
        <!-- Cart -->
        <section class="mt-3">
            <div class="container-lg">
                <div class="row">
                    <form method="post" id="form">
                        <div class="p-2 d-flex justify-content-end">
                            <a href="<?= $site_url ?>/estimate/" class="btn btn-success m-0">Continue Shopping</a>
                        </div>

                        <?php
                        if ($device  == 'desktop') {  // for laptop view
                        ?>
                            <table class="table table-secondary table-striped cth">
                                <thead>
                                    <tr>
                                        <th style="color: #000000 !important;">Image</th>
                                        <th style="color: #000000 !important;">Product Name</th>
                                        <th style="color: #000000 !important;">MRP Price</th>
                                        <th style="color: #000000 !important;">Discount Price</th>
                                        <th style="color: #000000 !important;">Qty</th>
                                        <th style="color: #000000 !important;">Total</th>
                                        <th style="color: #000000 !important;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="cart-list"></tbody>
                            </table>
                        <?php
                        } else {    // for tablet view
                        ?>
                            <div class="row w-100 m-0 cart-list"></div>
                        <?php
                        }
                        ?>

                        <div class="row mt-4 details text-center">
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="name">Name : </label>
                                <input type="text" id="name" name="name" placeholder="Enter Your Name ..." required />
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="number">Number : </label>
                                <input type="number" id="number" name="number" placeholder="Enter Your Number ..." oninput="pnumvalitate()" required />
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="whatsapp">Whatsapp : </label>
                                <input type="number" id="whatsapp" name="whatsapp" placeholder="Enter Your Whatsapp ..." oninput="pnumvalitate()" required />
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="email">E-Mail : </label>
                                <input type="email" id="email" name="email" placeholder="Enter Your E-Mail ..." required />
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label class="pt-0" for="address">Address : </label>
                                <textarea class="ms-1" name="address" id="address" placeholder="Enter Your Address ..." cols="24" required></textarea>
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="email">Select State : </label>
                                <select class="state" onchange="stateChange()" required>
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
                                <input class="btn btn-success promo rounded-2 m-1" style="width:110px;display:none;" id="pcodeapply" value="Apply" readonly />
                                <input class="btn btn-danger promo rounded-2 m-1" style="width:110px;display:none;" id="pcodeclear" value="Clear" readonly />
                            </div>
                            <div class="col-12 bg-2 pt-3">
                                <h4>Minimum Order : &#8377; <span id="mov">0</span></h4>
                            </div>
                            <div class="col-12 bg-1 text-light pt-3">
                                <h4>Total Quantity : <span id="finalqty">0</span></h4>
                            </div>
                            <div class="col-12 bg-2 pt-3">
                                <h4>Total : &#8377; <span id="amt">0</span></h4>
                            </div>
                            <div class="col-12 bg-1 text-light pt-3">
                                <h4>Packing Charge : &#8377; <span id="pcamt">0</span></h4>
                            </div>
                            <div class="col-12 bg-2 pt-3">
                                <h4>Promotion Discount : &#8377; <span id="pdamt">0</span></h4>
                            </div>
                            <div class="col-12 bg-1 text-light pt-3">
                                <h4>Overall Total : &#8377; <span id="finalamt">0</span></h4>
                            </div>
                            <div class="col-12 p-2">
                                <a href="<?= $site_url ?>/estimate/" class="btn btn-success">Continue Shopping</a>
                                <input type="submit" class="btn btn-success bg-1 text-light" value="Confirm Order" readonly />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- Main Section - End -->

    <!-- footer - start -->
    <?php include("./utilities/footer.php") ?>
    <!-- footer - end -->

    <!-- Script Start -->
    <?php include('./utilities/script.php') ?>
    <!-- Script End -->

    <script>
        let raw = sessionStorage.getItem("products");
        let data = JSON.parse(raw ? (raw == 'undefined' ? '[]' : raw) : '[]');

        //checking data
        if (!data || data.length == 0)
            window.location.href = "<?= $site_url ?>/estimate/";
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
                url: "<?= $admin_url ?>/backend/coupon/",
                data: formData,
                success: (response) => {
                    if (response.trim() == "No Discount") {
                        Swal.fire({
                            text: `Invalid Code! - No Discount`,
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
        const stateChange = () => {
            const option = $(".state").val();
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
        };
        // state - end

        // total amount - start
        const ctotal = () => {
            let total = 0;
            $("#finalqty").text((Math.ceil(data.reduce((acc, item) => acc + +item.p_quantity, 0))).toLocaleString());
            amt = data.map((data) => {
                return (total += data.p_price * data.p_quantity);
            }).pop();
            $("#amt").text(Math.ceil(amt).toLocaleString());
            overall();
        };
        // total amount - end

        // qty validate start
        const cvalitate = (id) => {
            let val = $("#cqty_" + id).val();
            (!Number(val)) ? $("#cqty_" + id).val(1): $("#cqty_" + id).val(val.replace(/[^0-9]/g, '').substring(0, 3))
            const indexToChange = data.findIndex(obj => obj.p_id == id);
            let qty = $("#cqty_" + id).val();
            let price = data[indexToChange].p_price;
            let mrp = data[indexToChange].p_mrp;
            data[indexToChange].p_quantity = qty;
            data[indexToChange].p_nettotal = mrp * qty;
            data[indexToChange].p_total = price * qty;
            sessionStorage.setItem("products", JSON.stringify(data));
            $(".subtotal_" + id).text(($(".amount_" + id).text() * $("#cqty_" + id).val()).toLocaleString());
            ctotal();
            stateChange();
        };
        // qty validate end

        // number validate start
        const pnumvalitate = () => $(event.target).val($(event.target).val().replace(/[^0-9]/g, '').substring(0, 10));
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
            const indexToChange = data.findIndex(obj => obj.p_id == id);
            let price = Number(data[indexToChange].p_price);
            let mrp = Number(data[indexToChange].p_mrp);
            data[indexToChange].p_quantity = qty;
            data[indexToChange].p_nettotal = qty * mrp;
            data[indexToChange].p_total = qty * price;
            sessionStorage.setItem("products", JSON.stringify(data));
            $("#cqty_" + id).val(qty);
            $(".subtotal_" + id).text((qty * $(".amount_" + id).text()).toLocaleString());
            ctotal();
            stateChange();
        };
        // quantity - end

        // remove product - start
        const remove = (id) => {
            data = data.filter(item => item.p_id != id);
            sessionStorage.setItem("products", JSON.stringify(data));
            if (data.length == 0)
                window.location.href = "<?= $site_url ?>/estimate/";
            addData();
        };
        // remove product - end

        // add product to cart - start
        const addData = () => {
            ctotal();
            $(".cart-list").empty();
            data.forEach((data, index) => {
                let images = data.p_image == "" ? [] : JSON.parse(data.p_image);
                let thumb = images.length ? `<?= $admin_url ?>/uploads/${images[0]}` : `<?= $site_url ?>/assets/images/logo.png`;
                let bgcol = (index % 2 == 0) ? "bg-box2" : "bg-box1";
                let html;
                if ("<?= $device ?>" == 'desktop') {
                    html = $(
                        `<tr>
                                <td><img src="${thumb}" alt="${data.p_name}" class="cr-cart-img" /></td>
                                <td style="font-weight: 700 !important;color: #000000;">${data.p_name}</td>
                                <td style="font-weight: 700 !important;color: #000000;"><s style="color:red">&#8377; ${(data.p_mrp).toLocaleString()}</s></td>
                                <td style="font-weight: 700 !important;color: #000000;">&#8377; <span class="amount_${data.p_id}">${(data.p_price).toLocaleString()}</span></td>
                                <td class="cr-cart-qty">
                                    <div class="cart-qty-plus-minus">
                                        <button type="button" onclick="cqty('minus', ${data.p_id})">-</button>
                                        <input type="text" placeholder="0" oninput="cvalitate(${data.p_id})" id="cqty_${data.p_id}" value="${data.p_quantity}" />
                                        <button type="button" onclick="cqty('plus', ${data.p_id})">+</button>
                                    </div>
                                </td>
                                <td style="font-weight: 700 !important;color: #000000;">&#8377; <span class="subtotal_${data.p_id}">${(data.p_total).toLocaleString()}</span></td>
                                <td>
                                    <a href="#" onclick="remove(${data.p_id})">
                                        <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                    </a>
                                </td>
                            </tr>`
                    );
                } else {
                    html = $(`
                                <div class="col-lg-4 col-sm-6 col-12 p-0 ps-2 py-2">
                                    <div class="card prdcard ${bgcol}">
                                        <p class="pt-2 px-3 mb-0 flex justify-content-between">
                                            <span class="product">${data.p_name}</span>
                                            <svg width="20" viewBox="0 0 512 512" onclick="remove(${data.p_id})" style="cursor:pointer;">
                                                <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/>
                                            </svg>
                                        </p>
                                        <div class="d-flex justify-content-evenly align-items-center flex-wrap" style="justify-content: space-evenly;min-height:100px;">
                                        <img class="cimg" src="${thumb}" alt="${data.p_name}" />
                                        <div class="d-flex">
                                            <p> &#8377; <span class="amount_${data.p_id}">${(data.p_price).toLocaleString()}</span></p>
                                            <span>&nbsp;/&nbsp;</span>
                                            <p><s style="color:red"> &#8377; ${(data.p_mrp).toLocaleString()}</s></p>
                                        </div>
                                        <div class="mbot flex">
                                            <div class="mins flex" onclick="cqty('minus', ${data.p_id})"> - </div>
                                            <input type="number" class="nop pinp" oninput="calc(${data.p_id})" id="cqty_${data.p_id}" placeholder="qty" value="${data.p_quantity}" />
                                            <div class="plus flex" onclick="cqty('plus', ${data.p_id})"> + </div>
                                        </div>
                                        </div>
                                        <p class="pstotal mb-0 pt-1" style="font-weight: 700 !important;color: #000000;">&#8377; <span class="subtotal_${data.p_id}">${(data.p_total).toLocaleString()}</span></p>
                                    </div>
                                </div>
                            `);
                }
                $(".cart-list").append(html);
            });
        };
        // add product to cart - end

        // form submit - start
        $("#form").on("submit", (event) => {
            $("#form [type='submit']").prop('disabled', true).val('...');
            data = data.filter(item => item.p_quantity != 0);
            sessionStorage.setItem("products", JSON.stringify(data));
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
                    'name': name,
                    'phone': number,
                    'whatsapp': whatsapp,
                    'email': email,
                    'address': `${address}, ${state}.`,
                    'products': sessionStorage.getItem("products"),
                    'refer': $("#refer").val().trim(),
                    'total': Math.ceil(amt),
                    'packing_charge': pcamt,
                    'promotion_discount': pdamt,
                    'final_total': finalamt,
                    'req_type': 'add',
                };
                console.log(sessionStorage.getItem("products"));
                console.log(formdata);

                $.ajax({
                    type: 'POST',
                    url: '<?= $admin_url ?>/backend/orders/',
                    data: formdata,
                    success: (response) => {
                        let result = JSON.parse(response);
                        if (result.status) {
                            order_id = result.order_id;
                            Swal.fire({
                                title: 'Order Placed successfully!',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'my-swal-confirm-button',
                                },
                            }).then(() => {
                                sessionStorage.setItem("products", JSON.stringify([]));
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
                        $("#form").removeClass("loading");
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