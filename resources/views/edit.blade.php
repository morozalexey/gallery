@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-5">
		<h1>Edit Image</h1>
		<img src="/{{$imageInView->img}}" alt="" class="img-thumbnail">
		<form action="/update/{{$imageInView->id}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-control">
				<input name="image" type="file">
			</div>
			<button type="submit" class="btn btn-warning">Edit</button>
		</form>
	</div>
</div>
@endsection