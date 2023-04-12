<?php

session_start();
require_once '../class/dbconfig.php';
require_once '../class/student.class.php';      

if(isset($_POST['lock1'])){
    // Change group_id = to current group selected ID.
    $sql = "UPDATE group_files SET lock1 = 1 WHERE group_id = ?";;
}
elseif (isset($_POST['lock2'])) {
    // Change group_id = to current group selected ID.
    $sql = "UPDATE group_files SET lock2 = 1 WHERE group_id = ?";
}
elseif (isset($_POST['lock3'])) {
    // Change group_id = to current group selected ID.
    $sql = "UPDATE group_files SET lock3 = 1 WHERE group_id = ?";
}

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
?>
    <script>
        alert("Error in Commenting!");
    </script>
<?php
    header("location: advisee.php?groupnum=" . $_POST['cGroupNum'] . "&course=" . $_POST['cCourse']);
}

$student = new Student();

foreach ($student->show_group($_POST['cGroupNum'], $_POST['cCourse']) as $value){
    echo $value['group_id'];
    mysqli_stmt_bind_param($stmt, "s", $value['group_id']);
    mysqli_stmt_execute($stmt);
}
mysqli_stmt_close($stmt);

header("location: advisee.php?groupnum=" . $_POST['cGroupNum'] . "&course=" . $_POST['cCourse']);
