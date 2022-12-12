    <!-- Footer Start -->
    <div class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <div class="footer-widget">
                        <h3 class="title">Get in touch</h3>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>123 News Street, NY, USA</p>
                            <p><i class="fa fa-envelope"></i>info@example.com</p>
                            <p><i class="fa fa-phone"></i>+123-456-7890</p>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="footer-widget">
                        <h3 class="title">Subscribe to our newsletter</h3>
                        <div class="newsletter">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed porta dui. Class
                                aptent taciti sociosqu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                                sed porta dui.
                            </p>
                            <form method="post" action="<?= base_url('homeCtrl/newsletter')?>">
                                <input name="email_address" class="form-control" type="email" placeholder="Your email here">
                                <button class="btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a href="#">2022 News Nonsense</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Javascript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url(); ?>lib/slick/slick.min.js"></script>

    <!-- Javascript -->
    <script src="<?php echo base_url(); ?>js/main.js"></script>

    <!-- Stylesheet -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">

</body>

</html>