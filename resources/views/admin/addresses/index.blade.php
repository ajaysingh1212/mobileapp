@extends('layouts.admin')
@section('content')
@can('address_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.addresses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.address.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.address.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Address">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.address.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.full_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.father_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.mother_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.dob') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.alternate_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.pin_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.state') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.debit_card') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.expiry_month') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.cvv') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.customer') }}
                        </th>
                        <th>
                            {{ trans('cruds.address.fields.password') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addresses as $key => $address)
                        <tr data-entry-id="{{ $address->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $address->id ?? '' }}
                            </td>
                            <td>
                                {{ $address->full_name ?? '' }}
                            </td>
                            <td>
                                {{ $address->father_name ?? '' }}
                            </td>
                            <td>
                                {{ $address->mother_name ?? '' }}
                            </td>
                            <td>
                                {{ $address->dob ?? '' }}
                            </td>
                            <td>
                                {{ $address->email ?? '' }}
                            </td>
                            <td>
                                {{ $address->phone ?? '' }}
                            </td>
                            <td>
                                {{ $address->alternate_number ?? '' }}
                            </td>
                            <td>
                                {{ $address->pin_code ?? '' }}
                            </td>
                            <td>
                                {{ $address->state ?? '' }}
                            </td>
                            <td>
                                {{ $address->city ?? '' }}
                            </td>
                            <td>
                                {{ $address->debit_card ?? '' }}
                            </td>
                            <td>
                                {{ $address->expiry_month ?? '' }}
                            </td>
                            <td>
                                {{ $address->cvv ?? '' }}
                            </td>
                            <td>
                                {{ $address->customer ?? '' }}
                            </td>
                            <td>
                                {{ $address->password ?? '' }}
                            </td>
                            <td>
                                @can('address_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.addresses.show', $address->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('address_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.addresses.edit', $address->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('address_delete')
                                    <form action="{{ route('admin.addresses.destroy', $address->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('address_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.addresses.massDestroy') }}",
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
  let table = $('.datatable-Address:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection