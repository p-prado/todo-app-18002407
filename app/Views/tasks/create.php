<?= $this->extend('layout') ?>

<?= $this->section('title') ?>
<title>Create Task</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center my-5">Create Task</h1>
    <div class="row">
        <form class="col-11 col-sm-10 col-md-6 col-lg-5 mx-auto d-flex flex-column"
        action="/tasks" method="POST">
        <?php if (!empty($errors)): ?>
            <?= $this->include('partials/alert-errors', $errors) ?>
        <?php endif ?>
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input class="form-control" type="text" name="title" id="title" maxlength="100" required
                    value="<?php echo set_value('title') ?>">
            </div>
            <div class="mb-3">
                <label for="type_id">Type:</label>
                <select required class="form-select" aria-label="Default select example" name="type_id" id="type_id">
                    <option selected disabled>Select...</option>
                    <?php foreach($types as $type): ?>
                        <option value="<?php echo $type['id'] ?>"><?php echo $type['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control" rows="5"><?php echo set_value('description') ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary align-self-center">Create</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>