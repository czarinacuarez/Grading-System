<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                    <div class="module__wrapper__form__content__title">
                        <h1><span>Student</span><span>  </span>Grading System</h1>
                    </div>
                    <form action="signup.php" method = "post" class="module__wrapper__form__content__login">
                    <?php if (isset($_GET['error'])) { ?>
                        <script>
                            Swal.fire(
                            'Error',
                            '<?php echo $_GET['error']; ?>',
                            'error'
                            )
				        </script>
                    <?php } else if (isset($_GET['success'])) { ?>
				        <script>
                            Swal.fire(
                            'Success',
                            '<?php echo $_GET['success']; ?>',
                            'success'
                            )
				        </script>
                    <?php } ?>
                    <div class="module__wrapper__form__content__login__field-select">
                            <label for="module">Register Account As:</label>
                            <select name="category" id="module">
                                <option value="Student">Student</option>
                                <option value="Professor">Professor</option>
                            </select>
                        </div>
                        <div class="separator"></div>
                        <div class="module__wrapper__form__content__login__field-input js-username">
                            <input type="text" name="username" autocomplete="off" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="module__wrapper__form__content__login__field-input js-firstname">
                            <input type="text" name="firstname" autocomplete="off" required>
                            <label for="firstname">First Name</label>
                        </div>
                        <div class="module__wrapper__form__content__login__field-input js-lastname">
                            <input type="text" name="lastname" autocomplete="off" required>
                            <label for="lastname">Last Name</label>
                        </div>
                        <div class="module__wrapper__form__content__login__field-input js-email">
                            <input type="password" name="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="module__wrapper__form__content__register__field-btn" required>
                            <button type = "submit" >Create Account</button>
                        </div>                        
                    </form>
                    <div class="module__wrapper__form__content__login__field-btn">
                            <button onclick = "login()">Log in Account</button>
                                <script>
                                function login() {
                                    window.location.href = "index.php";
                                }
                                </script>   
                    </div>
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
