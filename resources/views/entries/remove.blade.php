	{{ Form::model($entry, [
		'method' => 'DELETE',
		'route'  => ['entries.destroy', $entry->id],
	]) }}

		{{ Form::submit('Удалить') }}

	{{ Form::close() }}
	