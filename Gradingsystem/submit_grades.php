<?php session_start();
include 'connection.php';
$conn = OpenCon();

if (isset($_POST['submitGrade'])) {
        $user_id = $_SESSION['id'];
        $group_id = $_POST['categorys'];

        $query = "SELECT * FROM grades WHERE user_id = $user_id AND group_id = $group_id";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 1) {
            $error_message = "Group already graded!";
            header("Location: user.php?error_message=" . urlencode($error_message));
            exit;
        } else {

        $cc = $_POST['innovation'];
        $aa = $_POST['integration'];
        $la = $_POST['functionality'];
        $na = $_POST['data_handling'];
        $li = $_POST['sustainability'];
        $bg = $_POST['user_experience'];
        $totalgrade = $cc + $aa + $la + $na + $li + $bg;
        $postQuery = "INSERT INTO grades (group_id, user_id, total_grade,innovation,integration,functionality,data_handling,sustainability,user_experience) VALUES(?,?,?,?,?,?,?,?,?)";
        $postStmt = $conn->prepare($postQuery);
        $rc = $postStmt->bind_param('sssssssss', $group_id, $user_id, $totalgrade, $cc, $aa, $la , $na,
        $li, $bg);
        $postStmt->execute();
        if ($postStmt) { 
            $success_message = "Grades are successfully entered!";
            header("Location: user.php?success_message=" . urlencode($success_message));
        } else {
        }


}}

if (isset($_POST['submitGrade2'])) {
    $user_id = $_SESSION['id'];
    $group_id = $_POST['categorys'];

    $query = "SELECT * FROM grades1 WHERE user_id = $user_id AND group_id = $group_id";
    $result = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 1) {
        $error_message = "Group already graded!";
        header("Location: user2.php?error_message=" . urlencode($error_message));
        exit;
    } else {

    $cc = $_POST['innovation'];
    $aa = $_POST['performance'];
    $la = $_POST['robustness'];
    $na = $_POST['scalability'];
    $li = $_POST['user_experience'];
    $bg = $_POST['cost_effectiveness'];
    $totalgrade = $cc + $aa + $la + $na + $li + $bg;
    $postQuery = "INSERT INTO grades1 (group_id, user_id, total_grade,innovation,performance,robustness,scalability,user_experience,cost_effectiveness) VALUES(?,?,?,?,?,?,?,?,?)";
    $postStmt = $conn->prepare($postQuery);
    $rc = $postStmt->bind_param('sssssssss', $group_id, $user_id, $totalgrade, $cc, $aa, $la , $na,
    $li, $bg);
    $postStmt->execute();
    if ($postStmt) { 
        $success_message = "Grades are successfully entered!";
        header("Location: user2.php?success_message=" . urlencode($success_message));
    } else {
    }


}}

if (isset($_POST['submitGrade3'])) {
    $user_id = $_SESSION['id'];
    $group_id = $_POST['categorys'];

    $query = "SELECT * FROM grades2 WHERE user_id = $user_id AND group_id = $group_id";
    $result = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 1) {
        $error_message = "Group already graded!";
        header("Location: user3.php?error_message=" . urlencode($error_message));
        exit;
    } else {

    $cc = $_POST['user_interface'];
    $aa = $_POST['functionality'];
    $la = $_POST['performance'];
    $na = $_POST['usability'];
    $li = $_POST['innovation'];
    $bg = $_POST['compatibility'];
    $totalgrade = $cc + $aa + $la + $na + $li + $bg;
    $postQuery = "INSERT INTO grades2 (group_id, user_id, total_grade,user_interface,functionality,performance,usability,innovation,compatibility) VALUES(?,?,?,?,?,?,?,?,?)";
    $postStmt = $conn->prepare($postQuery);
    $rc = $postStmt->bind_param('sssssssss', $group_id, $user_id, $totalgrade, $cc, $aa, $la , $na,
    $li, $bg);
    $postStmt->execute();
    if ($postStmt) { 
        $success_message = "Grades are successfully entered!";
        header("Location: user3.php?success_message=" . urlencode($success_message));
    } else {
    }


}}

if (isset($_POST['submitGrade4'])) {
    $user_id = $_SESSION['id'];
    $group_id = $_POST['categorys'];

    $query = "SELECT * FROM grades3 WHERE user_id = $user_id AND group_id = $group_id";
    $result = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 1) {
        $error_message = "Group already graded!";
        header("Location: user4.php?error_message=" . urlencode($error_message));
        exit;
    } else {

    $cc = $_POST['user_interface'];
    $aa = $_POST['functionality'];
    $la = $_POST['performance'];
    $na = $_POST['usability'];
    $li = $_POST['innovation'];
    $bg = $_POST['compatibility'];
    $totalgrade = $cc + $aa + $la + $na + $li + $bg;
    $postQuery = "INSERT INTO grades3 (group_id, user_id, total_grade,user_interface,functionality,performance,usability,innovation,compatibility) VALUES(?,?,?,?,?,?,?,?,?)";
    $postStmt = $conn->prepare($postQuery);
    $rc = $postStmt->bind_param('sssssssss', $group_id, $user_id, $totalgrade, $cc, $aa, $la , $na,
    $li, $bg);
    $postStmt->execute();
    if ($postStmt) { 
        $success_message = "Grades are successfully entered!";
        header("Location: user4.php?success_message=" . urlencode($success_message));
    } else {
    }


}}


if (isset($_POST['submitGrade5'])) {
    if (!isset($_POST['visual_design']) || !isset($_POST['user_experience']) || !isset($_POST['functionality']) || !isset($_POST['accessibility']) || !isset($_POST['documentation']) || !isset($_POST['overall_quality']) ) {
        $error_message = "One or more fields are empty!";
        header("Location: user5.php?error_message=" . urlencode($error_message));
        exit;
    }else{
        $user_id = $_SESSION['id'];
        $group_id = $_POST['categorys'];

        $query = "SELECT * FROM grades4 WHERE user_id = $user_id AND group_id = $group_id";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 1) {
            $error_message = "Group already graded!";
            header("Location: user5.php?error_message=" . urlencode($error_message));
            exit;
        } else {

        $cc = $_POST['visual_design'];
        $aa = $_POST['user_experience'];
        $la = $_POST['functionality'];
        $na = $_POST['accessibility'];
        $li = $_POST['documentation'];
        $bg = $_POST['overall_quality'];
        $percent = ($cc + $aa + $la + $na + $li + $bg)/30 * 100;
        $totalgrade = $cc + $aa + $la + $na + $li + $bg;
        $postQuery = "INSERT INTO grades4 (group_id, user_id, total_grade,visual_design,user_experience,functionality,accessibility,documentation,overall_quality, percent) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $postStmt = $conn->prepare($postQuery);
        $rc = $postStmt->bind_param('ssssssssss', $group_id, $user_id, $totalgrade, $cc, $aa, $la , $na,
        $li, $bg, $percent );
        $postStmt->execute();
        if ($postStmt) { 
            $success_message = "Grades are successfully entered!";
            header("Location: user5.php?success_message=" . urlencode($success_message));
        } else {
        }
    }
}
}

if (isset($_POST['submitGrade6'])) {
    if (!isset($_POST['visual_appeal']) || !isset($_POST['layout']) || !isset($_POST['interactivity']) || !isset($_POST['technology']) || !isset($_POST['information']) || !isset($_POST['overall']) ) {
        $error_message = "One or more fields are empty!";
        header("Location: user6.php?error_message=" . urlencode($error_message));
        exit;
    }else{
        $user_id = $_SESSION['id'];
        $group_id = $_POST['categorys'];

        $query = "SELECT * FROM grades5 WHERE user_id = $user_id AND group_id = $group_id";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 1) {
            $error_message = "Group already graded!";
            header("Location: user6.php?error_message=" . urlencode($error_message));
            exit;
        } else {

        $cc = $_POST['visual_appeal'];
        $aa = $_POST['layout'];
        $la = $_POST['interactivity'];
        $na = $_POST['technology'];
        $li = $_POST['information'];
        $bg = $_POST['overall'];
        $percent = ($cc + $aa + $la + $na + $li + $bg)/30 * 100;
        $totalgrade = $cc + $aa + $la + $na + $li + $bg;
        $postQuery = "INSERT INTO grades5 (group_id, user_id, total_grade,visual_appeal,layout,interactivity,technology,information,overall, percent) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $postStmt = $conn->prepare($postQuery);
        $rc = $postStmt->bind_param('ssssssssss', $group_id, $user_id, $totalgrade, $cc, $aa, $la , $na,
        $li, $bg, $percent );
        $postStmt->execute();
        if ($postStmt) { 
            $success_message = "Grades are successfully entered!";
            header("Location: user6.php?success_message=" . urlencode($success_message));
        } else {
        }
    }
}
}

if (isset($_POST['submitGrade7'])) {
    if (!isset($_POST['clarity']) || !isset($_POST['audience']) || !isset($_POST['value']) || !isset($_POST['technical']) || !isset($_POST['competitive']) || !isset($_POST['overall']) ) {
        $error_message = "One or more fields are empty!";
        header("Location: user7.php?error_message=" . urlencode($error_message));
        exit;
    }else{
        $user_id = $_SESSION['id'];
        $group_id = $_POST['categorys'];

        $query = "SELECT * FROM grades6 WHERE user_id = $user_id AND group_id = $group_id";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 1) {
            $error_message = "Group already graded!";
            header("Location: user7.php?error_message=" . urlencode($error_message));
            exit;
        } else {

        $cc = $_POST['clarity'];
        $aa = $_POST['audience'];
        $la = $_POST['value'];
        $na = $_POST['technical'];
        $li = $_POST['competitive'];
        $bg = $_POST['overall'];
        $percent = ($cc + $aa + $la + $na + $li + $bg)/30 * 100;
        $totalgrade = $cc + $aa + $la + $na + $li + $bg;
        $postQuery = "INSERT INTO grades6 (group_id, user_id, total_grade,clarity,audience,value1,technical,competitive,overall, percent) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $postStmt = $conn->prepare($postQuery);
        $rc = $postStmt->bind_param('ssssssssss', $group_id, $user_id, $totalgrade, $cc, $aa, $la , $na,
        $li, $bg, $percent );
        $postStmt->execute();
        if ($postStmt) { 
            $success_message = "Grades are successfully entered!";
            header("Location: user7.php?success_message=" . urlencode($success_message));
        } else {
        }
    }
}
}




?>