<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/4
 * Time: 15:22
 */

namespace App\Api\Transformers;


use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
          'id' =>  $user['id'],
          'name' =>  $user['name'],
          'email' =>  $user['email']
        ];
    }
}