@extends('base')
{{-- Дочерний шаблон --}}
@section('title', 'Создание записи в блоге')
@section('content')
{{ Form::model($entry, [
	'route' => 'entries.store',
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
@endsection