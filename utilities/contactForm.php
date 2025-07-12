
<div class="container-fluid contactForm">
    <h1 class="smallTitle text-center">Get In Touch</h1>
    <h1 class="title text-center">Contact Us</h1>
    <div class="container mt-4">
        <div class="row rowgap">
            <div class="col-lg-6 col-md-6">
                <iframe
                    src="https://www.google.com/maps?q=<?php echo $site_address ?>&output=embed"
                    style="border:0;" width="100%" height="400px" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
            <div class="col-lg-6 col-md-6" style="margin: auto;">
                <div class="right">
                    <form class="form-group php-email-form" method="post" role="form" id="contact">
                        <div class="inner">
                            <label for="">Name :</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Enter Your Name" required="" />
                        </div>
                        <div class="inner">
                            <label for="">Email :</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Enter Your Email" required="" />
                        </div>
                        <div class="inner">
                            <label for="">Mobile Number :</label>
                            <input class="form-control" type="number" name="phone" id="phone" placeholder="Enter Your Mobile Number" oninput="numvalitate()" required="" />
                        </div>
                        <div class="inner">
                            <label for="">Message :</label>
                            <textarea class="form-control" id="message" name="message" rows="4" cols="50" placeholder="Enter Your Message"></textarea>
                        </div>
                        <input type="submit" class='btn' name="contactFormSubmit" value="Submit" id="submitBtn" readonly />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>