<!DOCTYPE html>
<html lang="en">

<?php include("./utilities/head.php") ?>
<style>
    .cardzs {
        width: 100%;
        min-height: 254px;
        background: repeating-linear-gradient(242deg, #abd04a1f, #ffffff21 100px);
        box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }
</style>

<body>
    <!-- Navbar - Start -->
    <?php include("./utilities/nav.php") ?>
    <!-- Navbar - End -->

    <!-- Hero Section - Start -->
    <div class="container-fluid hero about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title text-center">Track Your Order</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section - End -->

    <!-- AboutUs Cont - Start -->
    <div class="col-md-12 pb-5 pt-5 overflow_hidden">
        <div class="row">
            <div class="col-lg-2 p-5">
            </div>
            <div class="col-lg-4 col-md-6 p-5">
                <center>
                    <form class="cardzs pb-3" id="track_form">
                        <div style="line-height:30px; padding: 14px 0px 1px 1px; text-align:center; text-transform:uppercase; font-weight:600">
                            <label for="order_id">Order Id * : </label>
                            <br />
                            <input type="text" name="order_id" id="order_id" required />
                        </div>
                        <div style="line-height:30px; padding: 14px 0px 1px 1px; text-align:center; text-transform:uppercase; font-weight:600">
                            <label for="user_input">E - Mail / Phone Number * : </label>
                            <br />
                            <input type="text" name="user_input" id="user_input" required />
                        </div>
                        <input type="submit" id="trackBtn" class="btn btn-success" value="Track" readonly />
                    </form>
                </center>
            </div>

            <div class="col-md-6 p-5">
                <center>
                    <div id="order_status" class="cardzs p-3 d-flex justify-content-center align-items-center">
                        <h2>#Track your order here</h2>
                    </div>
                    <!-- <div id="c-after" class="cardzs p-3 d-flex justify-content-center align-items-center">
                        <div>
                            <h2 id="order_status">Your order details</h2>
                            <h2>Order Id : <b>DRSFCFG</b></h2>
                            <h2>Order Value : <b>14,265</b></h2>
                            <h2>Order Status : <b>Pending</b></h2>
                        </div>
                    </div> -->
                </center>
            </div>

        </div>
    </div>
    <!-- Why Choose Us Section - End -->

    <!-- Footer Section - Start -->
    <?php include("./utilities/footer.php") ?>
    <!-- Footer Section - End -->

    <?php include("./utilities/script.php") ?>

    <script>
        // form submit - start
        $("#track_form").submit((event) => {
            $("#trackBtn").prop('disabled', true).val("Tracking...");
            event.preventDefault();
            let order_id = $("#order_id").val().trim();
            let user_input = $("#user_input").val().trim();

            const isNumeric = /^\d+$/; // All digits
            const mobileRegex = /^[6-9]\d{9}$/; // Indian mobile number
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email format

            if (order_id == "" && user_input == "") {
                Swal.fire({
                    title: "Field Cannot be Empty!",
                    icon: "warning",
                }).then(() => {
                    $("#trackBtn").prop('disabled', false).val("Track");
                });
                return;
            }

            if (isNumeric.test(user_input)) {
                if (!mobileRegex.test(user_input)) {
                    Swal.fire({
                        title: "Please enter valid Mobile number!",
                        icon: "warning",
                    }).then(() => {
                        $("#trackBtn").prop('disabled', false).val("Track");
                    });
                    return;
                }
            } else if (!emailRegex.test(user_input)) {
                Swal.fire({
                    title: "Please enter valid Email Id!",
                    icon: "warning",
                }).then(() => {
                    $("#trackBtn").prop('disabled', false).val("Track");
                });
                return;
            }

            const formdata = {
                'order_id': order_id,
                'user_input': user_input,
                'req_type': 'getStatus',
            };

            $.ajax({
                type: 'POST',
                url: '<?= $admin_url ?>/backend/orders/',
                data: formdata,
                success: (response) => {
                    let result = JSON.parse(response);
                    if (result.status) {
                        let status;
                        switch (result.data.status) {
                            case 6:
                                status = "Cancelled";
                                break;

                            case 5:
                                status = "Deliverd";
                                break;

                            case 4:
                                status = "Packing";
                                break;

                            case 3:
                                status = "Amt Received";
                                break;

                            case 2:
                                status = "Amt Pending";
                                break;

                            default:
                                status = "Order Received"
                                break;
                        }
                        $("#order_status").empty();
                        $("#order_status").append(`<div>
                                                        <h2>Your order details</h2>
                                                        <h2>Order Id : <b>${result.data.order_id}</b></h2>
                                                        <h2>Order Value : <b>&#8377; ${result.data.final_total.toLocaleString('en-IN')}</b></h2>
                                                        <h2>Order Status : <b>${status}</b></h2>
                                                    </div>`);
                    } else {
                        Swal.fire({
                            title: result.message.trim(),
                            icon: 'error',
                            customClass: {
                                confirmButton: 'my-swal-confirm-button',
                            },
                        });
                    }
                },
                error: (xhr, status, error) => {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
            $("#trackBtn").prop('disabled', false).val("Track");
        });
        // form submit - end
    </script>
</body>

</html>