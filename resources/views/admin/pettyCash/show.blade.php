@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Petty Cash #{{ $pettyCash->id }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Request ID
                        </th>
                        <td>
                            {{ $pettyCash->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                            {{ $pettyCash->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Amount
                        </th>
                        <td>
                            {{ $pettyCash->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date On Receipt
                        </th>
                        <td>
                            {{ $pettyCash->receipt_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Requested By
                        </th>
                        <td>
                            {{ $pettyCash->requestedBy->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Received By
                        </th>
                        <td>
                            @if($pettyCash->received_by != null)
                                {{ $pettyCash->receivedBy->name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Approved By
                        </th>
                        <td>
                            @if($pettyCash->approved_by != null)
                                {{ $pettyCash->approvedBy->name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created On
                        </th>
                        <td>
                            {{ $pettyCash->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status
                        </th>
                        <td>
                            {{ $pettyCash->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Last Status Update
                        </th>
                        <td>
                            {{ $pettyCash->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
                <div style="margin-top:20px;" >
                    <a class="btn btn-danger" href="{{ url()->previous() }}">
                        Back to previous page
                    </a>
                </div>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection