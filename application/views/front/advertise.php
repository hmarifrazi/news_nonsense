        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Advertise</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                    <?= $this->session->flashdata('message'); ?>
                        <div class="contact-form">
                            <h4 class="text-center" style="border-bottom: 3px double #000000;">Advertisement Form</h4>
                            <form  action="<?= base_url('homeCtrl/advert_save') ?>" enctype="multipart/form-data" class="mt-5" method="post">
                                    <div class="form-group">
                                        <input type="text" name="fullname" class="form-control" placeholder="Full Name" />
                                    </div>
                                <div class="form-group">
                                    <input type="email" name="email_address" class="form-control" placeholder="Email" />
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="company_name" class="form-control" placeholder="Company Name" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="url" name="company_website" class="form-control" value="http://" placeholder="Website" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="company_address" class="form-control" placeholder="Company Address" />
                                </div>
                                <div class="form-group">
                                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number" />
                                </div>
                                <div class="form-group">
                                    <label for="file">Select files to upload</label>
                                    <input type="file" name="image" class="form-control-file" id="file">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="5" placeholder="Message/Description"></textarea>
                                </div>
                                <div class="col-2 offset-5 mt-3"><button name="submit" class="btn" type="submit">Submit</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h3>Advertise with us and get no exposure at all</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            
                            <h4><i class="fa fa-map-marker"></i>123 Nonsense Street, Nowhere, Earth.</h4>
                            <h4><i class="fa fa-envelope"></i>info@example.com</h4>
                            <h4><i class="fa fa-phone"></i>+123-456-7890</h4>
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
            </div>
        </div>
        <!-- Contact End -->