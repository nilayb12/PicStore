<?php
include_once('dbConfig.php');

if (isset($_POST['uploadBtn'])) {
    for ($i = 0; $i < count($_FILES['uploadFile']['name']); ++$i) {

        $fileName = $_FILES['uploadFile']['name'][$i];
        $tmpName = $_FILES['uploadFile']['tmp_name'][$i];
        $filePath = 'images/' . $fileName;

        if (!empty($fileName)) {
            $sql = "INSERT INTO image VALUES (('$filePath'),('$fileName'))";
            if (file_exists($filePath)) {
                echo "<script type='text/javascript'>
                    $(document).ready(function(){
                        $('#uplModal').modal('show');
                    });
                </script>";
            } else {
                mysqli_query($db, $sql);
                move_uploaded_file($tmpName, $filePath);
            }
        }
    }
}
if (isset($_POST['uplConfirm'])) {
    mysqli_query($db, $sql);
    move_uploaded_file($tmpName, $filePath);
}
?>