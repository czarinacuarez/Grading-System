<?php  session_start();
include 'connection.php';
$conn = OpenCon();
if (isset($_POST['excel'])){
        $sql_query = "SELECT groups.group_name AS WEBSITE , CONCAT(user.firstname, ' ', user.lastname) AS PANELIST , 
        grades.content AS CONTENT , grades.accuracy AS ACCURACY , grades.layout AS LAYOUT , grades.navigation AS NAVIGATION ,
        grades.links AS LINKS , grades.background AS BACKGROUND , grades.color AS COLOR , grades.fonts AS FONTS ,
        grades.graphics AS GRAPHICS , grades.images AS IMAGES , grades.spelling AS SPELLING , grades.copyright AS COPYRIGHT,  
        grades.total_grade AS TOTAL_GRADE , grades.percent AS AVERAGE  
        FROM  grades INNER JOIN user ON grades.user_id = user.id INNER JOIN groups ON grades.group_id = groups.group_id ORDER BY groups.group_name ASC";
        $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
        $developer_records = array();
        while( $rows = mysqli_fetch_assoc($resultset) ) {
        $developer_records[] = $rows;
        }

        $filename = "Grade_Reports_As_Of_".date('Ymd') . ".csv";            
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $show_coloumn = false;
        if(!empty($developer_records)) {
            foreach($developer_records as $record) {
                if(!$show_coloumn) {
                    echo implode(",", array_keys($record)) . "\n";
                    $show_coloumn = true;
                }
                echo implode(",", array_values($record)) . "\n";
            }
        }
}
exit;  
?>