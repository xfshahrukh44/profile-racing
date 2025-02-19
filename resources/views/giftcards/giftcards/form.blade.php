<div class="form-body">
    <div class="row">
		<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('code', 'Code') !!}
    	    	{!! Form::text('code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('balance', 'Balance') !!}
    	    	{!! Form::number('balance', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'step' => 'any'] : ['class' => 'form-control', 'step' => 'any']) !!}
    </div>
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('expiry_date', 'Expiry Date') !!}
    	    	{!! Form::date('expiry_date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>
	</div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
