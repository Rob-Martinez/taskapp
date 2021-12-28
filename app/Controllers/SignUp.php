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

        if ($model->insert($user)) {

            return redirect()->to("/Signup/success");

        } else {

            return redirect()->back()
                             ->with('errors', $model->errors())
                             ->with('warning', 'Invalid data')
                             ->withInput();

        }
    }

    public function success(): string
    {
        return view('Signup/success');
    }
}