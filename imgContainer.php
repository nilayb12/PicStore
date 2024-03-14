<?php include_once('dbConfig.php') ?>

<form id="imgForm" method="post" action="">
    <button class="btn" type="submit" name="deleteBtn" id="deleteBtn" style="display: none;"></button>
    <?php include('dbDeleteSelected.php');
    $query = "SELECT * FROM image";
    $result = mysqli_query($db, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        ?>
        <figure class="!figure card">
            <input class="form-check-input" type="checkbox" name="imgSelect[]" style="display: none;"
                value="<?php echo $data['FileName']; ?>" />
            <img class="!figure-img card-img-top img-fluid" title="Click to Zoom"
                src="./images/<?php echo $data['FileName']; ?>">
            <div class="card-body">
                <figcaption class="!figure-caption card-title">
                    <?php echo $data['FileName']; ?>
                </figcaption>
                <p class="!card-text figure-caption">Figure Details (to be populated by DB)</p>
            </div>
            <div class="card-footer">
                <button class="btn btn-outline-primary" title="Edit Description">
                    <i class="bi bi-card-text"></i></button>
                <button class="btn btn-outline-danger" title="Delete">
                    <i class="bi bi-trash-fill"></i></button>
            </div>
        </figure>
        <?php
    }
    ?>
</form>