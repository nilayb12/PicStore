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

    <nav class="navbar navbar-expand-sm fixed-top bg-black border-bottom border-light-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <!img src="https://upload.wikimedia.org/wikipedia/commons/b/bf/Reliance_Jio_Logo.svg">ImageDB
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" id="uploadForm" method="post" action="" enctype="multipart/form-data">
                    <input class="form-control me-1" type="file" name="uploadFile[]" accept=".jpg, .jpeg, .png"
                        multiple />
                    <button class="btn btn-outline-primary" type="submit" name="uploadBtn">UPLOAD</button>
                    <?php include('dbUpload.php'); ?>
                </form>
                <div class="btn-group">
                    <button class="btn btn-primary ms-2" id="chkboxToggle">Multi-Select Toggle</button>
                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                        aria-expanded="false"></button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <button class="btn btn-success" id="selectAll">(De)Select All</button>
                        </li>
                        <li class="dropdown-item">
                            <button class="btn btn-danger" id="deleteBtnLink">Delete Selected</button>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"></li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div id="imgContainer">
        <form id="imgForm" method="post" action="">
            <button class="btn" type="submit" name="deleteBtn" id="deleteBtn" style="display: none;"></button>
            <?php include('dbDelete.php');
            $query = "SELECT * FROM image";
            $result = mysqli_query($db, $query);

            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <figure>
                    <input class="form-check-input" type="checkbox" name="imgSelect[]" style="display: none;"
                        value="<?php echo $data['FileName']; ?>" />
                    <img title="Click to Zoom" src="./images/<?php echo $data['FileName']; ?>">
                    <figcaption>
                        <?php echo $data['FileName']; ?>
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