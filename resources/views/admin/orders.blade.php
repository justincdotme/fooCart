@extends('admin.layouts.admin-main')

@section('title')
    @parent Orders
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Orders</h1>
            </div>
        </div>
        <div class="row row-top-buffer">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table id="admin_orders_list" class="table table-striped table-responsive table-hover table-bordered text-center">
                            <thead>
                            <tr>
                                <th class="col-sm-2">Date</th>
                                <th class="col-sm-2">Customer</th>
                                <th id="order_status" class="col-sm-2">Status</th>
                                <th class="col-sm-2">Order #</th>
                                <th class="col-sm-2">Total</th>
                                <th class="col-sm-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>
                                        {{ $order->getFormattedCreatedAt() }} <br />
                                    </td>
                                    <td>
                                        {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                                    </td>
                                    <td class="order-status-label">
                                        @if($order->status === 'Paid')
                                            <span class="label label-primary">Paid</span>
                                        @elseif($order->status === 'Shipped')
                                            <span class="label label-success">Shipped</span>
                                        @elseif($order->status === 'Cancelled')
                                            <span class="label label-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $order->order_id }}
                                    </td>
                                    <td>
                                        ${{ number_format($order->order_total, 2) }}
                                    </td>
                                    <td class="order-action-icons">
                                        <a class="btn btn-danger" data-toggle="modal" data-href="/admin/orders/{{ $order->order_id }}" data-target="#delete-confirm"><span class="glyphicon  glyphicon glyphicon-remove"></span> Delete</a>
                                        <a href="/admin/orders/{{ $order->order_id }}" class="order-edit btn btn-info"><span class="glyphicon  glyphicon glyphicon-pencil"></span> Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                       <h3 class="text-center">No Orders</h3>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog" aria-labelledby="confirmHead" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="confirmHead">Confirm Delete?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure that you want to delete this order?</p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(['method' => 'DELETE']) !!}
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-ok']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        /**
         * Pass the data-href property to the modal window and use it as the form action.
         * This is used for deleting orders.
         */
        $('#delete-confirm').on('show.bs.modal', function(e) {
            $(this).find('form').attr('action', $(e.relatedTarget).data('href'));
        });
    </script>

@stop
