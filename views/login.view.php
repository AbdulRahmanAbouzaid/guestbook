<?php
    $title = "Sign In";
    include 'layout/header.view.php';     
?>

<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="public/img/signin-image.jpg" alt="sing in image"></figure>
                </div>

                <div class="signin-form">
                    <?php include 'layout/errors.view.php'; ?>
                    <h2 class="form-title">Sign In</h2>
                    <form method="POST" action="/login" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="text" name="email" id="email" placeholder="Your email"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Password"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                        <div class="form-group">
                            <a href="/register" class="signup-image-link">Create an account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>

<?php include 'layout/footer.view.php'; ?>