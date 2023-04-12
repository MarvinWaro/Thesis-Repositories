<?php 

session_start();

    if(isset($_POST['submit1']) or $_POST['submit2'] or $_POST['submit3']){

        date_default_timezone_set('Asia/Manila');
        $date = date("F-d-Y");

        if(isset($_POST['submit1'])){
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_files SET title1_adviser_file = ? WHERE group_id = ?";
        }
        elseif (isset($_POST['submit2'])) {
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_files SET title2_adviser_file = ? WHERE group_id = ?";
        }
        elseif (isset($_POST['submit3'])) {
            // Change group_id = to current group selected ID.
            $sql = "UPDATE group_files SET title3_adviser_file = ? WHERE group_id = ?";
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
                    window.location.href="advisee.php"
                </script>
            <?php
            }

            $student = new Student();

            foreach ($student->show_group($_GET['groupnum'], $_GET['course']) as $value){
                mysqli_stmt_bind_param($stmt, "ss", $fileNameNew, $value['group_id']);
                mysqli_stmt_execute($stmt);
            }

            move_uploaded_file($fileTmpName, $filesDestination);

            mysqli_stmt_close($stmt);
            ?>
                <script>
                    alert("File Was Uploaded!");
                    window.location.href="advisee.php";
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