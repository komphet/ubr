@extends('master')

@section('title')
	Check Link
@endsection

@section('login')
	Error!!
@endsection

@section('content')

<div class="alert alert-danger" align="center">
	{{ $error }} 
	{!! link_to($redirect,'[กลับ]') !!}
</div>

@endsection