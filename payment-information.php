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
                    <h1 class="title text-center">Payment information</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section - End -->

    <!-- AboutUs Cont - Start -->
    <div class="col-md-12 pb-5 pt-5 overflow_hidden">
        <div class="row">

            <?php
            foreach ($bank_list as $key => $value) {
            ?>
                <div class="col-md-4 p-5">
                    <center>
                        <div class="cardzs">
                            <div style="line-height:30px;    padding: 44px 0px 1px 1px; text-align:center; text-transform:uppercase; font-weight:600">
                                <b>Bank Info</b> <br>
                                Name : <?= $value[1] ?> <br>
                                <?= $value[0] ?> <br>
                                AC No : <?= $value[2] ?> <br>
                                IFSC : <?= $value[3] ?> <br>
                                Branch name : <?= $value[4] ?> <br>
                            </div>
                        </div>
                    </center>
                </div>
            <?php
            }
            ?>
            <?php
            foreach ($scan_list as $key => $value) {
            ?>
                <div class="col-md-4 p-5">
                    <center>
                        <div class="cardzs">
                            <div style="line-height:30px; padding: 63px 0px 1px 1px;text-align:center; text-transform:uppercase; font-weight:600">

                                <b><?= $value[0] ?></b>
                                <br> Phone No : <?= $value[1] ?><br>

                            </div>
                        </div>
                    </center>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Why Choose Us Section - End -->

    <!-- Footer Section - Start -->
    <?php include("./utilities/footer.php") ?>
    <!-- Footer Section - End -->

    <?php include("./utilities/script.php") ?>
</body>

</html>