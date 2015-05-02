<div class="modal fade" id="new-manufacturer-modal" tabindex="-1" role="dialog" aria-labelledby="#new_manufacturer" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            {!! Form::open(['route' => 'admin.products.manufacturers.store', 'id' => 'new-manufacturer-form', 'class' => 'modal-form']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Manufacturer</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('manufacturer', 'Manufacturer') !!}
                            {!! Form::text('manufacturer', null, ['class' => 'form-control add', 'placeholder' => 'Manufacturer Name', 'id' => 'manufacturer-name']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::submit('Add', ['class' => 'btn btn-primary btn-block submit-modal', 'id' => 'new-manufacturer-submit']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>