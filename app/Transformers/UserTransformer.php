<?php
/**
 * Created by PhpStorm.
 * User: hernando
 * Date: 02-06-17
 * Time: 12:15 PM
 */

namespace Cinema\Transformers;

use Cinema\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'roles'
    ];

    public function transform(User $user)
    {
        return [
            'id'    => (int) $user -> getKey(),
            'name'  => $user -> name,
            'email' => $user -> email,
        ];
    }

    /**
     * Include Author
     *
     * @return League\Fractal\ItemResource
     */
    public function includeRoles(User $user)
    {
        $roles = $user -> roles() -> get();

        return $this->collection($roles, new RoleTransformer);
    }
}