<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center my-5">Welcome!</h1>
    <!-- <a href="/tasks/create" class="btn btn-primary mb-3 float-end">Create new +</a>
 -->
    <h2 class="my-5">Pending Tasks</h2>
    <ul class="list-group">
        <?php foreach ($pending as $task): ?>
            <a href="/tasks/<?php echo $task['id'] ?>" class="text-decoration-none">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $task['title'] ?>
                </li>
            </a>
        <?php endforeach ?>
    </ul>

    <h2 class="my-5">Completed Tasks</h2>
    <ul class="list-group">
        <?php foreach ($completed as $task): ?>
            <a href="/tasks/<?php echo $task['id'] ?>" class="text-decoration-none">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $task['title'] ?>
                    <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
            </a>
        <?php endforeach ?>
    </ul>

</div>

<?= $this->endSection() ?>