<?php
include_once('dbConfig.php');

if (isset($_POST['deleteBtn'])) {
    if (!empty($_POST['imgSelect'])) {
        echo "You chose the following file(s): <br>";
        foreach ($_POST['imgSelect'] as $file) {
            echo $file . "<br />";
        }
        $fNameStr = implode(',', $_POST['imgSelect']);
        $sql = "DELETE FROM image WHERE Filename IN ('$fNameStr')";
        $delete = mysqli_query($db, $sql);
        if ($delete) {
            $statusMsg = 'Selected users have been deleted successfully.';
        } else {
            $statusMsg = 'Some problem occurred, please try again.';
        }
    } else {
        $statusMsg = 'Select at least 1 record to delete.';
    }
}
?>