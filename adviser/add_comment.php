<?php

session_start();

require_once '../class/dbconfig.php';
require_once '../class/student.class.php';

    if(isset($_POST['submit1']) or $_POST['submit2'] or $_POST['submit3']){
        $groupID = 1; // To be changed
        $comment = $_POST['comment'];
        $groupNum = $_POST['cGroupNum'];
        echo $groupNum;

        if(isset($_POST['submit1'])){
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_files SET title1_comment = ? WHERE group_id = ?";
        }
        elseif (isset($_POST['submit2'])) {
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_files SET title2_comment = ? WHERE group_id = ?";
        }
        elseif (isset($_POST['submit3'])) {
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_files SET title3_comment = ? WHERE group_id = ?";
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
            mysqli_stmt_bind_param($stmt, "ss", $comment, $value['group_id']);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);

        ?>
        <script>
            alert("Comment Added!");
        </script>
        <?php

        header("location: advisee.php?groupnum=" . $_POST['cGroupNum'] . "&course=" . $_POST['cCourse']);

    }