<div class="modal fade" id="new-category-modal" tabindex="-1" role="dialog" aria-labelledby="#new_category" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            {!! Form::open(['route' => 'admin.products.categories.store', 'id' => 'category-form', 'class' => 'modal-form']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('category', 'Category') !!}
                            {!! Form::text('category', null, ['class' => 'form-control add', 'placeholder' => 'Category', 'id' => 'category']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::submit('Add', ['class' => 'btn btn-primary btn-block submit-modal', 'id' => 'category-submit']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>