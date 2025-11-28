@extends('layouts.admin')
@section('content')
@can('app_setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.app-settings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.appSetting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.appSetting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AppSetting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.appSetting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.appSetting.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.appSetting.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.appSetting.fields.banner_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.appSetting.fields.banner_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.appSetting.fields.banner_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.appSetting.fields.banner_4') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appSettings as $key => $appSetting)
                        <tr data-entry-id="{{ $appSetting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $appSetting->id ?? '' }}
                            </td>
                            <td>
                                @if($appSetting->logo)
                                    <a href="{{ $appSetting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $appSetting->logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $appSetting->title ?? '' }}
                            </td>
                            <td>
                                @if($appSetting->banner_1)
                                    <a href="{{ $appSetting->banner_1->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $appSetting->banner_1->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($appSetting->banner_2)
                                    <a href="{{ $appSetting->banner_2->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $appSetting->banner_2->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($appSetting->banner_3)
                                    <a href="{{ $appSetting->banner_3->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $appSetting->banner_3->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($appSetting->banner_4)
                                    <a href="{{ $appSetting->banner_4->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $appSetting->banner_4->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('app_setting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.app-settings.show', $appSetting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('app_setting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.app-settings.edit', $appSetting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('app_setting_delete')
                                    <form action="{{ route('admin.app-settings.destroy', $appSetting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('app_setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.app-settings.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-AppSetting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection