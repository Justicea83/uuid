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
	
	<div class="panel panel-default login ">
	<div class="panel-heading">
		<h3 class="header">Log In</h3>
	</div>	
	<div class="panel-body">
		<form method="post" action="{{route('login')}}">
		
		<div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
			<label class="control-label">E-mail</label>
		<input type="text" name="email" id="email" class="form-control " placeholder="Enter E-mail" value="{{Request::old('email')}}">
		@if($errors->has('email'))
		<span class="help-block">{{ $errors->first('email') }}</span>
		@endif
		</div>
		<div class="form-group has-feedback {{ $errors->has('password') ? 'has-error':'' }}">
			<label class="control-label">Password</label>
		<input type="password" name="password"  class="form-control password" placeholder="Enter Password">
		<span class="glyphicon glyphicon-eye-open form-control-feedback" aria-hidden="true"></span>
		@if($errors->has('password'))
		<span class="help-block">{{ $errors->first('password') }}</span>
		@endif
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="remember">Remember me
			</label>
			
		</div>
		<input type="submit" class="btn btn-primary btn-submit"  name="submit" value="Login">
		<a href="{{ route('password.email') }}" class="forgot">forgot Password?</a>	
		{{ csrf_field() }}
	</form>
	
	</div>
	</div>

	<div>
		<a type="button" href="{{ route('facebook') }}" class="btn btn-lg btn-primary btn-block">Facebook Login</a>
		<a type="button" href="{{ route('twitter') }}" class="btn btn-lg btn-info btn-block">Twitter Login</a>
		<a type="button" href="{{ route('google') }}" class="btn btn-lg btn-danger btn-block">Google Login</a>
		
	</div>
	
		<div class="col-xs-2 col-sm-2  col-md-2 col-xs-offset-5  col-sm-offset-5 col-md-offset-5">
		<a type="button"  class="btn btn-primary toggle" href="{{ route('register') }}">Register ?</a>
	</div>
	
</div>


</div>


@endsection