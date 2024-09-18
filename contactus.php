<div class="row align-items-center">
                <div class="col-md-6 my-5">
                    <h6 class="mb-0 sectitle" style="font-size: 50px; color: #ffffff">Get in touch with us</h6> <br>
                    <p class="mb-4">We value each customer's perspective and cherish the opportunity to hear from you. Whether you have a question, feedback, or just want to share your thoughts, we encourage you to reach out. Your insights drive us to continually enhance your experience.</p>

                    <h6 class="mb-0">Address</h6>
                    <p class="mb-4">Level 1, Shop 5, 20 King Street, Caboolture Queensland 4510, Australia</p>
                    <h6 class="mb-0">Phone</h6>
                    <p class="mb-4">0413502977</p>

                    <h6 class="mb-0">Email</h6>
                    <p class="mb-0">info@glowinwellness.com.au</p>

                </div>
                <div class="col-md-5" style="border-radius: 10px; background-color: #f2f2f2; padding: 20px; opacity: 100%;">
                <form method="post">
                    <h4 class="text-center" style="font-size: 20px; color: #7E007D;">We'd love to hear from you!</h4>
                    <br>
                    <?php 
                        if (isset($_SESSION['role'])){
                            $disabled = 'disabled';
                            // Store session values in hidden fields to be passed with form submission
                            echo '<input type="hidden" name="name" value="'.$_SESSION['first_name']. " " .$_SESSION['last_name'] .'">';
                            echo '<input type="hidden" name="email" value="'.$_SESSION['email'].'">';
                        } else {
                            $disabled = 'required';
                        }
                    ?>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <input type="text" class="form-control rounded-0 bg-transparent" name="name" placeholder="Name*" <?php echo $disabled; ?> value="<?php echo isset($_SESSION['first_name'], $_SESSION['last_name']) ? $_SESSION['first_name']. ' ' .$_SESSION['last_name'] : ''; ?>">
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="email" class="form-control rounded-0 bg-transparent" name="email" placeholder="Email*" <?php echo $disabled; ?> value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <input type="text" class="form-control rounded-0 bg-transparent" name="subject" placeholder="Subject*" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <textarea name="message" id="contactMessageBot" cols="30" rows="4" class="form-control rounded-0 bg-transparent" placeholder="Message*" required></textarea>
                        </div>
                        <div class="form-group col-12 mb-0">
                            <button type="submit" name="submit" class="btn btn-primary rounded w-md mt-3">Send</button>
                        </div>
                    </div>
                </form>

                </div>

            </div>
            <br><br><br>
                <div class="container">
                    
                        <div class="row">
                            <div class="col-md-4">
                                <img src="assets/imgs/logo.svg" alt="Glow in Wellness Logo" class="img-fluid mb-3">
                                
                            </div>
                            <div class="col-md-4">
                                <table class="table table-borderless text-white">
                                    <tbody>
                                        <tr>
                                            <td class="padding-cell"><strong>Mon</strong></td>
                                            <td class="padding-cell">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="padding-cell"><strong>Tue-Thurs</strong></td>
                                            <td class="padding-cell">09:00 am – 02:00 pm</td>
                                        </tr>
                                        <tr>
                                            <td class="padding-cell"><strong>Fri</strong></td>
                                            <td class="padding-cell">12:00 pm – 02:00 pm</td>
                                        </tr>
                                        <tr>
                                            <td class="padding-cell"><strong>Sat</strong></td>
                                            <td class="padding-cell">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="padding-cell"><strong>Evenings & Sundays:</strong></td>
                                            <td class="padding-cell">By Appointment</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4 text-center">
                                
                                <h1 class="h5 sectitle" style="font-size: 60px; color: #ffffff">Live with Wellness</h1>

                                <a target="_blank" href="#">
                                    <img class="footericon" src="assets/imgs/fb_icon.png" alt="fb_icon">
                                  </a>
                                  <a target="_blank" href="#">
                                    <img class="footericon" src="assets/imgs/instagram_icon.png" alt="ig_icon">
                                  </a>
                                  <a target="_blank" href="#">
                                    <img class="footericon" src="assets/imgs/LinkedIn_icon.png" alt="linkin_icon">
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>