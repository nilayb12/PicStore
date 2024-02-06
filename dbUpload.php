<?php
$msg = '';
$db = mysqli_connect('localhost', 'nilay.baranwal', 'Netid(0981', 'image_upload');

if (isset($_POST['uploadBtn'])) {
    for ($i = 0; $i < count($_FILES['uploadFile']['name']); ++$i) {

        $fileName = $_FILES['uploadFile']['name'][$i];
        $tmpName = $_FILES['uploadFile']['tmp_name'][$i];
        $folder = './images/' . $fileName;

        if (!empty($fileName)) {
            $sql = "INSERT INTO image (Filename) VALUES ('$fileName')";
            mysqli_query($db, $sql);

            if (move_uploaded_file($tmpName, $folder)) {
                echo '';
            } else {
                echo '';
            }
        }
    }
}
?>