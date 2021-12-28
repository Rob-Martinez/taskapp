<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/21/2021
 * Time: 12:10 PM
 */
?>

<?= $this->extend("layouts/default") ?>

<?= $this->section("title")?>Home<?= $this->endSection(); ?>

<?= $this->section("content") ?>

    <h1>Welcome</h1>

    <a href="<?= site_url("/Signup") ?>">Sign Up</a>


    <?php if(session()->has('user_id')): ?>

        <p>User is Logged In</p>

        <p>Welcome <?= esc(current_user()->name) ?></p>

        <a href="<?= site_url("/Logout") ?>">Log out</a>


    <?php else: ?>
        <p>User is not Logged In</p>

        <a href="<?= site_url("/Login") ?>">Login</a>

    <?php endif; ?>

<?= $this->endSection() ?>