<?php
/**
 * Author Documentation
 * Created using PHP Storm
 * Author: Robert Martinez
 * Date: 12/24/2021
 * Time: 6:46 PM
 */

namespace App\Models;


class TaskModel extends \CodeIgniter\Model
{
    protected $table = 'task';

    protected $allowedFields = ['description'];

    protected $returnType = 'App\Entities\Task';

    protected $useTimestamps = true;

    protected $validationRules = [

        'description' => 'required'

    ];

    protected $validationMessages = [
        'description' => [
            'required' => 'Please Enter Description'
        ]
    ];

}