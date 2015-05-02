@extends('admin.layouts.admin-main')

@section('title')
    @parent Messages
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Messages</h1>
            </div>
        </div>
        <div class="row row-top-buffer">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table id="admin_products_list" class="table table-striped table-responsive table-hover table-bordered text-center">
                            <thead>
                            <tr>
                                <th class="col-sm-1">Sent</th>
                                <th class="col-sm-2">Name</th>
                                <th class="col-sm-2">Email</th>
                                <th class="col-sm-2">Phone</th>
                                <th class="col-sm-3">Message</th>
                                <th class="col-sm-1">Read</th>
                                <th class="col-sm-1">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $message)
                                    <tr>
                                        <td>
                                            {{ $message->getHumanCreatedAt() }}
                                        </td>
                                        <td>
                                            {{ $message->sender_name }}
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $message->sender_email }}">{{ $message->sender_email }}</a>
                                        </td>
                                        <td>
                                            {{ substr($message->sender_phone, 0, 3)."-".substr($message->sender_phone, 3, 3)."-".substr($message->sender_phone, 6) }}
                                        </td>
                                        <td>
                                            <p class="text-left">
                                                {{ $message->message }}
                                            </p>
                                        </td>
                                        <td>
                                            @if($message->read)
                                                {!! Form::open(['method' => 'PUT', 'route' => ['admin.messages.update', $message->message_id],  'class' => 'mark-read-form message-read']) !!}
                                                <input type="hidden" name="read" value="0" />
                                                <button type="submit" class="btn btn-success">
                                                    <span class="glyphicon glyphicon-ok"></span>
                                                </button>
                                                {!! Form::close() !!}
                                            @else
                                                {!! Form::open(['method' => 'PUT', 'route' => ['admin.messages.update', $message->message_id],  'class' => 'mark-read-form']) !!}
                                                <input type="hidden" name="read" value="1" />
                                                <button type="submit" class="btn btn-default message-unread">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                                {!! Form::close() !!}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" data-toggle="modal" data-href="/admin/messages/{{ $message->message_id }}" data-target="#delete-confirm"><span class="glyphicon glyphicon-remove"></span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <h1 class="text-center">No Messages</h1>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="confirmHead">Confirm Delete Image?</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure that you want to delete this message?</p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['method' => 'DELETE', 'id' => 'delete-message-form']) !!}

                    <button type="button" id="cancel-btn" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-ok', 'id' => 'delete-submit']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script>
        /**
         * Handle clicks on the .mark-read-form icon.
         * Set the state of the message to "read" or "unread".
         */
        $('.mark-read-form').on('click', function(e)
        {
            var form = $(this);
            var read = form.hasClass('message-read');
            var url = form.attr('action');
            var data = form.serialize();
            var statusInput = form.find('input[name="read"]');
            var submitBtn = form.find('button[type="submit"]');
            $.post(url, data, function(d)
            {
                if(read)
                {
                    //Marking the message as unread
                    statusInput.val('1');
                    form.removeClass('message-read');
                    submitBtn.removeClass('btn-success').addClass('btn-default').html('<span class="glyphicon glyphicon-minus"></span>');
                } else {
                    //Marking the message as read
                    statusInput.val('0');
                    form.addClass('message-read');
                    submitBtn.removeClass('btn-default').addClass('btn-success').html('<span class="glyphicon glyphicon-ok"></span>');
                }
            });
            e.preventDefault();
        });

        /**
         * Pass the data-href property to the modal window and use it as the form action.
         * This is used for deleting messages.
         */
        $('#delete-confirm').on('show.bs.modal', function(e) {
            $(this).find('form').attr('action', $(e.relatedTarget).data('href'));
        });
    </script>
@stop
