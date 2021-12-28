<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/27/2021
 * Time: 6:02 PM
 */

namespace App\Models;


class UserModel extends \CodeIgniter\Model
{
    protected $table = 'user';

    protected $allowedFields = ['name', 'email', 'password'];

    protected $returnType = 'App\Entities\User';

    protected $useTimestamps = true;

    protected $beforeInsert = ['hashPassword'];

    protected $validationRules = [
      'name'                    => 'required',
      'email'                   => 'required|valid_email|is_unique[user.email]',
      'password'                => 'required|min_length[6]',
      'password_confirmation'   => 'required|matches[password]'
    ];

    protected $validationMessages = [
      'email' => [
          'is_unique'           => 'That email address is already in use'
      ],
      'password_confirmation'   => [
          'required'            => 'Please confirm the password',
          'matches'             => 'The current passwords do no match'
      ]
    ];


    protected function hashPassword(array $data)
    {
        if(isset($data['data']['password'])) {
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

            unset($data['data']['password']);

            return $data;
        }

    }
}