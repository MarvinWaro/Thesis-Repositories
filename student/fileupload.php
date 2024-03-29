<?php 

session_start();

require_once '../class/dbconfig.php';
require_once '../class/student.class.php';


    if(isset($_POST['file_submit1']) or $_POST['file_submit2'] or $_POST['file_submit3']){

        date_default_timezone_set('Asia/Manila');
        $date = date("F-d-Y");

        if(isset($_POST['file_submit1'])){
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_titles SET title = ?, file = ?, file_upload_date = ? WHERE group_id = ? AND title_number = '1'";
            $name_file = $_POST['title'];
        }
        elseif (isset($_POST['file_submit2'])) {
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_titles SET title = ?, file = ?, file_upload_date = ? WHERE group_id = ? AND title_number = '2'";
            $name_file = $_POST['title'];
        }
        elseif (isset($_POST['file_submit3'])) {
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_titles SET title = ?, file = ?, file_upload_date = ? WHERE group_id = ? AND title_number = '3'";
            $name_file = $_POST['title'];
        }

        $doc_type = "Document";
        $fileName = $_FILES['myfile']['name'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('docs', 'docx', 'pdf');

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

            $dateNow = strval(date("Y-m-d"));
            foreach ($student->show_group($_SESSION['groupnum']) as $value){
                mysqli_stmt_bind_param($stmt, "ssss", $name_file, $fileNameNew, $dateNow, $value['group_id']);
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