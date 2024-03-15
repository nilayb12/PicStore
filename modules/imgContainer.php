<?php include_once ('dbConfig.php') ?>

<form id="imgForm" method="post" action="">
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
                <button class="btn btn-outline-primary" title="Edit Description">
                    <i class="bi bi-card-text"></i></button>
                <button class="btn btn-outline-info" title="Replace Image">
                    <i class="bi bi-image"></i></button>
                <button class="btn btn-outline-danger" title="Delete">
                    <i class="bi bi-trash-fill"></i></button>
            </div>
        </figure>
        <?php
    }
    ?>
</form>