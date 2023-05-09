<?php
include_once '../class/student.class.php';

if (isset($_POST["submit"])) {
  $id = $_POST["id"];
  $abstract = $_POST["abstract"];

  $doc_type = "Document";
  $fileName = $_FILES['myfile']['name'];
  $fileTmpName = $_FILES['myfile']['tmp_name'];
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('docs', 'docx', 'pdf', 'xlsx');

  if (in_array($fileActualExt, $allowed)) {

    $fileNameNew = $fileName;
    $filesDestination = 'upload/proposed/' . $fileNameNew;


    $student = new Student();

    $student->update_proposed_title($id, $abstract, $fileNameNew);

    move_uploaded_file($fileTmpName, $filesDestination);

    ?>
    <script>
      alert("File Was Uploaded!");
      window.location.href = "thesis_accepted.php";
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("File Format is Not Acceptable!");
      window.location.href = "thesis_accepted.php"
    </script>
<?php
  }
}
