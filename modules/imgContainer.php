<?php include_once ('dbConfig.php') ?>

<form id="imgForm" method="post" action="" enctype="multipart/form-data">
    <button class="btn" type="submit" name="deleteBtn" id="deleteBtn" style="display: none;"></button>
    <?php include ('dbDeleteSelected.php');
    $query = "SELECT * FROM image";
    $result = mysqli_query($db, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        ?>
        <figure class="!figure card border-secondary" id="figBox">
            <!-- <input class="form-check-input" type="checkbox" name="imgSelect[]" style="display: none;"
                value="<!?php echo $data['FileName']; ?>" /> -->
            <img class="!figure-img card-img-top img-fluid" title="Click to Zoom" id="figImg"
                src="./<?php echo $data['FilePath']; ?>">
            <div class="card-header">
                <input class="form-check-input" type="checkbox" name="imgSelect[]" style="display: none;"
                    value="<?php echo $data['FileName']; ?>" />
                <figcaption class="figure-caption !card-title">
                    <?php echo $data['FileName']; ?>
                </figcaption>
            </div>
            <div class="card-body" id="figDetails">
                <p class="!card-text figure-caption">
                    <?php echo $data['FileDescription']; ?>Figure Details (to be populated by DB)
                </p>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-outline-info" title="Edit Description">
                    <i class="bi bi-card-text"></i></button>
                <div class="btn-group">
                    <input type="file" id="<?php echo $data['FileName']; ?>" accept="image/*" style="display: none;" />
                    <button class="btn btn-sm btn-outline-primary" type="button" title="Replace Image"
                        style="border-top-left-radius: var(--bs-border-radius-sm); border-bottom-left-radius: var(--bs-border-radius-sm);">
                        <i class="bi bi-image"></i><i class="bi bi-arrow-repeat"></i></button>
                    <button class="btn btn-sm btn-outline-primary" title="Upload">
                        <i class="bi bi-upload"></i></button>
                </div>
                <button class="btn btn-sm btn-outline-danger" name="delete<?php $data['FileName']; ?>" title="Delete">
                    <i class="bi bi-trash-fill"></i></button>
                <?php if (isset($_POST[$data['FileName']])) {
                    $tmp = $data['FileName'];
                    $sql = "DELETE FROM image WHERE FileName IN ('$tmp')";
                    mysqli_query($db, $sql);
                    unlink('./images/' . $tmp);
                }
                ?>
            </div>
        </figure>
        <?php
    }
    ?>
</form>