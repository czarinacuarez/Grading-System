<?php
session_start();
include 'connection.php';
include 'check_login.php';
check_loginAdmin();
$conn = OpenCon();

if(isset($_SESSION['username'])&& isset($_SESSION['password'])){
if (isset($_GET['view'])){
    $id = intval($_GET['view']);
        


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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

                   <!-- Page content -->
        <div class = "activity">
        <div class="container">
                    <div class="card">
                        <div class="card-header">
                        <?php
                                    $ret = "SELECT * FROM  groups WHERE group_id = '$id'";
                                    $stmt = $conn->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($aa = $res->fetch_object()) {

                                        $sql = "SELECT AVG(grades6.percent) AS average_value
                                        FROM groups
                                        INNER JOIN grades6 ON grades6.group_id = groups.group_id
                                        WHERE groups.group_id = '$aa->group_id'";  
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        if ($row) {
                                            $average_value = number_format($row['average_value'],2);
                                        } else {
                                            $average_value = 0;
                                        }
  
                                    ?>
                            <h5 class="h3 mb-0" style = "text-align:center;"><?php echo $aa->group_name ?> - Group Project Score <br>
                            Average Score: <?php echo $average_value ?>%</h5>
                            <?php } ?>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">  
                            <div class="chart">
                        <!-- Chart wrapper -->
                            <canvas id="chart-pie" class="chart-canvas"></canvas>

                            <?php
                            $sql = "SELECT CONCAT(user.firstname, ' ', user.lastname) AS name, grades6.percent FROM grades6 INNER JOIN user ON user.id = grades6.user_id
                            WHERE grades6.group_id = '$id'";
                            $result = mysqli_query($conn, $sql);

                            $data = array();
                            while ($row = mysqli_fetch_assoc($result)) {
                                $data[] = $row;
                            } 
                            
                            $sql_count = "SELECT COUNT(*) as total_count FROM grades6  INNER JOIN user ON user.id = grades6.user_id
                            WHERE grades6.group_id = '$id'";
                            $result_count = mysqli_query($conn, $sql_count);
                            $row_count = mysqli_fetch_assoc($result_count);
                            $total_count = $row_count['total_count'];

                            // Step 3: Divide each percentage by the total count
                            foreach ($data as &$item) {
                            $item['total_grade'] = $item['percent'] / $total_count;
                            }
                            unset($item);
                            ?>
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
                                            <h3 class="mb-0">Scores from Each Panelist</h3>
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
                                        <th scope="col" class = "text-primary">Panelist Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Clarity</th>
                                        <th scope="col">Audience Engagement</th>
                                        <th scope="col">Value Proposition</th>
                                        <th scope="col">Technical</th>
                                        <th scope="col">Competitive</th>
                                        <th scope="col">Overall Impact</th>
                                        <th scope="col" class = "text-success">Total Grade</th>
                                        <th scope="col" class = "text-success">Percentage</th>


                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $ret = "SELECT * FROM  grades6 INNER JOIN user ON grades6.user_id = user.id WHERE group_id = '$id'";
                                    $stmt = $conn->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($aa = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td class = "text-primary"><?php echo $aa->firstname ?> <?php echo $aa->lastname ?></td>
                                            <td><?php echo $aa->type ?></td>
                                            <td><?php echo $aa->clarity ?></td>
                                            <td><?php echo $aa->audience ?></td>
                                            <td><?php echo $aa->value1 ?></td>
                                            <td><?php echo $aa->technical ?></td>
                                            <td><?php echo $aa->competitive ?></td>
                                            <td><?php echo $aa->overall ?></td>
                                            <td class = "text-success"><?php echo $aa->total_grade ?></td>
                                            <td class="text-success" ><?php echo number_format($aa->percent,2) ?></td>

                                        </tr>
                                </tbody>
                                 <?php } ?>
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

<script>
  var ctx = document.getElementById('chart-pie').getContext('2d');
  var data = <?php echo json_encode($data); ?>;

  var chart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: data.map(function(item) { return item.name; }),
      datasets: [{
        label: 'Percentage',
        data: data.map(function(item) { return item.total_grade; }),
        backgroundColor: [
          '#224d8d',
          '#FFE66B',
          '#36A2EB',
          '#FFCE56',
          '#4BC0C0',
          '#9966FF',
          '#FF9F40',
          '#FF6384',
          '#FFB6C1',
          '#FFD580'
 
        ]
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  });
</script>
</html>

<?php }} ?>