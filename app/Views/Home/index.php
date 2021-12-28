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

    <a href="<?= site_url("/Signup/new") ?>">Sign Up</a>


<?= $this->endSection() ?>