<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreViewDataRequest;
use App\Http\Requests\UpdateViewDataRequest;
use App\Http\Resources\Admin\ViewDataResource;
use App\Models\ViewData;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewDataApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('view_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ViewDataResource(ViewData::all());
    }

    public function store(StoreViewDataRequest $request)
    {
        $viewData = ViewData::create($request->all());

        return (new ViewDataResource($viewData))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ViewData $viewData)
    {
        abort_if(Gate::denies('view_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ViewDataResource($viewData);
    }

    public function update(UpdateViewDataRequest $request, ViewData $viewData)
    {
        $viewData->update($request->all());

        return (new ViewDataResource($viewData))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ViewData $viewData)
    {
        abort_if(Gate::denies('view_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viewData->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
