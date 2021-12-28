<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/27/2021
 * Time: 5:07 PM
 */

namespace App\Controllers;


class SignUp extends BaseController
{
    public function new(): string
    {
        return view('Signup/new');
    }

    public function create()
    {

        $user = new \App\Entities\User($this->request->getPost());

        $model = new \App\Models\UserModel;

        $model->insert($user);

        echo "You Are Now Signed Up";

    }
}