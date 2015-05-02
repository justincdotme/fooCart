<div class="modal fade" id="delete-image-confirm" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="confirmHead">Confirm Delete Image?</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure that you want to delete this image?</p>
            </div>
            <div class="modal-footer">
                {!! Form::open(['method' => 'DELETE', 'id' => 'delete-image-form']) !!}
                    <button type="button" id="cancel-btn" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-ok', 'id' => 'delete-submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>