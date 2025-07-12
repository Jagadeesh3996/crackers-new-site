<?php
// include($_SERVER['DOCUMENT_ROOT'] . '/kickvy/admin/utilities/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/utilities/db.php');

$active = basename($_SERVER['PHP_SELF']);
$aurl = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jagadeesh">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="Website" />
    <meta property="og:locale" content="en_IN" />
    <meta property="og:locale:alternate" content="ta_IN" />

    <!-- ======== Page title ============ -->
    <title><?php echo (isset($meta_title)) ? $meta_title : $site_name ?></title>
    <meta name="description" content="<?php echo (isset($meta_description)) ? $meta_description : $site_name ?>" />
    <meta name="keywords" content="<?php echo (isset($meta_keywords)) ? $meta_keywords : $site_name ?>" />
    <meta property="og:title" content="<?php echo (isset($meta_title)) ? $meta_title : $site_name ?>" />
    <meta property="og:url" content="<?php echo (isset($aurl)) ? $aurl : $site_url ?>" />
    <meta property="og:image" content="<?php echo $site_url . '/assets/images/logo.png'; ?>" />
    <meta property="og:description" content="<?php echo (isset($meta_description)) ? $meta_description : $site_name ?>" />
    <meta property="og:site_name" content="<?= $site_name ?>" />
    <link rel="canonical" href="<?php echo (isset($aurl)) ? $aurl : $site_url ?>" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="<?= $site_url ?>/assets/images/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= $site_url ?>/assets/images/logo.png">

    <!-- css files -->
    <link rel="stylesheet" href="<?= $site_url ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $site_url ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $site_url ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $site_url ?>/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= $site_url ?>/assets/css/swiper-bundle.min.css">
</head>
<script>
    // Function to detect device based on screen width
    const detectDevice = () => {
        return (window.screen.width > 767) ? "desktop" : "tablet";
    };

    // Function to set cookie
    const setDeviceCookie = (value, reload) => {
        document.cookie = "device=" + value + "; path=/";
        if (reload) {
            // wait 100ms to ensure cookie is saved
            setTimeout(function() {
                location.reload();
            }, 100);
        }
    };

    // Always clear device cookie on each page load
    document.cookie = "device=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    setDeviceCookie(detectDevice());
</script>