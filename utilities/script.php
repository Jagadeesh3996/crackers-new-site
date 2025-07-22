<script src="<?= $site_url ?>/assets/js/jquery-3.7.1.min.js"></script>
<script src="<?= $site_url ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= $site_url ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= $site_url ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?= $admin_url ?>/assets/js/sweetalert2.all.min.js"></script>
<script src="<?= $site_url ?>/assets/js/src.js"></script>
<script src="<?= $site_url ?>/assets/js/swiper-bundle.min.js"></script>

<script>
    // Auto-update cookie on resize
    let resizeTimeout;
    $(window).on('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
            let newDevice = detectDevice();
            // Update cookie only if changed
            if (!document.cookie.includes("device=" + newDevice)) {
                setDeviceCookie(newDevice, true);
            }
        }, 300); // debounce to avoid rapid reloads
    });

    // number validate start
    const numvalitate = () => $(event.target).val($(event.target).val().replace(/[^0-9]/g, '').substring(0, 10));
    // number validate end

    // form submit - start
    $("#contact").submit((event) => {
        $("#submitBtn").prop('disabled', true).val("Loading...");
        event.preventDefault();
        let fname = $("#name").val().trim();
        let lname = '';
        let mail = $("#email").val().trim();
        let phone = $("#phone").val().trim();
        let message = $("#message").val().trim();

        if (fname == "") {
            Swal.fire({
                title: "Name Cannot be Empty!",
                icon: "warning",
            }).then(() => {
                $("#submitBtn").prop('disabled', false).val("Submit");
            });
        } else if (!/^[6789]\d{9}$/.test(phone)) {
            Swal.fire({
                title: "Please enter valid Mobile number!",
                icon: "warning",
            }).then(() => {
                $("#submitBtn").prop('disabled', false).val("Submit");
            });
        } else if (mail != "" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(mail)) {
            Swal.fire({
                title: "Please enter valid Email Id!",
                icon: "warning",
            }).then(() => {
                $("#submitBtn").prop('disabled', false).val("Submit");
            });
        } else {
            const formdata = {
                'fname': fname,
                'lname': lname,
                'phone': phone,
                'mail': mail,
                'message': message,
                'req_type': 'addct',
            };
            $.ajax({
                type: 'POST',
                url: '<?= $admin_url ?>/backend/orders/',
                data: formdata,
                success: (response) => {
                    if (response.trim() == "success") {
                        Swal.fire({
                            title: 'Enquriy Sent successfully!',
                            icon: 'success',
                            customClass: {
                                confirmButton: 'my-swal-confirm-button',
                            },
                        }).then(() => {
                            window.location.reload(true);
                        })
                    } else {
                        Swal.fire({
                            title: response.trim(),
                            icon: 'error',
                            customClass: {
                                confirmButton: 'my-swal-confirm-button',
                            },
                        }).then(() => {
                            $("#submitBtn").prop('disabled', false).val("Submit");
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
</script>