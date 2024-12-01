<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 
    <script src="js/app.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body>
    <section class="module">
        <div class="module__wrapper">
            <div class="module__wrapper__seal">
                <div class="module__wrapper__seal__fixed">
                </div>
            </div>
            <div class="module__wrapper__form">
                <div class="module__wrapper__form__header">
                    <div class="module__wrapper__form__header__border">
                    </div>
                </div>
                <div class="module__wrapper__form__content">
                    <div>                    <img src="images/symposium.png" style = "width:100px" alt="">
                    <img src="images/nu.png" style = "width:100px" alt="">
                    <img src="images/apc.png" style = "width:100px" alt="">



</div>
                    <div class="module__wrapper__form__content__title">
                        <h1><span>NUFV</span > IoT Symposium 2023 Tabulation</h1>
                    </div>
                    <label class = "label">Enter Your Credentials </label>

                    <form action="login.php" method = "post" class="module__wrapper__form__content__login">
                    <?php if (isset($_GET['error'])) { ?>
				        <script>
                            Swal.fire(
                            'Error',
                            '<?php echo $_GET['error']; ?>',
                            'error'
                            )
				        </script>
                    <?php } ?>
                        <div class="module__wrapper__form__content__login__field-input js-username" >
                            <input type="text" name="username" autocomplete="off" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="module__wrapper__form__content__login__field-input js-firstname">
                            <input type="password" name="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="module__wrapper__form__content__login__field-btn">
                            <button type = "submit" >Log in</button>
                        </div>                        
                    </form>
                    <div class="module__wrapper__form__content__login__terms">
                            <p>For<a href="#"> Educational Purposes </a>only.
                            </p>
                        </div>
                        <div class="module__wrapper__form__content__login__copyright">
                            <p></p>
                        </div>
            </div>
        </div>
    </section>
</body>
</html>
