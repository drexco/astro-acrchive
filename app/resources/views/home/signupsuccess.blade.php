@extends('layouts.master')

@section('page_title')
	Registeration Status
@stop

@section('content')
<div class="container main_content">
		
		<h4>Notice</h4>
		 {{Session::get('register_message')}} <a class="label label-success" href="signin">Login</a> to continue. 
</div>
@stop
