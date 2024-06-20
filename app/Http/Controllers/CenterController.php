<?php

namespace App\Http\Controllers;

use App\Http\Requests\Centers\CreateCenterRequest;
use App\Http\Requests\Centers\UpdateCenterRequest;
use App\Models\Center;
use App\Traits\CRUDTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    use CRUDTrait;

    public function index(Request $request): JsonResponse
    {
        $centers = Center::all();
        return $this->apiResponse($centers);
    }

    public function show($id): JsonResponse
    {
        try {
            $object = Center::findOrFail($id);
            $this->authorizeForModel(Center::find($id), 'view');
            return $this->apiResponse($object);
        } catch (ModelNotFoundException $e) {
            $exceptionModel = explode('\\', $e->getModel());
            $exceptionModel = end($exceptionModel);
            return $this->apiResponse(null, 404, "Error: $exceptionModel with ID $id not found.");
        }
    }

    public function store(CreateCenterRequest $request): JsonResponse
    {
        return $this->store_data($request, new Center());
    }

    public function update(UpdateCenterRequest $request, $id): JsonResponse
    {
        return $this->update_data($request, $id, new Center());
    }

    public function destroy($id): JsonResponse
    {
        return $this->destroy_data($id, new Center());
    }
}
