<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/24/2021
 * Time: 8:19 PM
 */
?>


<?= $this->extend("layouts/default") ?>

<?= $this->section("title")?>Edit Task<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<h1>Edit Task</h1>

<?php if(session()->has('errors')): ?>

    <ul>
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?= form_open("/Tasks/update/" . $task->id) ?>

    <?= $this->include('Tasks/form') ?>

    <button>Save</button>
    <a href="<?= site_url("/Tasks/show/" . $task->id) ?>">Cancel</a>

</form>


<?= $this->endSection();
