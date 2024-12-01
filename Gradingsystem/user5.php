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
              <h3>Best Project Design Grade Rubrics</h3>
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
                                            <td><b>Visual Design (Aesthetics and Branding)</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio1" name="visual_design" value = "5">
                                            <label class="form-check-label" for="radio1"> The design is visually stunning, aligned with the brand identity, and uses appropriate colors, typography, and imagery.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio2" name="visual_design" value = "4">
                                            <label class="form-check-label" for="radio2">The design is visually appealing, mostly aligned with the brand identity, and uses suitable colors, typography, and imagery.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio3" name="visual_design" value = "3">
                                            <label class="form-check-label" for="radio3">The design is decent, partially aligned with the brand identity, and uses some appropriate colors, typography, and imagery.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio4" name="visual_design" value = "2">
                                            <label class="form-check-label" for="radio4">The design needs improvement in terms of aesthetics and branding.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio5" name="visual_design" value = "1" >
                                            <label class="form-check-label" for="radio5">The design is visually unattractive and does not align with the brand identity.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>User Experience (Usability and Interaction)</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio6" name="user_experience" value = "5">
                                            <label class="form-check-label" for="radio6">The user interface is intuitive, easy to navigate, and provides an exceptional user experience.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio7" name="user_experience" value = "4">
                                            <label class="form-check-label" for="radio7">The user interface is mostly intuitive and provides a good user experience but could be further improved.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio8" name="user_experience" value = "3">
                                            <label class="form-check-label" for="radio8">The user interface is somewhat intuitive, but user experience needs improvement.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio9" name="user_experience" value = "2">
                                            <label class="form-check-label" for="radio9">The user interface is not very intuitive, and user experience is subpar.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio10" name="user_experience" value = "1" >
                                            <label class="form-check-label" for="radio10">The user interface is confusing, challenging to use, and provides a poor user experience</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Functionality (Features and Performance)</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio11" name="functionality" value = "5">
                                            <label class="form-check-label" for="radio11">All features work perfectly, load quickly, and are highly functional without any issues.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio12" name="functionality" value = "4">
                                            <label class="form-check-label" for="radio12">Most features work well, and performance is generally good, with minor issues.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio13" name="functionality" value = "3">
                                            <label class="form-check-label" for="radio13">Features are somewhat functional, and there are performance issues that need attention.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio14" name="functionality" value = "2">
                                            <label class="form-check-label" for="radio14">Many features are not working correctly, and performance issues are noticeable.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio15" name="functionality" value = "1" >
                                            <label class="form-check-label" for="radio15"> Significant functionality and performance problems make the interface practically unusable.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b> Accessibility (Inclusivity and Compliance)</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio16" name="accessibility" value = "5">
                                            <label class="form-check-label" for="radio16">The design is fully accessible, following best practices and adhering to relevant accessibility standards.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio17" name="accessibility" value = "4">
                                            <label class="form-check-label" for="radio17">The design is mostly accessible but could further improve in terms of inclusivity and compliance.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio18" name="accessibility" value = "3">
                                            <label class="form-check-label" for="radio18">The design is somewhat accessible but requires significant enhancements for inclusivity.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio19" name="accessibility" value = "2">
                                            <label class="form-check-label" for="radio19">The design is not very accessible, with noticeable gaps in inclusivity and compliance</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio20" name="accessibility" value = "1" >
                                            <label class="form-check-label" for="radio20">The design is highly inaccessible, with significant barriers for users with disabilities.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Documentation and Support (Help Resources)</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio21" name="documentation" value = "5">
                                            <label class="form-check-label" for="radio21">The design includes comprehensive documentation and support resources for users.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio22" name="documentation" value = "4">
                                            <label class="form-check-label" for="radio22">The design has helpful documentation and support resources but could provide more.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio23" name="documentation" value = "3">
                                            <label class="form-check-label" for="radio23">Some documentation and support resources are available, but more are needed.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio24" name="documentation" value = "2">
                                            <label class="form-check-label" for="radio24">Limited documentation and support resources are provided, and they need significant expansion.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio25" name="documentation" value = "1" >
                                            <label class="form-check-label" for="radio25">Minimal or no documentation and support resources are available.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b> Overall Quality</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio26" name="overall_quality" value = "5">
                                            <label class="form-check-label" for="radio26">The design is outstanding in all aspects and demonstrates a deep understanding of user design principles.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio27" name="overall_quality" value = "4">
                                            <label class="form-check-label" for="radio27">The design is good but has room for improvement in a few areas.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio28" name="overall_quality" value = "3">
                                            <label class="form-check-label" for="radio28">The design is average, with significant room for improvement in multiple areas.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio29" name="overall_quality" value = "2">
                                            <label class="form-check-label" for="radio29">The design is below average and needs substantial revisions in many areas.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio30" name="overall_quality" value = "1" >
                                            <label class="form-check-label" for="radio30">The design is of poor quality and requires a complete overhaul.</label>
                                            </div></td>

                                        </tr>
                                       
                                </tbody>
                </table>
                    </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="submitGrade5" value="Submit Grades" class="btn btn-success" id="submit-grades-button" value="">
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