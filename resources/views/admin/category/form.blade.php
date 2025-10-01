<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
            	{!! Form::label('name', 'Name') !!}
            	{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('price_increment', 'Price Increment (%)') !!}
                {!! Form::number('price_increment', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'e.g. 2']) !!}
                <small class="text-muted">Leave empty if you don’t want to change prices</small>
            </div>
        </div>
   </div>
</div>

<div class="form-actions text-right pb-0">
	{!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
