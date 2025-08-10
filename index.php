<!DOCTYPE html>
<html lang="en">

<?php include("./utilities/head.php") ?>

<body>
    <!-- Navbar - Start -->
    <?php include("./utilities/nav.php") ?>
    <!-- Navbar - End -->

    <!-- Hero Section - Start -->
    <div class="container-fluid hero homeHero">
        <div class="owl-carousel owl-theme homeHeroCaro">
            <?php
            $query = "SELECT * FROM tbl_homebanner WHERE status = 1 ORDER BY id ASC";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="item" style="background-image: url('<?= $admin_url ?>/uploads/<?= $row['banner'] ?>')"></div>
            <?php } ?>
        </div>
    </div>
    <!-- Hero Section - End -->

    <!-- Aboutus Section - Start -->
    <?php include('aboutUsCont.php') ?>
    <!-- Aboutus Section - End -->

    <!-- Our Products Section - Start -->
    <div class="container-fluid products">
        <h1 class="smallTitle text-center">Products</h1>
        <h1 class="title text-center">Our Products</h1>
        <div class="container mt-4">
            <div class="row rowgap">
                <div class="col-lg-4 mt-4 col-md-6 col-12">
                    <div class="card">
                        <div class="cardHead">
                            <img src="assets/img/Ourproducts/Garlands1.jpg" alt="image">
                        </div>
                        <div class="cardBody">
                            <h1 class="titleTwo">Garlands</h1>
                            <p class="description">The walas are well-known and are frequently utilised at religious events, weddings, festivals, and huge gatherings.When purchasing garland crackers, you will notice numbers such as 100 wala, 200 wala, 500 wala, and so on.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="cardHead">
                            <img src="assets/img/Ourproducts/Chakkara1.jpg" alt="image">
                        </div>
                        <div class="cardBody">
                            <h1 class="titleTwo">Ground Chakkara</h1>
                            <p class="description">Chakkar is a circular firecracker that spins on the ground. It's a very spectacular firework that whirls around and emits sparks. It's bright, sparkling, and safe.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 col-md-6 col-12">
                    <div class="card">
                        <div class="cardHead">
                            <img src="assets/img/Ourproducts/FLower-Pots1.jpg" alt="image">
                        </div>
                        <div class="cardBody">
                            <h1 class="titleTwo">Flower Pots</h1>
                            <p class="description">Our flower pots are the most spectacular firework display. It's a dazzling show of colour, sound, sparkles, and whistles. They produce insignificant fumes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 col-md-6 col-12">
                    <div class="card">
                        <div class="cardHead">
                            <img src="assets/img/Ourproducts/Sparklers1.jpg" alt="image">
                        </div>
                        <div class="cardBody">
                            <h1 class="titleTwo">Sparklers</h1>
                            <p class="description">A sparkler is a sort of hand-held firework that emits dazzling, vivid coloured flames, sparks, and other effects while burning slowly.Sparklers are very popular among children.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="cardHead">
                            <img src="assets/img/Ourproducts/Sound-Crackers1.jpg" alt="image">
                        </div>
                        <div class="cardBody">
                            <h1 class="titleTwo">Sound Crackers</h1>
                            <p class="description">Fireworks sound crackers are known as bombs or garlands, and they burst with huge sounds and remain ablaze for an extended amount of time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 col-md-6 col-12">
                    <div class="card">
                        <div class="cardHead">
                            <img src="assets/img/Ourproducts/Rockets1.jpg" alt="image">
                        </div>
                        <div class="cardBody">
                            <h1 class="titleTwo">Rockets</h1>
                            <p class="description">For Diwali, purchase a bottle rocket, a colour star, and a sky blow up rocket cracker/fireworks. We have a large selection of Diwali & Marriage Sky Rockets in a variety of colours. ASR Pyro Park traders in Sivakasi sells Baby Rocket Crackers at a reasonable price.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Products Section - End -->

    <!-- Our Service Section - Start  -->
    <?php include("service.php") ?>
    <!-- Our Service Section - End  -->

    <!-- Why Choose Us Section - Start -->
    <?php include("whyChooseUs.php") ?>
    <!-- Why Choose Us Section - End -->

    <!-- Contact form Section - Start -->
    <?php include('./utilities/contactForm.php') ?>
    <!-- Contact Form Section - End -->

    <!-- Footer Section - Start -->
    <?php include("./utilities/footer.php") ?>
    <!-- Footer Section - End -->

    <?php include("./utilities/script.php") ?>
</body>

</html>
