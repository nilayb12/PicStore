<?php
include_once('dbConfig.php');

if (isset($_POST['deleteBtn'])) {
    if (!empty($_POST['imgSelect'])) {
        foreach ($_POST['imgSelect'] as $fileName) {
            $sql = "DELETE FROM image WHERE FileName IN ('$fileName')";
            mysqli_query($db, $sql);
            unlink('./images/' . $fileName);
        }
    } else {
        echo '';
    }
}
?>