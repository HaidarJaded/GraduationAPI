<?php

namespace App\Http\Controllers;

use App\Models\Permission_rule;
use App\Traits\ApiResponseTrait;
use App\Traits\CRUDTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductOrderController extends Controller
{
    use ApiResponseTrait;
    use CRUDTrait;

    /**
     * @throws AuthorizationException
     */
    public function index(Request $request): JsonResponse
    {
        return $this->get_data(Permission_rule::class,$request, $request->with);
    }
    /**
     * @throws AuthorizationException
     */
    public function show($id, Request $request): JsonResponse
    {
        return $this->show_data(Permission_rule::class, $id, $request->with);
    }
    /**
     * @throws AuthorizationException
     */
    public function store(Request $request): JsonResponse
    {
        $validation =   Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id|unique:product_orders,product_id,NULL,id,order_id,' . $request->input('order_id'),
            'order_id' => 'required|exists:orders,id|unique:product_orders,order_id,NULL,id,product_id,' . $request->input('product_id')
        ]);
        if ($validation->fails()){
            return $this->apiResponse($validation->messages(),404,'Failed');
        }
        return  $this->store_data($request, Permission_rule::class);
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy($id): JsonResponse
    {
        return $this->delete_data($id,Permission_rule::class);
    }
}
