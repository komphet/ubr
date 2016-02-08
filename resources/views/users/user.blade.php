@extends('master')

@section('title')
	User
@endsection

@section('breadcrumb')
 <li><a href="{{ route('member') }}">{{ Auth::user()->username }}</a></li>
@endsection 

@section('content')
	สวัสดี {{ Auth::user()->username }}

@endsection