<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title;?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?= base_url();?>/assets/assets-auth/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/assets-auth/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/assets-auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/assets-auth/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/assets-auth/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/assets-auth/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/assets-auth/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/assets-auth/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/assets-auth/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/assets-auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/assets-auth/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="/login/auth" method="post">
                    <span class="login100-form-title p-b-26">
                        Selamat Datang
                    </span>
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                    </span>

                    <?php if(session()->getFlashdata('msg')):?>
                        <span class="txt1" style="color:red;">
                            <?= session()->getFlashdata('msg') ?>
                        </span>
                    <?php endif;?>

                    <div class="wrap-input100 validate-input" data-validate = "Entry Valid email">
                        <input class="input100" type="text" name="email" required>
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password" required>
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <a class="txt2" href="/">
                            <span class="txt1">
                                PT Bimaruna Jaya
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="<?= base_url();?>/assets/assets-auth/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url();?>/assets/assets-auth/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url();?>/assets/assets-auth/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url();?>/assets/assets-auth/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url();?>/assets/assets-auth/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url();?>/assets/assets-auth/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url();?>/assets/assets-auth/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url();?>/assets/assets-auth/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url();?>/assets/assets-auth/js/main.js"></script>

</body>
</html>