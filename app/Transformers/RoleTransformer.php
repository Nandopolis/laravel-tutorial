<?php
/**
 * Created by PhpStorm.
 * User: hernando
 * Date: 02-06-17
 * Time: 12:27 PM
 */

namespace Cinema\Transformers;

use Cinema\Role;

use League\Fractal\TransformerAbstract;

class RoleTransformer extends TransformerAbstract
{
    public function transform(Role $role)
    {
        return [
            'id'    => (int) $role -> getKey(),
            'user_id'  => $role -> user_id,
            'name' => $role -> name,
        ];
    }
}