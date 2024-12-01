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
              <h3>Best in Hardware Category Grade Rubrics</h3>
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
                      $ret = "SELECT * FROM groups1 INNER JOIN groups on groups1.group_id = groups.group_id ";
                      $stmt = $conn->prepare($ret);
                      $stmt->execute();
                      $res = $stmt->get_result();
                      ?>
                  
                <div class="form-row">
                  <div class="col">
                    <label>Group Name</label>
                    <select name="categorys" class="form-control" required>
                    <?php while ($ri = $res->fetch_array()) {  ?>
                    <option value=<?php echo $ri['group1_id'] ?>><?php echo $ri['group_name'] ?></option>
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
                                        <td><b>Innovation</b></td>
                                            <td>Assess the originality and creativity of the hardware design. Consider factors like unique 
sensor integrations, custom-made components, or unconventional hardware solutions</td>
                                            <td>35 Points</td>
                                            <td><input type = "number" min = "0" max = "35" name = "innovation" class = "form-control" required></td>
                                        </tr>
                                        <tr>
                                            <td><b>Performance</b></td>
                                            <td>Evaluate the overall performance of the hardware, including data accuracy, speed, and 
efficiency. Higher scores should go to projects with superior hardware capabilities</td>
                                            <td>25 Points</td>
                                            <td><input type = "number" min = "0" max = "25" name = "performance" class = "form-control" required></td>
                                        </tr>
                                        <tr>
                                        <td><b>Robustness and Reliability</b></td>
                                            <td>Examine the hardware's durability and resilience in various conditions. A high score should be 
given to projects with hardware that can withstand environmental challenges.</td>
                                            <td>10 Points</td>
                                            <td><input type = "number" min = "0" max = "10" name = "robustness" class = "form-control" required></td>
                                        </tr>
                                        <tr>
                                        <td><b>Scalability</b></td>
                                            <td>Assess whether the hardware can be easily scaled or adapted for broader applications. Projects 
with modular and extensible hardware should receive higher scores.
</td>
                                            <td>10 Points</td>
                                            <td><input type = "number" min = "0" max = "10" name = "scalability" class = "form-control" required></td>
                                        </tr>
                                        <tr>
                                        <td><b>User Experience</b></td>
                                            <td>Consider the ease of use, user-friendliness, and ergonomic design of the hardware. Projects 
with a superior user experience should score higher.</td>
                                            <td>10 Points</td>
                                            <td><input type = "number" min = "0" max = "10" name = "user_experience" class = "form-control" required></td>
                                        </tr>
                                        <tr>
                                        <td><b>Cost Effectiveness</b></td>
                                            <td>Compare the hardware's cost with its performance and features. Higher scores should go to 
projects with good cost-effectiveness</td>
                                            <td>10 Points</td>
                                            <td><input type = "number" min = "0" max = "10" name = "cost_effectiveness" class = "form-control" required></td>
                                        </tr>
                                </tbody>
                </table>
                    </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="submitGrade2" value="Submit Grades" class="btn btn-success" id="submit-grades-button" value="">
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