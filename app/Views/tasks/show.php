<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-11 col-sm-10 col-md-6 col-lg-5 mx-auto d-flex flex-column">
                <h1 class="text-center mt-5 mb-3">
                    <a href="/back" id="backBtn" class="text-decoration-none"><span class="material-symbols-outlined">arrow_back_ios</span></a>
                    <?php echo $task['title'] ?>
                </h1>
                <p class="text-center mb-5"><span class="text-light rounded d-inline-block px-3 py-2 <?php echo $task['status_id']==1 ? 'bg-primary' : 'bg-secondary' ?>"><?php echo $task['status_name'] ?></span></p>
                <p class="text-center"><?php echo $task['description'] ?></p>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>