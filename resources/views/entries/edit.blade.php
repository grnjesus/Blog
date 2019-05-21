{{ Form::model($entry, [
'method' => 'PUT',
	'route' => ['entries.update', $entry->id],
	]) }}
	@include('entries.partials.fields')
	{{ Form::submit('Отправить') }}
{{ Form::close() }}

@if ($errors->any())     
<div class="alert alert-danger">         
	<ul>             
		@foreach ($errors->all() as $error)                 
		<li>{{ $error }}</li>             
		@endforeach         
	</ul>     
</div> 
@endif