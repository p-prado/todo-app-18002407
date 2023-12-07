<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center my-5">Pending Tasks</h1>
    <div>
        <ul class="list-group">
            <?php foreach ($pending as $task): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="/tasks/<?php echo $task['id'] ?>" class="text-decoration-none text-body">
                            <?php echo $task['title'] ?>
                        </a>
                        <div class="action-container">
                            <button type="button" class="btn btn-sm btn-outline-danger btn-action" data-bs-toggle="modal"
                            data-bs-target="#modal<?php echo $task['id']; ?>"><span
                            class="material-symbols-outlined">delete</span></button>
                            <form action="/tasks/<?php echo $task['id'] ?>/complete" method="POST">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-outline-primary btn-action"><span
                                class="material-symbols-outlined">task_alt</span></button>
                            </form>
                        </div>
                    </li>
            <?php endforeach ?>
            <a href="/tasks/create" class="text-center text-decoration-none"><li class="list-group-item text-body-secondary">New task +</li></a>
        </ul>
    </div>
</div>

<!-- Modals -->
<?php foreach ($pending as $task): ?>
    <div class="modal fade" id="modal<?php echo $task['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel<?php echo $task['id'] ?>">
                        <?php echo $task['title'] ?>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-body">Are you sure you want to delete this task: <span class="fw-medium">(
                            <?php echo $task['title'] ?>)
                        </span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="/tasks/<?php echo $task['id'] ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Yes, delete.</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?= $this->endSection() ?>