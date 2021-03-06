<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/28/2021
 * Time: 12:00 PM
 */
?>

<?= $this->extend('layouts/default'); ?>

<?= $this->section('title') ?>Login<?= $this->endSection(); ?>

<?= $this->section('content')?>

<h1>Login</h1>

<?= form_open('Login/create') ?>

    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?= old('email') ?>">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>

    <button>Log in</button>

</form>


<?= $this->endSection(); ?>

