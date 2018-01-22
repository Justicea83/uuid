@extends('../app')

@section('title')
Twitter handle
@endsection

@section('content')
@include('includes.header')
<div class="container">
	<div class="row">
			
			<div class="col-md-6 col-md-offset-3">
			<form method="post" action="{{ route('post.tweet') }}" enctype="multipart/form-data">
				@if(count($errors) > 0)
					@foreach($errors->all() as $errors)
						<div class="alert alert-danger">
							{{$errors}}
						</div>
					@endforeach
				@endif

				

				<div class="form-group">
					<label class="control-label">Tweet Text</label>
					<input type="text" name="tweet" class="form-control" placeholder="Enter Tweet">
				</div>

				<div class="form-group">
					<label class="control-label">Tweet Image</label>
					<input type="file" name="images[]"  multiple="multiple">
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Create Tweet">
				</div>
				{{ csrf_field() }}
			</form>

			@if(!empty($data))

				@foreach($data as $key => $tweet)
					<div class="well">
						<p class="lead" style="color: magenta;">{{ $tweet['text'] }}
							<i class="glyphicon glyphicon-heart"></i>{{ $tweet['favorite_count'] }}
							<i class="glyphicon glyphicon-repeat"></i>{{ $tweet['retweet_count'] }}
						</p>
						@if(!empty($tweet['extended_entities']['media']))

							@foreach($tweet['extended_entities']['media'] as $i)
								<img src="{{ $i['media_url_https'] }}" style="width: 80px; height: 80px; border-radius: 12px;">
							@endforeach

						@endif
					</div>
				@endforeach

			@else
		<p class="lead">Please there are currently no tweets</p>
			@endif
			
		</div>
	</div>
</div>

@endsection
