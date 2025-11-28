<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyViewDataRequest;
use App\Http\Requests\StoreViewDataRequest;
use App\Http\Requests\UpdateViewDataRequest;
use App\Models\ViewData;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewDataController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('view_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viewDatas = ViewData::all();

        return view('admin.viewDatas.index', compact('viewDatas'));
    }

    public function create()
    {
        abort_if(Gate::denies('view_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.viewDatas.create');
    }

    public function store(StoreViewDataRequest $request)
    {
        $viewData = ViewData::create($request->all());

        return redirect()->route('admin.view-datas.index');
    }

    public function edit(ViewData $viewData)
    {
        abort_if(Gate::denies('view_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.viewDatas.edit', compact('viewData'));
    }

    public function update(UpdateViewDataRequest $request, ViewData $viewData)
    {
        $viewData->update($request->all());

        return redirect()->route('admin.view-datas.index');
    }

    public function show(ViewData $viewData)
    {
        abort_if(Gate::denies('view_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.viewDatas.show', compact('viewData'));
    }

    public function destroy(ViewData $viewData)
    {
        abort_if(Gate::denies('view_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viewData->delete();

        return back();
    }

    public function massDestroy(MassDestroyViewDataRequest $request)
    {
        $viewDatas = ViewData::find(request('ids'));

        foreach ($viewDatas as $viewData) {
            $viewData->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
