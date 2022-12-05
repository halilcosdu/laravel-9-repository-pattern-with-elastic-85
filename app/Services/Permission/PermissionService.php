<?php

namespace App\Services\Permission;

use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

/**
 *
 */
class PermissionService
{
    /**
     * @param  \Illuminate\Pipeline\Pipeline  $pipeline
     */
    public function __construct(private readonly Pipeline $pipeline)
    {
        //
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $permissions
     * @return mixed
     */
    public function check(Request $request, array $permissions)
    {
        return $this->pipeline->send($request)->through($permissions)->thenReturn();
    }
}
