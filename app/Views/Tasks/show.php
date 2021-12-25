<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/24/2021
 * Time: 7:26 PM
 */
?>

<?= $this->extend('layouts/default'); ?>

<?= $this->section('title') ?> Task <?= $this->endSection(); ?>

<?= $this->section('content') ?>

<h1>Task</h1>

<a href="<?= site_url("/tasks")?>">&laquo; back to index</a>

<dl>
    <dt>ID</dt>
    <dd><?= $task->id ?> </dd>

    <dt>Description</dt>
    <dd><?= esc($task->description) ?> </dd>

    <dt>Created at</dt>
    <dd><?= $task->created_at ?> </dd>

    <dt>Updated at</dt>
    <dd><?= $task->updated_at ?> </dd>

</dl>

<a href="<?= site_url("/Tasks/edit/" . $task->id)?>">Edit</a>


<?= $this->endSection(); ?>
