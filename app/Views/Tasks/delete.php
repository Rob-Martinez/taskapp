<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/26/2021
 * Time: 6:22 PM
 */
?>

<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Delete Task <?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Delete Task</h1>


<p>Are you sure you want to <strong>DELETE?</strong></p>

<?= form_open("/Tasks/delete/" . $task->id) ?>

    <button>Yes</button>
    <a href="<?= site_url('/Tasks/show/' . $task->id)?>">Cancel</a>

</form>


<?= $this->endSection() ?>

