@extends('admin.layouts.admin-main')

@section('title')
    @parent Slideshow Editor
@stop

@section('content')
    <div class="container" id="slide-edit-main">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="inline">Edit Slideshow</h1>
                <a href="/admin/slideshow/create" class="btn btn-primary pull-right" id="add-slide"><span class="glyphicon glyphicon-plus"></span> <h4 class="inline">Add Slide</h4></a>
            </div>
        </div>

    @forelse($slides as $slide)
        {!! Form::open(['method' => 'PUT', 'route' => ['admin.slideshow.update', $slide->slide_id],  'class' => 'primary-form']) !!}
        <div class="row row-top-buffer">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-7 col-md-9">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <img class="image-stretch" src="{{ $slide->image_path }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 col-md-3">
                                <div class="panel panel-default">
                                    <form>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    {!! Form::label('href', 'Link') !!}
                                                    {!! Form::text('href', $slide->href, ['class' => 'form-control', 'id' => 'slide-link-' . $slide->slide_id ,'placeholder' => 'http://www.example.com']) !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    {!! Form::label('slide-order-' . $slide->slide_id, 'Slide Order') !!}
                                                    <select class="form-control" id="slide-order-{{ $slide->slide_id }}" name="sequence">
                                                        @for($i = 0; $i < $count; $i++)
                                                            @if($i+1 == $slide->sequence)
                                                                <option value="{{ $slide->sequence }}" selected="true">{{ $slide->sequence }}</option>
                                                            @else
                                                                <option value="{{ $i+1 }}">{{ $i+1 }}</option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    {!! Form::label('slide-active-' . $slide->slide_id, 'Active') !!}
                                                    {!! Form::select('active', ['0' => 'No', '1' => 'Yes'], $slide->active, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-6 text-center">
                                                    <button type="button" class="btn btn-success slide-save slide-{{ $slide->slide_id }}" aria-label="Save Changes">
                                                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Save
                                                    </button>
                                                </div>
                                                <div class="col-sm-6 text-center">
                                                    <a class="btn btn-danger" data-toggle="modal" data-href="/admin/slideshow/{{ $slide->slide_id }}" data-target="#slide-delete-confirm">
                                                        <span class="glyphicon  glyphicon glyphicon-remove"></span> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="slide-delete-confirm" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirm Delete</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p>Are you sure that you want to delete this slide?</p>
                            </div>
                        </div>
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
        <div class="modal fade" id="slide-save-confirm" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Success!</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p>The slide has been saved!</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    @empty
        <h1>There are no slides.</h1>
    @endforelse
    </div>

    <script>
        slideshow = window.slideshow || {};

        /**
         * Handle form submission for slideshow.
         */
        $('form.primary-form').each(function()
        {
            var jThis = $(this);
            jThis.find('button.slide-save').click(function(e)
            {
                var url = jThis.attr('action');
                var data = jThis.serialize();

                $.post(url, data, function(d)
                {
                    //Display the success modal
                    $('#slide-save-confirm').modal();
                });

                e.preventDefault();
                return false;
            });
            //Prevent form from being submitted accidentally with enter key.
            jThis.submit(function(e)
            {
                e.preventDefault();
                return false;
            });
        });

        /**
         * Pass the data-href property to the modal window and use it as the form action.
         * This is used for deleting slides.
         */
        $('#slide-delete-confirm').on('show.bs.modal', function(e) {
            $(this).find('form').attr('action', $(e.relatedTarget).data('href'));
        });
    </script>
@stop