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
              <h3>Best Presentation Pitch Grade Rubrics</h3>
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
                                            <td><b>Clarity and Structure</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio1" name="clarity" value = "5">
                                            <label class="form-check-label" for="radio1">The pitch is exceptionally clear and well-structured, with a logical flow that keeps the audience engaged.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio2" name="clarity" value = "4">
                                            <label class="form-check-label" for="radio2">The pitch is clear and mostly well-structured but could benefit from minor improvements.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio3" name="clarity" value = "3">
                                            <label class="form-check-label" for="radio3">The pitch is somewhat clear and structured, with some issues affecting the flow and engagement.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio4" name="clarity" value = "2">
                                            <label class="form-check-label" for="radio4">The pitch lacks clarity and proper structure, making it difficult for the audience to follow.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio5" name="clarity" value = "1" >
                                            <label class="form-check-label" for="radio5">The pitch is confusing and lacks any clear structure.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Audience Engagement</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio6" name="audience" value = "5">
                                            <label class="form-check-label" for="radio6">The pitch is highly engaging, using storytelling, visuals, and other techniques effectively.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio7" name="audience" value = "4">
                                            <label class="form-check-label" for="radio7">The pitch is engaging but could use additional techniques to capture the audience's attention.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio8" name="audience" value = "3">
                                            <label class="form-check-label" for="radio8">The pitch somewhat engages the audience but needs improvement in this aspect.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio9" name="audience" value = "2">
                                            <label class="form-check-label" for="radio9">The pitch is not very engaging and does not effectively captivate the audience.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio10" name="audience" value = "1" >
                                            <label class="form-check-label" for="radio10">The pitch is entirely unengaging and fails to hold the audience's interest.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Value Proposition and Benefits</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio11" name="value" value = "5">
                                            <label class="form-check-label" for="radio11">The value proposition and benefits of the IoT solution are articulated clearly and convincingly.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio12" name="value" value = "4">
                                            <label class="form-check-label" for="radio12">The value proposition and benefits are mostly clear, with some minor improvements needed.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio13" name="value" value = "3">
                                            <label class="form-check-label" for="radio13">The value proposition and benefits need more clarity and persuasion.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio14" name="value" value = "2">
                                            <label class="form-check-label" for="radio14">The value proposition and benefits are not clearly communicated or lack persuasiveness.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio15" name="value" value = "1" >
                                            <label class="form-check-label" for="radio15">The value proposition and benefits are entirely unclear and unconvincing.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Technical Understanding</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio16" name="technical" value = "5">
                                            <label class="form-check-label" for="radio16">The presenter demonstrates an exceptional understanding of the technical aspects of the IoT solution.</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio17" name="technical" value = "4">
                                            <label class="form-check-label" for="radio17">The presenter has a good grasp of technical details but could provide more in-depth information.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio18" name="technical" value = "3">
                                            <label class="form-check-label" for="radio18">The presenter has a basic understanding of technical aspects but lacks depth.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio19" name="technical" value = "2">
                                            <label class="form-check-label" for="radio19">The presenter lacks a clear understanding of the technical aspects, and the information provided is insufficient.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio20" name="technical" value = "1" >
                                            <label class="form-check-label" for="radio20">The presenter has no technical understanding of the IoT solution.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Competitive Differentiation</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio21" name="competitive" value = "5">
                                            <label class="form-check-label" for="radio21">The pitch effectively highlights the unique selling points and differentiation of the IoT solution</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio22" name="competitive" value = "4">
                                            <label class="form-check-label" for="radio22">The pitch provides differentiation but could emphasize it more effectively.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio23" name="competitive" value = "3">
                                            <label class="form-check-label" for="radio23">Some differentiation is mentioned, but it needs to be more prominent.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio24" name="competitive" value = "2">
                                            <label class="form-check-label" for="radio24"> Differentiation is not effectively communicated, and the IoT solution appears similar to competitors</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio25" name="competitive" value = "1" >
                                            <label class="form-check-label" for="radio25">There is no mention of competitive differentiation.</label>
                                            </div></td>

                                        </tr>
                                        <tr>
                                            <td><b>Overall Impact and Persuasiveness</b></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio26" name="overall" value = "5">
                                            <label class="form-check-label" for="radio26">The sales pitch is exceptional and highly persuasive, leaving a strong impact on the audience</label>
                                            </div></td>                                           
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio27" name="overall" value = "4">
                                            <label class="form-check-label" for="radio27">The sales pitch is good but has room for improvement in a few areas.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio28" name="overall" value = "3">
                                            <label class="form-check-label" for="radio28">The sales pitch is average and needs improvements in multiple aspects.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio29" name="overall" value = "2">
                                            <label class="form-check-label" for="radio29">The sales pitch is below average and requires substantial revisions.</label>
                                            </div></td>
                                            <td><div >
                                            <input class="form-check-input" type="radio" id="radio30" name="overall" value = "1" >
                                            <label class="form-check-label" for="radio30">The sales pitch is poor and fails to be persuasive or impactful.</label>
                                            </div></td>

                                        </tr>
                                       
                                </tbody>
                </table>
                    </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="submitGrade7" value="Submit Grades" class="btn btn-success" id="submit-grades-button" value="">
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