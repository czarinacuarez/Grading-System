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
            $update = $_GET['update'];

        $ret = "SELECT * FROM  user WHERE id = '$update' ";
        $stmt = $conn->prepare($ret);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($cust = $res->fetch_object()) {?>


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
                    <input type="text" name="cfirst" value = "<?php echo $cust->firstname; ?>" class="form-control">
                  </div>
                  <div class="col">
                    <label>Last Name</label>
                    <input type="text" name="clast" class="form-control" value="<?php echo $cust->lastname; ?>">
                  </div>
                  <div class="col">
                    <label>Type</label>
                    <select name="ctype" id="type"  class="form-control">
                    <option value="<?php echo $cust->type; ?>" selected><?php echo $cust->type; ?></option>
                    <option value="Student">Student</option>
                    <option value="Professor">Professor</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class = "form-row">
                  <div class="col">
                    <label>Username</label>
                    <input type="text" name="cusn" class="form-control" value="<?php echo $cust->username; ?>">
                  </div>
                <div class="col">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" value="<?php echo $cust->password; ?>">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="updateUser" value="Update User" class="btn btn-success" value="">
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
        </div>
        <?php } ?>

    
<?php  if (isset($_POST['updateUser'])) {
    
    if (empty($_POST["cfirst"]) || empty($_POST["clast"]) || empty($_POST['cusn']) || empty($_POST['pass']) ) {
      $err = "Blank Values Not Accepted";
    } else {
      $first_name = $_POST['cfirst'];
      $last_name = $_POST['clast'];
      $type = $_POST['ctype'];
      $usn = $_POST['cusn'];
      $pass = $_POST['pass'];
      $update = $_GET['update'];

 
  
      $postQuery = "UPDATE user SET firstname=? , lastname=?, type=?, username=?, password=?  WHERE id =?";
      $postStmt = $conn->prepare($postQuery);
      $rc = $postStmt->bind_param('ssssss', $first_name, $last_name, $type, $usn, $pass , $update);
      $postStmt->execute();
      if ($postStmt) { ?>
      <script>
                Swal.fire(
            'Success',
            'User Acount Updated!',
            'success'
            )
        </script>
        <?php 
            echo "<script>setTimeout(function(){window.location.href = 'manage_users.php';}, 1000);</script>";        exit;
        } else { ?>
            <script>
                Swal.fire(
            'Error',
            'Error Updating Account!',
            'error'
            )
        </script>
      <?php }
    }
  } 

?>


    </section>

    <script src="js/admin.js"></script>
</body>
</html>

