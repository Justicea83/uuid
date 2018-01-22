@extends('../app')

@section('title')
facebook handle
@endsection

@section('content')
@include('includes.header')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <p class="lead">{{ $FacebookUser->getName()}}</p>
    </div>
    <div class="col-md-6">
    	<div class="well">
    		
				{{$friends}}
				
    		
    		
    	</div>
    </div>
  </div>
</div>
@endsection
