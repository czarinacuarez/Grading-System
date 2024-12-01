<?php
session_start();
include 'connection.php';
include 'check_login.php';
check_loginAdmin();
$conn = OpenCon();


if (isset($_POST['submit'])) {
  //Prevent Posting Blank Values
 
    $sec = $_POST['section'];

    $postQuery = "INSERT INTO groups1 (group_id) VALUES(?)";
    $postStmt = $conn->prepare($postQuery);
    $rc = $postStmt->bind_param('s', $sec);
    $postStmt->execute();
    if ($postStmt) {
      header("refresh:1; url=admin_rubrics2.php");
    } else {
    }
  }

  if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "DELETE FROM  groups1 WHERE  group1_id = ?";
    $stmt = $conn->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
      header("refresh:1; url=admin_rubrics2.php");
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
                                    <div class="col">
                                    <a href = " " data-toggle="modal" data-target="#aModal" class="btn btn-outline-success ">
                                      <i class="fas fa-plus-circle"></i>
                                        Add New Group
                                    </a>      
                                    </div>
                                    <div class = "col">
                                    <h3 style = "text-align:center;">Best in Hardware Category Candidates</h3>
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
                                <?php $ret = "SELECT * FROM  groups1 INNER JOIN groups ON groups.group_id = groups1.group_id LEFT JOIN grades1 ON grades1.group_id = groups1.group1_id ORDER BY grades1.total_grade ASC";
                                    $stmt = $conn->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($aa = $res->fetch_object()) {

                                      
                                      $sql = "SELECT AVG(grades1.total_grade) AS average_value
                                      FROM groups1
                                      INNER JOIN grades1 ON grades1.group_id = groups1.group1_id
                                      WHERE groups1.group_id = '$aa->group_id'";  
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
                                            <a href="admin_rubrics2.php?delete=<?php echo $aa->group1_id  ?>">
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
                                            </a>
                                            <a href="grades1.php?view=<?php echo $aa->group1_id  ?>">
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
            <label>All Groups</label>
            <?php
                      $ret = "SELECT * FROM groups ";
                      $stmt = $conn->prepare($ret);
                      $stmt->execute();
                      $res = $stmt->get_result();
                      ?>
            <select name="section" id="gender"  class="form-control">
            <?php while ($ri = $res->fetch_array()) {  ?>
                    <option value=<?php echo $ri['group_id'] ?>><?php echo $ri['group_name'] ?></option>
                    <?php }?>
            </select>
           </div>
            <hr>
            <button type="submit" name = "submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
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