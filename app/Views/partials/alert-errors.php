<div class="row">
    <div class="alert alert-danger col-11 col-sm-10 col-md-6 col-lg-5 mx-auto" role="alert">
        <strong>Please fix the following errors:</strong>
        <ul>
            <?php foreach ($errors as $field => $error): ?>
                    <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
