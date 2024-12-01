<?php
session_start();
include 'check_login.php';
check_loginAdmin();
include 'connection.php';
$conn = OpenCon();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <!----======== CSS ======== -->
   <link rel="stylesheet" href="css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/argon.js?v=1.0.0"></script>
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>Admin</title> 
</head>
<body>
    <?php require('navbar.php');?>

    <section class="dashboard">
    <div class="top">
    

            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="module__wrapper__form__content__title">
                                    <?php  
                                    $admin_id = $_SESSION['id'];

                                    $ret = "SELECT * FROM  user WHERE id = '$admin_id'";
                                    $stmt = $conn->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($aa = $res->fetch_object()) {
                                    ?>
                        <h2><?php echo $aa->firstname ?> <?php echo $aa->lastname ?></h2>
                        <?php } ?>

                    </div>
        </div>

        <?php

      ?>


        <div class = "margin3">
        <div class="container-fluid mt--8">
        <div class="row">
          <div class="col">
            <div class="card shadow">
              <div class="card-header border-0">
                <h3>Please Fill All Fields</h3>
              </div>
              <div class="card-body">
              <form method="POST">
                <div class="form-row">
                  <div class="col">
                    <label>First Name</label>
                    <input type="text" name="cfirst" value = "" class="form-control">
                  </div>
                  <div class="col">
                    <label>Last Name</label>
                    <input type="text" name="clast" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class = "form-row">
                  <div class="col">
                    <label>Username</label>
                    <input type="text" name="cusn" class="form-control" value="">
                  </div>
                <div class="col">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addAdmin" value="Add Admin" class="btn btn-success" value="">
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
        </div>

    
<?php  if (isset($_POST['addAdmin'])) {
    
    if (empty($_POST["cfirst"]) || empty($_POST["clast"])  || empty($_POST['cusn']) || empty($_POST['pass']) ) {
      $err = "Blank Values Not Accepted";
    } else {
      $first = $_POST['cfirst'];
      $last = $_POST['clast'];
      $uname = $_POST['cusn'];
      $pass = $_POST['pass'];

 
        $sql = "SELECT * FROM user WHERE username='$uname'";
        $result2 = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result2) === 1) { ?>
            <script>
            Swal.fire(
            'Error',
            'Username are already created!',
            'error'
            )
            </script>
            
        <?php }else{
            $sql = "INSERT INTO user (username,firstname,lastname, password, type) VALUES ('$uname','$first','$last', '$pass', 'Admin')";
            if (mysqli_query($conn, $sql)) {?>
                    <script>
                        Swal.fire(
                    'Success',
                    'Admin Acount Updated!',
                    'success'
                    )
                    </script>
            <?php echo "<script>setTimeout(function(){window.location.href = 'manage_users.php';}, 1000);</script>";        exit;

             } else { ?>
              <script>
                Swal.fire(
            'Error',
            'Error Updating Account!',
            'error'
            )
            </script>
                header("Location: register.php?error=Error creating new account.");

           <?php }
        }
    
  
    }
  } 

?>


    </section>

    <script src="js/admin.js"></script>
</body>
</html>

