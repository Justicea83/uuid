@extends('../app')

@section('title')
google plus
@endsection

@section('content')
@include('includes.header')
<div class="container">
  {{FacebookUser->getName()}}
</div>
@endsection
