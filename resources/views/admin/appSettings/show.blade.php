@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.appSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.app-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.appSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $appSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appSetting.fields.logo') }}
                        </th>
                        <td>
                            @if($appSetting->logo)
                                <a href="{{ $appSetting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $appSetting->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appSetting.fields.title') }}
                        </th>
                        <td>
                            {{ $appSetting->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appSetting.fields.banner_1') }}
                        </th>
                        <td>
                            @if($appSetting->banner_1)
                                <a href="{{ $appSetting->banner_1->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $appSetting->banner_1->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appSetting.fields.banner_2') }}
                        </th>
                        <td>
                            @if($appSetting->banner_2)
                                <a href="{{ $appSetting->banner_2->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $appSetting->banner_2->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appSetting.fields.banner_3') }}
                        </th>
                        <td>
                            @if($appSetting->banner_3)
                                <a href="{{ $appSetting->banner_3->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $appSetting->banner_3->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appSetting.fields.banner_4') }}
                        </th>
                        <td>
                            @if($appSetting->banner_4)
                                <a href="{{ $appSetting->banner_4->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $appSetting->banner_4->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appSetting.fields.footer_content') }}
                        </th>
                        <td>
                            {!! $appSetting->footer_content !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.app-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection