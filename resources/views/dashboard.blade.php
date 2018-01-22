@extends('app')

@section('title')
Welcome
@endsection

@section('content')
@include('includes.header')
<div class="container">
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div id="well">
				<p class="lead text-center">Supported Platforms</p>
				<div class="well" >
				<a type="button" href="{{ route('facebook.platform') }}" class="btn btn-lg btn-primary btn-block">Facebook</a>
				<a type="button" href="{{ route('tweets') }}" class="btn btn-lg btn-info btn-block">Twitter</a>
				<a type="button" href="" class="btn btn-lg btn-danger btn-block">Google</a>

	            </div>
			</div>
			
		
		</div>
	</div>
</div>

@endsection