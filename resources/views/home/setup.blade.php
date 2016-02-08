@extends('master')

@section('content')

    {!! Form::open() !!}
    	<div class="input-group ">
    		
	    	{!! Form::label('title', 'Title:') !!}
	    	{!! Form::text('title','',array('class' => 'form-control')) !!}
	    	<br>
	    	{!! Form::label('value', 'value:') !!}
	    	{!! Form::textarea('value','',array('class' => 'form-control')) !!}
	    	<br>
	    	{!! Form::label('array', 'check:') !!}
	    	{!! Form::checkbox('array','true') !!} Array
	    	<br><br>
	    	{!! Form::submit('Submit',array('class' => 'btn btn-info')) !!}

    	</div>
	{!! Form::close() !!}

	
	@if(isset($setup))
		@foreach ($setup as $setup)

			ID: {{ $setup->id }}<br>
	        Title: {{ $setup->title }}<br>
	        Value: 
	        
	        	@if($setup->array) 
	        		<?php var_dump(unserialize($setup->value)); ?>
	        	@else
	        		{{ $setup->value }}
				@endif
	        

	    	<br>
	        Create-At: {{ $setup->created_at }} 
	        <br>
	        Update-At: {{ $setup->updated_at }}
	        <br>
	        ===============================================
	        <br>
	    @endforeach
	@endif





@endsection