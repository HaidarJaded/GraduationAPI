<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\CreateOrderRequest;
use App\Http\Requests\Orders\UpdateOrderRequest;
use App\Models\Order;
use App\Traits\CRUDTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use CRUDTrait;

    /**
     * @throws AuthorizationException
     */
    public function index(Request $request): JsonResponse
    {
        return $this->get_data(Order::class,$request, $request->with);
    }

    /**
     * @throws AuthorizationException
     */
    public function show($id, Request $request): JsonResponse
    {
        return $this->show_data(Order::class, $id, $request->with);
    }

    /**
     * @throws AuthorizationException
     */
    public function store(CreateOrderRequest $request): JsonResponse
    {
        return $this->store_data($request, Order::class);
    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdateOrderRequest $request, $id): JsonResponse
    {
        return $this->update_data($request, $id, Order::class);
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy($id): JsonResponse
    {
        return $this->delete_data($id, Order::class);
    }
}
