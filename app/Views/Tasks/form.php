<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/25/2021
 * Time: 12:03 PM
 */
?>

<div>
    <label for="description">Description</label>
    <input type="text" name="description" id="description"
           value="<?= old('description', esc($task->description)) ?>">
</div>
