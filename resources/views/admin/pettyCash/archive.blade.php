@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        List Of Archived Petty Cash Requests
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PettyCash">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Request ID
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Created On
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pettyCashes as $key => $pettyCash)
                        <tr>
                            <td>

                            </td>
                            <td>
                                {{ $pettyCash->id ?? ' ' }}
                            </td>
                            <td>
                                {{ $pettyCash->description ?? '' }}
                            </td>
                            <td>
                                {{ $pettyCash->amount ?? '' }}
                            </td>
                            <td>
                                {{ $pettyCash->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $pettyCash->status }}
                            </td>
                            <td>
                                @can('petty_cash_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.petty-cash.show', $pettyCash->id) }}">
                                        View
                                    </a>
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
// @can('user_delete')
//   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
//   let deleteButton = {
//     text: deleteButtonTrans,
//     url: "{{ route('admin.users.massDestroy') }}",
//     className: 'btn-danger',
//     action: function (e, dt, node, config) {
//       var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
//           return $(entry).data('entry-id')
//       });

//       if (ids.length === 0) {
//         alert('{{ trans('global.datatables.zero_selected') }}')

//         return
//       }

//       if (confirm('{{ trans('global.areYouSure') }}')) {
//         $.ajax({
//           headers: {'x-csrf-token': _token},
//           method: 'POST',
//           url: config.url,
//           data: { ids: ids, _method: 'DELETE' }})
//           .done(function () { location.reload() })
//       }
//     }
//   }
//   dtButtons.push(deleteButton)
// @endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-PettyCash:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection