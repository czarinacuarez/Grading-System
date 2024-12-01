<?php
session_start();
include 'check_login.php';
check_loginAdmin();
include 'connection.php';
$conn = OpenCon();

if (isset($_POST['ChangeProfile'])) {
  $admin_id = $_SESSION['id'];
  $admin_name = $_POST['admin_name'];
  $admin_firstname = $_POST['admin_firstname'];
  $admin_lastname = $_POST['admin_lastname'];


  $Qry = "UPDATE user SET firstname =?, lastname =? , username = ? WHERE id =?";
  $postStmt = $conn->prepare($Qry);
  $rc = $postStmt->bind_param('ssss', $admin_firstname, $admin_lastname, $admin_name, $admin_id);
  $postStmt->execute();
  if ($postStmt) {
    $success_message = "Account Updated";
    header("Location: settingsadmin.php?success_message=" . urlencode($success_message));
  } else {
    $error_message = "Error Updating Account!";
    header("Location: settingsadmin.php?error_message=" . urlencode($error_message));
  }
}



if (isset($_POST['changePassword'])) {

  //Change Password
  $error = 0;
  if (!empty($_POST['old_password'])) {
    $old_password = $_POST['old_password'];
  } else {
    $error = 1;
    $error_message = "Old Password Cannot Be Empty";
    header("Location: settingsadmin.php?error_message=" . urlencode($error_message));

  }
  if (!empty($_POST['new_password'])) {
    $new_password = $_POST['new_password'];
  } else {
    $error = 1;
    $error_message = "New Password Cannot Be Empty";
    header("Location: settingsadmin.php?error_message=" . urlencode($error_message));

  }
  if ( !empty($_POST['confirm_password'])) {
    $confirm_password = $_POST['confirm_password'];
  } else {
    $error = 1;
    $error_message = "Confirmation Password Cannot Be Empty";
    header("Location: settingsadmin.php?error_message=" . urlencode($error_message));

  }

  if (!$error) {
    $admin_id = $_SESSION['id'];
    $sql = "SELECT * FROM user   WHERE id = '$admin_id'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_assoc($res);
      if ($old_password != $row['password']) {
        $error_message =  "Please Enter Correct Old Password";
        header("Location: settingsadmin.php?error_message=" . urlencode($error_message));

      } elseif ($new_password != $confirm_password) {
        $error_message = "Confirmation Password Does Not Match";
        header("Location: settingsadmin.php?error_message=" . urlencode($error_message));

      } else {

        $new_password  = $_POST['new_password'];
        //Insert Captured information to a database table
        $query = "UPDATE user SET  password =? WHERE id =?";
        $stmt = $conn->prepare($query);
        //bind paramaters
        $rc = $stmt->bind_param('ss', $new_password, $admin_id);
        $stmt->execute();

        //declare a varible which will be passed to alert function
        if ($stmt) {
          $success_message = "Password Changed";
          header("Location: settingsadmin.php?success_message=" . urlencode($success_message));

        } else {
          $error_message = "Please Try Again Or Try Later";
          header("Location: settingsadmin.php?error_message=" . urlencode($error_message));

        }
      }
    }
  }
} 

if(isset($_SESSION['username'])&& isset($_SESSION['password'])){
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
    <?php 
                if(isset($_GET['error_message'])): 
                $error_message = $_GET['error_message'];
            ?>
              <script>
                Swal.fire(
                  'Invalid',
                  '<?php echo $error_message; ?>',
                  'error'
                );
              </script>
            <?php endif; 
            if(isset($_GET['success_message'])): 
                $success_message = $_GET['success_message'];
            ?>
              <script>
                Swal.fire(
                  'Success',
                  '<?php echo $success_message; ?>',
                  'success'
                );
              </script>
            <?php endif; ?>

            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="module__wrapper__form__content__title">
                                    <?php  $admin_id = $_SESSION['id'];

                                    $ret = "SELECT * FROM  user WHERE id = '$admin_id'";
                                    $stmt = $conn->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($aa = $res->fetch_object()) {
                                    ?>
                        <h2><?php echo $aa->firstname ?> <?php echo $aa->lastname ?></h2>
                    </div>
        </div>

       
                   <!-- Page content -->

        <!-- Header container -->
      <!-- Page content -->

      <div class = "margin3">
      <div class="container-fluid mt--8">
        <div class="row">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <a href="#">
                      <img src="assets/img/theme/user-a-min.png" class="rounded-circle">
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                </div>
              </div>
              <div class="card-body pt-0 pt-md-4">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      <div>
                      </div>
                      <div>
                      </div>
                      <div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h3>
                    <?php echo $aa->firstname?> <?php echo $aa->lastname ?></span>
                  </h3>
                  <div class="h5 font-weight-300">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">My account</h3>
                  </div>
                  <div class="col-4 text-right">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form method="post">
                  <h6 class="heading-small text-muted mb-4">User information</h6>
                  <div class="pl-lg-4">
                  <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">First Name</label>
                          <input type="text" name="admin_firstname" value="<?php echo $aa->firstname ?>" class="form-control form-control-alternative" ">
                      </div>
                    </div>
                    <div class=" col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-email">Last Name</label>
                            <input type="text"  value="<?php echo $aa->lastname?>" name="admin_lastname" class="form-control form-control-alternative">
                          </div>
                    </div>

                  </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">User Name</label>
                          <input type="text" name="admin_name" value="<?php echo $aa->username?>" id="input-username" class="form-control form-control-alternative" ">
                      </div>
                    </div>
                    <?php } ?>


                        <div class="col-lg-12">
                          <div class="form-group">
                            <input type="submit" id="input-email" name="ChangeProfile" class="btn btn-success form-control-alternative" value="Submit"">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <hr>
              <form method ="post">
                            <h6 class="heading-small text-muted mb-4">Change Password</h6>
                            <div class="pl-lg-4">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-username">Old Password</label>
                                    <input type="password" name="old_password" id="input-username" class="form-control form-control-alternative">
                                  </div>
                                </div>

                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-email">New Password</label>
                                    <input type="password" name="new_password" class="form-control form-control-alternative">
                                  </div>
                                </div>

                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-email">Confirm New Password</label>
                                    <input type="password" name="confirm_password" class="form-control form-control-alternative">
                                  </div>
                                </div>

                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <input type="submit" id="input-email" name="changePassword" class="btn btn-success form-control-alternative" value="Change Password">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>

    </section>

    <script src="js/admin.js"></script>
</body>
</html>

<?php } ?>


