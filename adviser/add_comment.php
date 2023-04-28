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
            $sql = "UPDATE group_titles SET comment = ?, adviser_file = ? WHERE group_id = ? AND title_number = '1'";
        }
        elseif (isset($_POST['submit2'])) {
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_titles SET comment = ?, adviser_file = ? WHERE group_id = ? AND title_number = '2'";
        }
        elseif (isset($_POST['submit3'])) {
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_titles SET comment = ?, adviser_file = ? WHERE group_id = ? AND title_number = '3'";
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

        $doc_type = "Document";
        $fileName = $_FILES['myfile']['name'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('docs', 'docx', 'pdf', 'xlsx');
        $fileNameNew = "";
        $filesDestination = "";

        if(in_array($fileActualExt, $allowed)){

            $fileNameNew = $fileName;
            $filesDestination = 'upload/documents/'.$fileNameNew;
        }

        $student = new Student();

        foreach ($student->show_group($_POST['cGroupNum']) as $value){
            mysqli_stmt_bind_param($stmt, "sss", $comment, $fileNameNew, $value['group_id']);
            mysqli_stmt_execute($stmt);
        }
        
        move_uploaded_file($fileTmpName, $filesDestination);
        mysqli_stmt_close($stmt);

        ?>
        <script>
            alert("Comment Added!");
        </script>
        <?php

        header("location: advisee.php?groupnum=" . $_POST['cGroupNum'] . "&course=" . $_POST['cCourse']);

    }