@extends('layouts.admin')
@section('content')
@can('petty_cash_create')

    <div class="card">
        <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">Petty Cash</h3>
        <ul class="nav nav-pills ml-auto p-2">
            <li class="nav-item"><a class="nav-link " href="#make-request" data-toggle="tab">Make New Request</a></li>
            <li class="nav-item"><a class="nav-link active" href="#my-request" data-toggle="tab">My Petty Cash</a></li>
        </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane " id="make-request">
                <form action="{{ route('admin.petty-cash.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group {{ $errors->has('receipt_date') ? 'has-error' : '' }} col-md-6">
                            <label for="receipt_date">Date On Receipt*</label>
                            <input type="text" id="receipt_date" name="receipt_date" class="form-control date" value="{{ old('receipt_date', isset($petyCash) ? $petyCash->receipt_date : '') }}">
                            @if($errors->has('receipt_date'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('receipt_date') }}
                                </em>
                            @endif
                            <!-- <p class="helper-block">
                                {{ trans('cruds.petyCash.fields.receipt_date_helper') }}
                            </p> -->
                        </div>
                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }} col-md-6">
                            <label for="amount">Amount*</label>
                            <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($petyCash) ? $petyCash->amount : '') }}" step="0.01" >
                            @if($errors->has('amount'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </em>
                            @endif
                            <!-- <p class="helper-block">
                                {{ trans('cruds.petyCash.fields.amount_helper') }}
                            </p> -->
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }} col-md-12">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($petyCash) ? $petyCash->description : '') }}">
                            @if($errors->has('description'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </em>
                            @endif
                            <!-- <p class="helper-block">
                                {{ trans('cruds.petyCash.fields.description_helper') }}
                            </p> -->
                        </div>
                        <div class="col-md-12">
                            <input class="btn btn-danger" type="submit" value="Submit Request">
                        </div>
                    </div>
                    
                </form>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane active" id="my-request">
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
                                            @if($pettyCash->status === 'pending review')
                                                <a class="btn btn-xs btn-danger" href="{{ route('admin.petty-cash.withdraw', $pettyCash->id) }}">
                                                Withdraw Request
                                                </a>
                                            @endif
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
@endcan

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