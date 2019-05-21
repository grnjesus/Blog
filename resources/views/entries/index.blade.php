@extends('base')
{{-- Первый параметр - Имя информациоонного блока в родительском шаблоне (@yield('tittle')) и то, что в нем будет --}}
@section('title','Все записи в блоге')

@section('content')

@push('styles')
<link rel="stylesheet" href="">
@endpush

<h1></h1>
<a href="{{ route('entries.create') }}">Создать запись в блоге</a>
@foreach ($entries as $entry)
<article>
<header>
	<h1>{{ $entry->title }}</h1>
	<p> {{ $entry->user->name }}</p>
	</header>
	<nav>
	<ul>
		<li><a href="{{ route('entries.edit', $entry->id) }}">Редактировать</a></li>
		<li><a href="{{ route('entries.remove', $entry->id) }}">Удалить</a></li>
	</ul>
	</nav>
	<div>
	{{ $entry->content }}
	</div>
	<footer>
	{{ $entry->created_at }}
	</footer>
</article>
@endforeach
@endsection
{{ $entries->links() }}