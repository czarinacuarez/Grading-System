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
    <style>
      

        input[type="radio"] {
            display: none;
            cursor: pointer;
        }
    </style>
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
              <h3>Best Booth Design Grade Rubrics</h3>
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
                      $ret = "SELECT * FROM groups  ";
                      $stmt = $conn->prepare($ret);
                      $stmt->execute();
                      $res = $stmt->get_result();
                      ?>
                  
                <div class="form-row">
                  <div class="col">
                    <label>Group Name</label>
                    <select name="categorys" class="form-control" required>
                    <?php while ($ri = $res->fetch_array()) {  ?>
                    <option value=<?php echo $ri['group_id'] ?>><?php echo $ri['group_name'] ?></option>
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
                                        <th>Excellent<br>(5 points)</th>
                                        <th>Very Good<br>(4 points)</th>
                                        <th>Good<br>(3 points)</th>
                                        <th>Fair<br>(2 points)</th>
                                        <th>Fail<br>(1 points)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                            <td><b>Visual Appeal and Branding</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio1" name="visual_appeal" value = "5">
                                            <label class="form-check-label" for="radio1">The booth design is visually stunning, aligns with the brand identity, and effectively communicates the company's message.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio2" name="visual_appeal" value = "4">
                                            <label class="form-check-label" for="radio2">The booth design is visually appealing and mostly aligns with the brand identity, with some minor improvements needed.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio3" name="visual_appeal" value = "3">
                                            <label class="form-check-label" for="radio3">The booth design is decent but needs enhancement in terms of aesthetics and branding.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio4" name="visual_appeal" value = "2">
                                            <label class="form-check-label" for="radio4">The booth design is unattractive and has only partial alignment with the brand identity.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio5" name="visual_appeal" value = "1" >
                                            <label class="form-check-label" for="radio5">The booth design is visually unappealing and does not represent the brand effectively.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Layout and Flow</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio6" name="layout" value = "5">
                                            <label class="form-check-label" for="radio6">The booth layout is well-organized, with clear paths, distinct zones, and optimal flow for visitors.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio7" name="layout" value = "4">
                                            <label class="form-check-label" for="radio7">The booth layout is mostly well-organized, with some minor improvements needed in flow and space utilization.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio8" name="layout" value = "3">
                                            <label class="form-check-label" for="radio8">he booth layout is acceptable but could be improved to provide a better visitor experience</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio9" name="layout" value = "2">
                                            <label class="form-check-label" for="radio9">The booth layout is disorganized and disrupts the visitor's flow.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio10" name="layout" value = "1" >
                                            <label class="form-check-label" for="radio10">The booth layout is chaotic and hinders visitors from navigating effectively.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Interactivity and Engagement</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio11" name="interactivity" value = "5">
                                            <label class="form-check-label" for="radio11">The booth design effectively engages visitors with interactive displays, demos, or activities.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio12" name="interactivity" value = "4">
                                            <label class="form-check-label" for="radio12">The booth design provides some engagement elements but could offer more interactive experiences.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio13" name="interactivity" value = "3">
                                            <label class="form-check-label" for="radio13">The booth design lacks engagement features but still attracts some attention.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio14" name="interactivity" value = "2">
                                            <label class="form-check-label" for="radio14">The booth is not engaging and fails to capture the visitors' interest effectively.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio15" name="interactivity" value = "1" >
                                            <label class="form-check-label" for="radio15">The booth is entirely static and unengaging, with no interactive elements.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Technology Integration</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio16" name="technology" value = "5">
                                            <label class="form-check-label" for="radio16">The booth effectively incorporates the latest IT technologies, creating a cutting-edge experience for visitors.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio17" name="technology" value = "4">
                                            <label class="form-check-label" for="radio17">The booth incorporates IT technologies but could benefit from further enhancements.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio18" name="technology" value = "3">
                                            <label class="form-check-label" for="radio18">Some IT technologies are integrated, but there is room for improvement.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio19" name="technology" value = "2">
                                            <label class="form-check-label" for="radio19">The booth has limited technology integration, and improvements are needed.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio20" name="technology" value = "1" >
                                            <label class="form-check-label" for="radio20">The booth lacks IT technology integration entirely.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Information and Resources</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio21" name="information" value = "5">
                                            <label class="form-check-label" for="radio21">The booth provides comprehensive information, resources, and collateral for visitors.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio22" name="information" value = "4">
                                            <label class="form-check-label" for="radio22">The booth offers valuable information and resources but could expand its offerings.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio23" name="information" value = "3">
                                            <label class="form-check-label" for="radio23"> Some information and resources are available but need improvement.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio24" name="information" value = "2">
                                            <label class="form-check-label" for="radio24">The booth lacks essential information and resources.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio25" name="information" value = "1" >
                                            <label class="form-check-label" for="radio25">The booth does not provide any relevant information or resources.
                                            </label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Overall Impact and Effectiveness</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio26" name="overall" value = "5">
                                            <label class="form-check-label" for="radio26">The booth design is exceptional and highly effective in achieving its goals.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio27" name="overall" value = "4">
                                            <label class="form-check-label" for="radio27">The booth design is good but has some room for improvement in a few areas.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio28" name="overall" value = "3">
                                            <label class="form-check-label" for="radio28">The booth design is average and needs improvements in multiple aspects.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio29" name="overall" value = "2">
                                            <label class="form-check-label" for="radio29">The booth design is below average and requires substantial revisions.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio30" name="overall" value = "1" >
                                            <label class="form-check-label" for="radio30">The booth design is poor and fails to achieve its goals effectively.</label>
                                            </div></td>

                                        </tr>
                                       
                                </tbody>
                </table>
                    </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="submitGrade6" value="Submit Grades" class="btn btn-success" id="submit-grades-button" value="">
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

    <script>
        function changeColor(row) {
            // Reset the background color of all rows
            const tableRows = document.querySelectorAll('tr');
            tableRows.forEach(row => {
                row.classList.remove('selected');
            });

            // Set the background color of the clicked row
            row.classList.add('selected');
        }
    </script>




</body>
</html>

<?php } ?>