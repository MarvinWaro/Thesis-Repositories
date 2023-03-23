<?php 

session_start();

require_once '../class/dbconfig.php';
require_once '../class/student.class.php';


    if(isset($_POST['file_submit1']) or $_POST['file_submit2'] or $_POST['file_submit3']){

        date_default_timezone_set('Asia/Manila');
        $date = date("F-d-Y");

        if(isset($_POST['file_submit1'])){
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_files SET title1 = ?, title1_file = ? WHERE group_id = ?";
            $name_file = $_POST['name_file1'];
        }
        elseif (isset($_POST['file_submit2'])) {
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_files SET title2 = ?, title2_file = ? WHERE group_id = ?";
            $name_file = $_POST['name_file2'];
        }
        elseif (isset($_POST['file_submit3'])) {
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_files SET title3 = ?, title3_file = ? WHERE group_id = ?";
            $name_file = $_POST['name_file3'];
        }

        $doc_type = "Document";
        $fileName = $_FILES['myfile']['name'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('docs', 'docx', 'pdf', 'xlsx');

        if(in_array($fileActualExt, $allowed)){

            $fileNameNew = $fileName;
            $filesDestination = 'upload/documents/'.$fileNameNew;
           
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
            ?>
                <script>
                    alert("Error in Uploading");
                    window.location.href="thesis.php"
                </script>
            <?php
            }

            $student = new Student();

            foreach ($student->show_group($_SESSION['groupnum'], $_SESSION['course']) as $value){
                mysqli_stmt_bind_param($stmt, "sss", $name_file, $fileNameNew, $value['group_id']);
                mysqli_stmt_execute($stmt);
            }

            move_uploaded_file($fileTmpName, $filesDestination);

            mysqli_stmt_close($stmt);
            ?>
                <script>
                    alert("File Was Uploaded!");
                    window.location.href="thesis.php";
                </script>
            <?php
        }else{
            ?>
            <script>
                alert("File Format is Not Acceptable!");
                window.location.href="thesis.php"
            </script>
            <?php
        }

    }