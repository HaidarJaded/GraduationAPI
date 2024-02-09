<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Traits\CRUDTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use CRUDTrait;

    /**
     * @throws AuthorizationException
     */
    public function index(): JsonResponse
    {
        return $this->get_data(Permission::class);
    }

    /**
     * @throws AuthorizationException
     */
    public function show($id): JsonResponse
    {
        return $this->show_data(Permission::class, $id);
    }

    /**
     * @throws AuthorizationException
     */
    public function store(Request $request): JsonResponse
    {
        return $this->store_data($request, Permission::class);
    }

    /**
     * @throws AuthorizationException
     */
    public function update(Request $request, $id): JsonResponse
    {
        return $this->update_data($request, $id, Permission::class);
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy($id): JsonResponse
    {
        return $this->delete_data($id, Permission::class);
    }
}
