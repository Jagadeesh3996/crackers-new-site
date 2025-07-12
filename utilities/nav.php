<style>
    .buttonaa {
        border-radius: .25rem;
        text-transform: uppercase;
        font-style: normal;
        font-weight: 400;
        padding-left: 25px;
        padding-right: 25px;
        color: #fff;
        -webkit-clip-path: polygon(0 0, 0 0, 100% 0, 100% 0, 100% calc(100% - 15px), calc(100% - 15px) 100%, 15px 100%, 0 100%);
        clip-path: polygon(0 0, 0 0, 100% 0, 100% 0, 100% calc(100% - 15px), calc(100% - 15px) 100%, 15px 100%, 0 100%);
        height: 40px;
        font-size: 0.7rem;
        line-height: 14px;
        letter-spacing: 1.2px;
        transition: .2s .1s;
        background-image: linear-gradient(90deg, #1c1c1c, #acd14a);
        border: 0 solid;
        overflow: hidden;
    }

    .buttonaa:hover {
        cursor: pointer;
        transition: all .3s ease-in;
        padding-right: 30px;
        padding-left: 30px;
    }
</style>
<div class="container-fluid headerTop">
    <div class="container">
        <marquee direction="left"><?php echo $site_discount ?>% Discount Offer is Going On -- Phonepay - <b><?= $site_phonepay_number ?></b> -- Googlepay - <b><?= $site_googlepay_number ?></b></marquee>
    </div>
</div>
<div class="container-fluid headerBot">
    <div class="container">
        <div class="row " style="row-gap: 15px">
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 left">
                <div class="text-center">
                    <a href="<?= $site_url ?>/">
                        <img src="<?= $site_url ?>/assets/images/logo.png" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 col-12" style="margin: auto;">
                <div class="inner">
                    <a href="tel:91<?php echo $site_mobile_number ?>" class="footer_links ps-2 buttonaa">
                        <p class="description text-white" style="margin-bottom: 0px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                <path d="m20.487 17.14-4.065-3.696a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a.997.997 0 0 0-.085-1.39z"></path>
                            </svg> <?php echo $site_mobile_number ?>
                        </p>
                    </a>
                    <a href="https://wa.me/+91<?php echo $site_whatsapp_number ?>" class="footer_links ps-2  buttonaa" target="_blank">
                        <p class="description text-white" style="margin-bottom: 0px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263"></path>
                            </svg> <?php echo $site_whatsapp_number ?>
                        </p>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="margin: auto;">
                <div>
                    <p class="description mb-0 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 5px" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                            <path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path>
                        </svg>
                        <?php echo $site_address ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?= $site_url ?>/"><img src="<?= $site_url ?>/assets/images/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" id="tog-btn" onclick="togShow()"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="tog-show" class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="margin: auto;">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= $site_url ?>/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $site_url ?>/estimate/">Estimate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $site_url ?>/payment-information/">Payment Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $site_url ?>/about/">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $site_url ?>/contact/">Contact Us</a>
                </li>
            </ul>
            <a href="<?= $site_url ?>/estimate/"><input type="button" value="Estimate Now" class="btn"></a>
        </div>
    </div>
</nav>