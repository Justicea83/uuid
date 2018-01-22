@extends('app')

@section('title')
Welcome
@endsection

@section('content')
<div class="row">
	<div class="col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-3 col-md-6 col-md-offset-3">
	<h2 class="heading">Welcome to Unique User Identification-UUID</h2>
</div>
</div>


<div class="row">
	<div class="col-xs-10 col-sm-6 col-md-4 col-xs-offset-1  col-sm-offset-3 col-md-offset-4">
	
	
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="header">Register</h3>
		</div>
		<div class="panel-body">
			<form method="post" action="{{ route('signup') }}">
				<div class="form-group {{ $errors->has('firstname') ? 'has-error':'' }}">
					<label class="control-label">First Name</label>
				<input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="{{ Request::old('firstname')}}">
				@if($errors->has('firstname'))
				<span class="help-block">{{ $errors->first('firstname') }}</span>
				@endif
				</div>

				<div class="form-group {{ $errors->has('lastname') ? 'has-error':'' }}">
					<label class="control-label"> Last Name</label>
				<input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" value="{{ Request::old('lastname')}}">
				@if($errors->has('lastname'))
				<span class="help-block">{{ $errors->first('lastname') }}</span>
				@endif
				</div>

				<div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
					<label for="email" class="control-label"> E-mail</label>
				<input type="text" class="form-control" name="email" id="email" placeholder="Enter E-mail" value="{{ Request::old('email')}}">
				@if($errors->has('email'))
				<span class="help-block">{{ $errors->first('email') }}</span>
				@endif
				</div>

				<div class="form-group has-feedback {{ $errors->has('password') ? 'has-error':'' }}">
					<label class="control-label">Password</label>
				<input type="password" name="password" class="form-control password" placeholder="Enter Password">
				<span class="glyphicon glyphicon-eye-open form-control-feedback" aria-hidden="true"></span>
				@if($errors->has('password'))
				<span class="help-block">{{ $errors->first('password') }}</span>
				@endif
				</div>

				<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error':'' }}">
					<label class="control-label">Re-enter Password</label>
		        <input type="password" name="password_confirmation" class="form-control password" placeholder="Re-enter Password">
		       
		        @if($errors->has('password_confirmation'))
				<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
				@endif
				</div>
		        <input type="submit" class="btn btn-primary btn-submit" id="btn1" name="submit" value="Join">
			{{csrf_field()}}
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4 col-sm-2  col-md-2 col-xs-offset-4  col-sm-offset-5 col-md-offset-5">
		<a type="button" href="{{ route('welcome') }}" class="btn btn-primary toggle owner" >Login ?</a>
	</div>
	</div>
</div>


</div>


@endsection