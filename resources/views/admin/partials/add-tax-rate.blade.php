<div class="modal fade" id="new-tax-modal" tabindex="-1" role="dialog" aria-labelledby="#new_tax_rate" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            {!! Form::open(['route' => 'admin.products.tax.store', 'id' => 'tax-rate-form', 'class' => 'modal-form']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Tax Rate</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('tax', 'Tax Rate') !!}
                            {!! Form::text('tax', null, ['class' => 'form-control add', 'placeholder' => '0.123', 'id' => 'tax-rate']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::submit('Add', ['class' => 'btn btn-primary btn-block submit-modal', 'id' => 'tax-rate-submit']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>