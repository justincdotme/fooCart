@extends('admin.layouts.admin-main')

@section('title')
    @parent Add Slide
@stop

@section('content')
<div class="container" id="slide-edit-main">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="inline">Add Slide</h1>
        </div>
    </div>
    <div class="row row-top-buffer" id="new-slide">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-7 col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-body slide" id="new-slide-upload">
                                    <button type="button" class="btn btn-primary col-xs-2 col-xs-offset-5 col-sm-4 col-sm-offset-4 col-md-2 col-md-offset-5" aria-label="Upload Image" id="upload">
                                        <h3 class="inline">Browse</h3>
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-info">
                                                <h3 class="text-center">Instructions</h3>
                                                <hr />
                                                <ol class="slide-instructions">
                                                    <li>Click the browse button and select an image (PNG, GIF or JPG) to upload.</li>
                                                    <li>Click and drag the image within the box to select the appropriate visible area.</li>
                                                    <li>Click the crop icon.</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        @include('admin.partials.error')
    </div>
    <script>
        /**
         * Initialize the CropPic plugin.
         * http://www.croppic.net
         */
        var slideParams = {
            cropData: {
                "slideshow": 1,
                "count": {{ $count }},
                "_token" : "{{ csrf_token() }}"
            },
            onAfterImgCrop: function()
            {
                //Display success modal on when the image is successfully cropped.
                $('#slide-save-confirm').modal();
            },
            onError: function()
            {
                $("#gen-error").modal();
            },
            doubleZoomControls: false,
            rotateControls: false,
            customUploadButtonId: 'upload',
            uploadUrl: '/admin/slideshow',
            cropUrl: '/admin/slideshow/crop',
            imgEyecandy: false,
            loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
        };

        //Initialize the CropPic plugin with the above params
        var slideUpload = new Croppic('new-slide-upload', slideParams);

        /**
         * Redirect the user to the Slideshow Editor page when the success modal is hidden.
         */
        $('#slide-save-confirm').on('hidden.bs.modal', function(e)
        {
            window.location.href = '/admin/slideshow';
        });

        /**
         * Refresh the page after the modal error window is closed.
         * This is done to re-initialize the CropPic plugin.
         */
        $('#gen-error').on('hidden.bs.modal', function(e)
        {
            window.location.href = '/admin/slideshow/create';
        });

        //Append CSRF token to image upload form.
        $('form.new-slide-upload_imgUploadForm').append('<input type="hidden" name="_token" value="{{ csrf_token() }}">');
    </script>
@stop