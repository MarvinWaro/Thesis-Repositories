<?php

require_once '../class/dbconfig.php';

    if(isset($_POST['file_submit'])){

        date_default_timezone_set('Asia/Manila');
        $date = date("F-d-Y");

        $name_file = $_POST['name_file'];

        $doc_type = "Document";
        $fileName = $_FILES['myfile']['name'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('docs', 'docx', 'pdf', 'xlsx');

        if(in_array($fileActualExt, $allowed)){

            $fileNameNew = $fileName;
            $filesDestination = 'upload/documents/'.$fileNameNew;


            $insert = mysqli_query($conn, "INSERT INTO tbl_files VALUES('0','$name_file', '$fileNameNew', '$date')");


            if($insert==TRUE){

            move_uploaded_file($fileTmpName, $filesDestination);
            ?>
            <script>
                alert("File Was Uploaded!");
                window.location.href="thesis.php"
            </script>
            <?php

            }else{

            ?>
            <script>
                alert("Error in Uploading");
                window.location.href="thesis.php"
            </script>
            <?php


            }
        }else{
            ?>
            <script>
                alert("File Format is Not Acceptable!");
                window.location.href="thesis.php"
            </script>
            <?php
        }

    }


?>