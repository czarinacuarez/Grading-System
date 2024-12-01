<?php
session_start();
include 'check_login.php';
include 'connection.php';
$conn = OpenCon();

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "DELETE FROM  user WHERE  id = ?";
    $stmt = $conn->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
      header("refresh:1; url=manage_users.php");
    } else {
    }
  }


  if (isset($_GET['deletes'])) {
    $id = intval($_GET['deletes']);
    $adn = "DELETE FROM  user WHERE  id = ?";
    $stmt = $conn->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
      header("refresh:1; url=manage_users.php");
    } else {
    }
  }


check_loginAdmin();

if(isset($_SESSION['username'])&& isset($_SESSION['password'])){

    $usn = $_SESSION['username'];
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
    <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@argon/css/css/argon.css">


    <title>Admin</title> 
</head>
<body>
    <?php require('navbar.php');?>

    <section class="dashboard">
    <div class="top">
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
                        <?php } ?>

                    </div>
        </div>

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

                   <!-- Page content -->
        <div class = "margin">
            <div class="container-fluid mt--7">
            <div class="row mt-5">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                    <div class="col">
                                            <h3 class="mb-0">Panelist</h3>
                                    </div>
                                    <div class="col text-right">

                                    <a href="add_panelist.php" class="btn btn-outline-success">
                                        <i class="fas fa-user-plus"></i>
                                         Add New Panelist
                                        </a>
                                    </div>
                            </div>
                        </div>
            <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Panelist Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $ret = "SELECT * FROM  user WHERE  type = 'Panelist'";
                                    $stmt = $conn->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($aa = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $aa->firstname ?> <?php echo $aa->lastname ?></td>
                                            <?php if ( $aa->type  == 'Student'){ ?>
                                            <td><span class='badge badge-danger'>Student</span></td>
                                            <?php }else{ ?>
                                                <td><span class='badge badge-success'>Panelist</span></td>
                                            <?php } ?>
                                            <td><?php echo $aa->username ?></td>
                                            <td>
                                            <a href="manage_users.php?deletes=<?php echo $aa->id?>">
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
                                            </a>
                                            <a href="update_user.php?update=<?php echo $aa->id ?>">
                                            <button class="btn btn-sm btn-primary">
                                                <i class="fas fa-user-edit"></i>
                                                Update
                                            </button>
                                            </td>
                                        </tr>

                                      <?php }  ?>
                                </tbody>
                            </table>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class = "margin">
            <div class="container-fluid mt--7">
            <div class="row mt-5">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                    <div class="col">
                                            <h3 class="mb-0">Admin</h3>
                                    </div>
                                    <div class="col text-right">

                                    <a href="add_admin.php" class="btn btn-outline-success">
                                        <i class="fas fa-user-plus"></i>
                                         Add New Admin
                                        </a>
                                    </div>
                            </div>
                        </div>
            <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Admin Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $ret = "SELECT * FROM  user WHERE type = 'Admin' AND NOT username = '$usn' ";
                                    $stmt = $conn->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($aa = $res->fetch_object()) {
                                    ?>
                                           <tr>
                                            <td><?php echo $aa->firstname ?> <?php echo $aa->lastname ?></td>
                                            <td><?php echo $aa->username ?></td>
                                            <td>
                                            <a href="manage_users.php?delete=<?php echo $aa->id ?>">
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
                                            </a>
                                            </td>
                                        </tr>
                                      <?php }  ?>
                                </tbody>
                            </table>
            </div>
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