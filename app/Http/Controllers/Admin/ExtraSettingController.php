<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExtraSettingRequest;
use App\Http\Requests\StoreExtraSettingRequest;
use App\Http\Requests\UpdateExtraSettingRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExtraSettingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('extra_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extraSettings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('extra_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extraSettings.create');
    }

    public function store(StoreExtraSettingRequest $request)
    {
        $extraSetting = ExtraSetting::create($request->all());

        return redirect()->route('admin.extra-settings.index');
    }

    public function edit(ExtraSetting $extraSetting)
    {
        abort_if(Gate::denies('extra_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extraSettings.edit', compact('extraSetting'));
    }

    public function update(UpdateExtraSettingRequest $request, ExtraSetting $extraSetting)
    {
        $extraSetting->update($request->all());

        return redirect()->route('admin.extra-settings.index');
    }

    public function show(ExtraSetting $extraSetting)
    {
        abort_if(Gate::denies('extra_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extraSettings.show', compact('extraSetting'));
    }

    public function destroy(ExtraSetting $extraSetting)
    {
        abort_if(Gate::denies('extra_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extraSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyExtraSettingRequest $request)
    {
        $extraSettings = ExtraSetting::find(request('ids'));

        foreach ($extraSettings as $extraSetting) {
            $extraSetting->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
