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

    <ul>
        <?php foreach($tasks as $task): ?>

            <li>
                <?= $task['id'] ?>
                <?= $task['description'] ?>
            </li>

        <?php endforeach; ?>
    </ul>

<?= $this->endSection(); ?>


