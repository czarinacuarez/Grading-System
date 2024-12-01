<?php
session_start();
include 'check_login.php';
include 'connection.php';
$conn = OpenCon();
check_loginUser();




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
   <link rel="stylesheet" href="css/user.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/argon.js?v=1.0.0"></script>
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>User</title> 
</head>
<body>



    <?php require('navbarUsers.php');?>

    <section class="dashboard">
    <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="module__wrapper__form__content__title">
                        <h2><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?></h2>
            </div>
    </div>

                   <!-- Page content -->
    <!-- Page content -->
    <div class ="margin">
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3>Best in Mobile Application Category Grade Rubrics</h3>
            </div>
            <div class="card-body">
              <form method="POST" id ="grades-form" action = "submit_grades.php" >
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
                        <?php
                      $ret = "SELECT * FROM groups2 INNER JOIN groups on groups2.group_id = groups.group_id ";
                      $stmt = $conn->prepare($ret);
                      $stmt->execute();
                      $res = $stmt->get_result();
                      ?>
                  
                <div class="form-row">
                  <div class="col">
                    <label>Group Name</label>
                    <select name="categorys" class="form-control" required>
                    <?php while ($ri = $res->fetch_array()) {  ?>
                    <option value=<?php echo $ri['group2_id'] ?>><?php echo $ri['group_name'] ?></option>
                    <?php }?>
                    </select>
                  </div>
                </div>
                <hr>

                <div class = "form">
                <div class = "">
                <table class="table-wrapper">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Maximum Score</th>
                                        <th>Score</th>

                                    </tr>
                                </thead>
                                <tbody>
                                        
                                        <tr>
                                        <td><b>Functionality</b></td>
                                            <td>Assess the range of features and capabilities offered by the mobile app. Projects with a wide 
range of useful functions should score higher.</td>
                                            <td>35 Points</td>
                                            <td><input type = "number" min = "0" max = "35" name = "functionality" class = "form-control" required></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                        <td><b>User Interface</b></td>
                                            <td>Evaluate the design, layout, and overall aesthetics of the mobile application. Higher scores 
should go to projects with an intuitive and visually appealing interface</td>
                                            <td>25 Points</td>
                                            <td><input type = "number" min = "0" max = "25" name = "user_interface" class = "form-control" required></td>
                                        </tr>
                                            <td><b>Performance</b></td>
                                            <td>Evaluate the app's speed, responsiveness, and efficiency. Higher scores should go to apps with 
fast and smooth performance.</td>
                                            <td>10 Points</td>
                                            <td><input type = "number" min = "0" max = "10" name = "performance" class = "form-control" required></td>
                                        </tr>
                                      
                                        <tr>
                                        <td><b>Usability</b></td>
                                            <td>Consider how easy it is for users to navigate the app, perform tasks, and access information. 
Projects with excellent usability should receive higher scores.
</td>
                                            <td>10 Points</td>
                                            <td><input type = "number" min = "0" max = "10" name = "usability" class = "form-control" required></td>
                                        </tr>
                                        <tr>
                                        <td><b>Innovation</b></td>
                                            <td>Assess the originality and creativity of the mobile app's concept or features. Higher scores 
should go to projects that introduce novel solutions.</td>
                                            <td>10 Points</td>
                                            <td><input type = "number" min = "0" max = "10" name = "innovation" class = "form-control" required></td>
                                        </tr>
                                        <tr>
                                        <td><b>Compatibility</b></td>
                                            <td>Evaluate the app's compatibility with different devices, operating systems, and screen sizes. 
Projects with wide compatibility should score higher.</td>
                                            <td>10 Points</td>
                                            <td><input type = "number" min = "0" max = "10" name = "compatibility" class = "form-control" required></td>
                                        </tr>
                                </tbody>
                </table>
                    </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="submitGrade3" value="Submit Grades" class="btn btn-success" id="submit-grades-button" value="">
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