<?php
    $title = "Sign Up";
    include 'layout/header.view.php';     
?>

<div class="main">     
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <?php include 'layout/errors.view.php'; ?>
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" action="/register" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password-confirm" id="re_pass" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                        <div class="form-group">
                            <a href="/login" class="signup-image-link">I am already member</a>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="/public/img/signup-image.jpg" alt="sing up image"></figure>
                </div>
            </div>
        </div>
    </section>

</div>

<?php include 'layout/footer.view.php'; ?>