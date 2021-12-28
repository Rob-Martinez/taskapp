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

    protected $allowedFields = ['name', 'email'];

    protected $returnType = 'App\Entities\User';

    protected $useTimestamps = true;

}