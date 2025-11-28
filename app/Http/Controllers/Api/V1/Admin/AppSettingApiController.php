<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAppSettingRequest;
use App\Http\Requests\UpdateAppSettingRequest;
use App\Http\Resources\Admin\AppSettingResource;
use App\Models\AppSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppSettingApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('app_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppSettingResource(AppSetting::all());
    }

    public function store(StoreAppSettingRequest $request)
    {
        $appSetting = AppSetting::create($request->all());

        if ($request->input('logo', false)) {
            $appSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('banner_1', false)) {
            $appSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_1'))))->toMediaCollection('banner_1');
        }

        if ($request->input('banner_2', false)) {
            $appSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_2'))))->toMediaCollection('banner_2');
        }

        if ($request->input('banner_3', false)) {
            $appSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_3'))))->toMediaCollection('banner_3');
        }

        if ($request->input('banner_4', false)) {
            $appSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_4'))))->toMediaCollection('banner_4');
        }

        return (new AppSettingResource($appSetting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AppSetting $appSetting)
    {
        abort_if(Gate::denies('app_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppSettingResource($appSetting);
    }

    public function update(UpdateAppSettingRequest $request, AppSetting $appSetting)
    {
        $appSetting->update($request->all());

        if ($request->input('logo', false)) {
            if (! $appSetting->logo || $request->input('logo') !== $appSetting->logo->file_name) {
                if ($appSetting->logo) {
                    $appSetting->logo->delete();
                }
                $appSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($appSetting->logo) {
            $appSetting->logo->delete();
        }

        if ($request->input('banner_1', false)) {
            if (! $appSetting->banner_1 || $request->input('banner_1') !== $appSetting->banner_1->file_name) {
                if ($appSetting->banner_1) {
                    $appSetting->banner_1->delete();
                }
                $appSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_1'))))->toMediaCollection('banner_1');
            }
        } elseif ($appSetting->banner_1) {
            $appSetting->banner_1->delete();
        }

        if ($request->input('banner_2', false)) {
            if (! $appSetting->banner_2 || $request->input('banner_2') !== $appSetting->banner_2->file_name) {
                if ($appSetting->banner_2) {
                    $appSetting->banner_2->delete();
                }
                $appSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_2'))))->toMediaCollection('banner_2');
            }
        } elseif ($appSetting->banner_2) {
            $appSetting->banner_2->delete();
        }

        if ($request->input('banner_3', false)) {
            if (! $appSetting->banner_3 || $request->input('banner_3') !== $appSetting->banner_3->file_name) {
                if ($appSetting->banner_3) {
                    $appSetting->banner_3->delete();
                }
                $appSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_3'))))->toMediaCollection('banner_3');
            }
        } elseif ($appSetting->banner_3) {
            $appSetting->banner_3->delete();
        }

        if ($request->input('banner_4', false)) {
            if (! $appSetting->banner_4 || $request->input('banner_4') !== $appSetting->banner_4->file_name) {
                if ($appSetting->banner_4) {
                    $appSetting->banner_4->delete();
                }
                $appSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_4'))))->toMediaCollection('banner_4');
            }
        } elseif ($appSetting->banner_4) {
            $appSetting->banner_4->delete();
        }

        return (new AppSettingResource($appSetting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AppSetting $appSetting)
    {
        abort_if(Gate::denies('app_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appSetting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
