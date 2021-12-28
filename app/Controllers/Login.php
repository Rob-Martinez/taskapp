<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/28/2021
 * Time: 11:59 AM
 */

namespace App\Controllers;


class Login extends BaseController
{
    public function new(): string
    {
        return view('Login/new');
    }

    public function create(): \CodeIgniter\HTTP\RedirectResponse
    {
        $email = $this->request->getPost('email');

        $password = $this->request->getPost('password');

        $model = new \App\Models\UserModel;

        $user = $model->where('email', $email)
            ->first();

        if ($user === null) {
            return redirect()->back()
                ->withInput()
                ->with('warning', "User not found");
        } else {

            if (password_verify($password, $user->password_hash)) {

                $session = session();

                $session->regenerate();

                $session->set('user_id', $user->id);

                return redirect()->to('/')
                                 ->with('info', "Login Successful");


            } else {

                return redirect()->back()
                    ->withInput()
                    ->with('warning', "Incorrect password");
            }
        }
    }

    public function delete()
    {
        session()->destroy();

        return redirect()->to('/Login/showLogoutMessage');
    }

    public function showLogoutMessage()
    {
        return redirect()->to('/')
            ->with('info', "Logged Out Successfully");
    }
}