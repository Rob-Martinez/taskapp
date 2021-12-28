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

<?= $this->section("title")?>New Task<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<h1>New Task</h1>

<?php if(session()->has('errors')): ?>

    <ul>
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?= form_open("/Tasks/create")?>

    <?= $this->include('Tasks/form') ?>

    <button>Save</button>
    <a href="<?= site_url("/Tasks") ?>">Cancel</a>

</form>


<?= $this->endSection();
