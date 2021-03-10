@if(session('message'))
	<div class="alert alert-success" role="alert" >{{ session('message') }}</div>
</div>
@endif
@if($errors->count() > 0)
<div class="alert alert-danger" role="alert">
	<ul class="list-unstyled">
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
@if(session('success'))
<div class="alert alert-success" role="alert">
	{{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger" role="alert">
	{{ session('error') }}
</div>
@endif