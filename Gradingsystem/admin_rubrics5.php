<?php
session_start();
include 'connection.php';
include 'check_login.php';
check_loginAdmin();
$conn = OpenCon();


if (isset($_POST['submit'])) {
  //Prevent Posting Blank Values
 
    $group = $_POST['website'];
    $sec = $_POST['section'];

    $postQuery = "INSERT INTO groups (group_name, section) VALUES(?,?)";
    $postStmt = $conn->prepare($postQuery);
    $rc = $postStmt->bind_param('ss', $group, $sec);
    $postStmt->execute();
    if ($postStmt) {
      header("refresh:1; url=admin.php");
    } else {
    }
  }

  if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "DELETE FROM  groups WHERE  group_id = ?";
    $stmt = $conn->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
      header("refresh:1; url=admin.php");
    } else {
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
    <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">


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

        

        <div class = "margin">
        <div class="container-fluid mt--7">
            <div class="row mt-5">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                            <div class="col text-left">
                                    </div>
                                    <div class = "col">
                                    <h3 style = "text-align:center;">Best Project Design Group Candidates</h3>
                                    </div>
                                    <div class="col text-right">
                                    </div>
                            </div>
                        </div>
            <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Group Name</th>
                                        <th scope="col">Section</th>
                                        <th scope="col">Total Grade</th>
                                        <th scope="col">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php $ret = "SELECT *
FROM groups
LEFT JOIN grades4 ON groups.group_id = grades4.group_id
ORDER BY (
    SELECT AVG(total_grade)
    FROM grades4
    WHERE groups.group_id = grades4.group_id
) DESC;";                                    $stmt = $conn->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($aa = $res->fetch_object()) {

                                      
                                      $sql = "SELECT AVG(grades4.percent) AS average_value
                                      FROM groups
                                      INNER JOIN grades4 ON grades4.group_id = groups.group_id
                                      WHERE groups.group_id = '$aa->group_id'";  
                                      $result = mysqli_query($conn, $sql);
                                      $row = mysqli_fetch_assoc($result);
                                      if ($row) {
                                        $average_value = $row['average_value'];
                                    } else {
                                      $average_value = 0;
                                    }

                                    ?>

                                  
                                        <tr>
                                            <td><?php echo $aa->group_name ?></td>
                                            <td><?php echo $aa->section ?></td>
                                            <td><?php echo number_format($average_value,2) ?>%</td>
                                            <td>
                          
                                            <a href="grades4.php?view=<?php echo $aa->group_id  ?>">
                                            <button class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                            View Grades
                                            </button>
                                            </a>
                                        </td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
            </div>
        </div>
        </div>
        </div>
        </div>

    </section>

    <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Group</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" >
           <div class="form-group">
              <label>Group Website Name</label>
             <input class="form-control" placeholder="" name="website" required>
           </div>
           <div class="form-group">
            <label>Section</label>
            <select name="section" id="gender"  class="form-control">
            <option value="IT201">IT201</option>
            <option value="IT202">IT202</option>
            </select>
           </div>
            <hr>
            <button type="submit" name = "submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>

    <script src="js/admin.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <script>
        const data = <?php echo json_encode($data); ?>;
        const options = <?php echo json_encode($options); ?>;

        const pieChart = new Chart(document.getElementById("chart-pie"), {
        type: "pie",
        data: data,
        options: options
        });

        
    </script>
</body>
</html>

<?php } ?>