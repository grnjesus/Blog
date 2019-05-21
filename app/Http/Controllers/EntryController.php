<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEntryRequest;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Выборка всех записей блога из БД.
		$entries = Entry::orderBy('id')->paginate(2);
		
		//Передаем массив объектов в шаблон.
		return view('entries.index', [
			'entries'=>$entries,
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Создаем объект блогозаписиси в ОЗУ
		$entry = new Entry();
		// Рендер шаблона
		return view('entries.create',[
		'entry' => $entry,
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntryRequest $request)
    {
        //Извлекаем нужные нам поля из запроса
		$attributes = $request ->only(['title', 'content']);
		
		//Подставляем в набор первичный ключ автора
		$attributes['user_id'] = $request->user()->id;
		
		//var_dump($attributes);
		//Сохраняем в БД
		Entry::create($attributes);
		//Перенаправляем
		return redirect(route('entries.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        return view('entries.edit', [
		'entry'=>$entry,
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
         //Извлекаем нужные нам поля из запроса
		$attributes = $request ->only(['title', 'content']);
		//Сохраняем в БД
		$entry->update($attributes);
		//Перенаправляем
		return redirect(route('entries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        $entry->delete();
		return redirect(route('entries.index'));
    }
	
	public function remove(Entry $entry)
    {
        return view('entries.remove', [
		'entry'=>$entry,
		]);
    }
}
