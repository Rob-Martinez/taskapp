<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/28/2021
 * Time: 1:02 PM
 */

if ( ! function_exists('current_user')) {

    function current_user()
    {
        if ( ! session()->has('user_id')) {

            return null;
        }

        $model = new \App\Models\UserModel;

        return $model->find(session()->get('user_id'));

    }
}





