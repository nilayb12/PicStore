<?php include_once('dbConfig.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.6/viewer.min.css"
        integrity="sha512-za6IYQz7tR0pzniM/EAkgjV1gf1kWMlVJHBHavKIvsNoUMKWU99ZHzvL6lIobjiE2yKDAKMDSSmcMAxoiWgoWA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Image Uploader</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.6/viewer.min.js"
        integrity="sha512-EC3CQ+2OkM+ZKsM1dbFAB6OGEPKRxi6EDRnZW9ys8LghQRAq6cXPUgXCCujmDrXdodGXX9bqaaCRtwj4h4wgSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="colorToggle.js"></script>

    <div id="formContainer">
        <form id="selectForm" method="post" action="">
            <select class="form-select" id="selectFolder">
                <option value="images/" selected>Root</option>
                <?php
                $folders = glob("images/*", GLOB_ONLYDIR);
                foreach ($folders as $folder) {
                    echo '<option value="' . $folder . '">' . substr($folder, 7) . '</option>';
                }
                ?>
            </select>
        </form>

        <form id="uploadForm" method="post" action="" enctype="multipart/form-data">
            <input class="form-control" type="file" name="uploadFile[]" accept=".jpg, .jpeg, .png" multiple />
            <button class="btn btn-primary" type="submit" name="uploadBtn">UPLOAD</button>
            <?php include('dbUpload.php'); ?>
        </form>
        <button class="btn btn-primary" id="chkboxToggle">Multi-Select Toggle</button>
        <div class="btn-group">
            <button class="btn btn-success" id="selectAll" style="display: none" ;>(De)Select All</button>
            <button class="btn btn-danger" id="deleteBtnLink" style="display: none" ;>Delete Selected</button>
        </div>
    </div>

    <div id="imgContainer">
        <form method="post" action="">
            <button class="btn" type="submit" name="deleteBtn" id="deleteBtn" style="display: none;"></button>
            <?php include('dbDelete.php');
            $query = "SELECT * FROM image";
            $result = mysqli_query($db, $query);

            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <figure id="imgGrid">
                    <input class="form-check-input" type="checkbox" name="imgSelect[]" style="display: none;"
                        value="<?php echo $data['Filename']; ?>" />
                    <img title="Click to Zoom" src="./images/<?php echo $data['Filename']; ?>">
                    <figcaption>
                        <?php echo $data['Filename']; ?>
                    </figcaption>
                </figure>
                <?php
            }
            ?>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>