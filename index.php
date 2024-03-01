<?php
include_once('dbConfig.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" sizes="96x96" href="https://img.icons8.com/dusk/64/000000/upload--v1.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.6/viewer.min.css"
        integrity="sha512-za6IYQz7tR0pzniM/EAkgjV1gf1kWMlVJHBHavKIvsNoUMKWU99ZHzvL6lIobjiE2yKDAKMDSSmcMAxoiWgoWA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Image DB</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.6/viewer.min.js"
        integrity="sha512-EC3CQ+2OkM+ZKsM1dbFAB6OGEPKRxi6EDRnZW9ys8LghQRAq6cXPUgXCCujmDrXdodGXX9bqaaCRtwj4h4wgSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="colorToggle.js"></script>

    <nav class="navbar navbar-expand-md sticky-top bg-secondary-subtle border-bottom border-light-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img id="brand-logo" src="https://upload.wikimedia.org/wikipedia/commons/b/bf/Reliance_Jio_Logo.svg">
                <!img id="app-logo" src="Image DB-logos_white_Edit.png">Image DB
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="btn-group me-1" id="uploadForm" method="post" action="" enctype="multipart/form-data">
                    <input class="form-control" type="file" name="uploadFile[]" accept=".jpg, .jpeg, .png" multiple
                        title="Select Images" style="border-top-right-radius: 0; border-bottom-right-radius: 0;" />
                    <button class="btn btn-outline-primary" type="submit" name="uploadBtn" title="Upload"
                        style="border-top-right-radius: var(--bs-border-radius); border-bottom-right-radius: var(--bs-border-radius);"><i
                            class="bi bi-upload"></i></button>
                    <?php include('dbUpload.php'); ?>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"></li>
                </ul>
                <div class="btn-group ms-1 me-1">
                    <button class="btn btn-outline-primary text-nowrap" id="chkboxToggle" title="Multi-Select Toggle"><i
                            class="bi bi-ui-checks-grid"></i></button>
                    <button class="btn btn-outline-success" id="selectAll" title="(De)Select All"
                        style="display: none;"><i class="bi bi-check-square"></i></button>
                    <button class="btn btn-outline-danger" id="deleteBtnLink" title="Delete Selected"
                        style="display: none;"><i class="bi bi-trash-fill"></i></button>
                    <!-- <button class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" id="chkboxDrop"
                        style="display: none;"></button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <button class="btn btn-outline-success" id="selectAll"><i
                                    class="bi bi-check-square"></i></button>
                            <button class="btn btn-outline-danger" id="deleteBtnLink"><i
                                    class="bi bi-trash-fill"></i></button>
                        </li>
                    </ul> -->
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"></li>
                </ul>
                <form class="btn-group ms-1" role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                        style="border-top-right-radius: 0; border-bottom-right-radius: 0;" />
                    <button class="btn btn-outline-primary" type="submit" title="Search"><i
                            class="bi bi-search"></i></button>
                    <?php include('dbSearch.php'); ?>
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
                <figure class="figure">
                    <input class="form-check-input" type="checkbox" name="imgSelect[]" style="display: none;"
                        value="<?php echo $data['FileName']; ?>" />
                    <img class="figure-img img-fluid" title="Click to Zoom" src="./images/<?php echo $data['FileName']; ?>">
                    <figcaption class="figure-caption">
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