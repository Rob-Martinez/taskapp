<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/21/2021
 * Time: 12:39 PM
 */
?>

<?= $this->extend("layouts/default") ?>

<?= $this->section("title")?>Tasks<?= $this->endSection(); ?>

<?= $this->section("content") ?>

    <h1>Tasks</h1>

    <a href="<?= site_url("/Tasks/new") ?>">New Task</a>

    <ul>
        <?php foreach($tasks as $task): ?>

            <li>
                <a href="<?=site_url('/Tasks/show/') . $task['id'] ?>">
                    <?= esc($task['description']) ?>
                </a>
            </li>

        <?php endforeach; ?>
    </ul>

<?= $this->endSection(); ?>


