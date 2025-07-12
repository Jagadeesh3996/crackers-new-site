<!DOCTYPE html>
<html lang="en">

<?php include("./utilities/head.php") ?>

<body>
    <!-- Navbar - Start -->
    <?php include("./utilities/nav.php") ?>
    <!-- Navbar - End -->
    <!-- Hero Section - Start -->
    <div class="container-fluid hero contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title text-center">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section - End -->
    <div class="container-fluid contactUs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  ">
                    <div class="card">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                <path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path>
                            </svg>
                        </div>
                        <div>
                            <a style="color: #000" href="<?php echo $site_googlemap_location_url ?>" target="_blank">
                                <p class="mb-0"><?php echo $site_address ?></p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  ">
                    <div class="card">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                <path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path>
                            </svg>
                        </div>
                        <div>
                            <a style="color: #000" href="mailto:<?php echo $site_email ?>">
                                <p class="mb-0"><?php echo $site_email ?></p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  ">
                    <div class="card">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                <path d="m20.487 17.14-4.065-3.696a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a.997.997 0 0 0-.085-1.39z"></path>
                            </svg>
                        </div>
                        <div>
                            <a style="color: #000" href="tel:91<?php echo $site_alternate_mobile_number ?>">
                                <p class="mb-0"><?php echo $site_alternate_mobile_number ?></p>
                            </a>
                            <a style="color: #000" href="tel:91<?php echo $site_mobile_number ?>">
                                <p class="mb-0"><?php echo $site_mobile_number ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact form Section - Start -->
    <?php include('./utilities/contactForm.php') ?>
    <!-- Contact Form Section - End -->

    <!-- Footer Section - Start -->
    <?php include("./utilities/footer.php") ?>
    <!-- Footer Section - End -->

    <?php include("./utilities/script.php") ?>
</body>

</html>