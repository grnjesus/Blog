<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Извлекаем из БД коллекцию товаров,         
		// отсортированных по возрастанию значений атрибута title         
		$comments = Comments::orderBy('title', 'ASC')->get();         
		// Использовать шаблон resources/views/comments/index.blade.php, где…         
		return view('comments.index')->withComments($comments); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // Форма добавления продукта в БД.         
		 // Создаём в ОЗУ новый экземпляр (объект) класса Product.         
		 $comment = new Comments(); 
        // Использовать шаблон resources/views/products/create.blade.php, в котором…         
		return view('comments.create')->withComments($comment); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Добавление продукта в БД         
		// Принимаем из формы значения полей с name, равными title, price.         
		$attributes = $request->only(['title', 'price']); 
        // Создаём кортеж в БД.         
		$comment = Comments::create($attributes); 
        // Создаём всплывающее сообщение об успешном сохранении в БД:         
		// первый аргумент  — произвольный ID сообщения, второй  — перевод         
		// (см. resources/lang/ru/messages.php).        
		$request->session()->flash(         
		'message',         
		__('Created', ['title' => $product->title])       
		); 
        // Перенаправляем клиент HTTP на маршрут с именем products.index   
		// (см. routes/web.php).       
		return redirect(route('comments.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comments)
    {
        // Форма редактирования продукта в БД.         
		// Использовать шаблон resources/views/comments/edit.blade.php, в котором…         
		return view('comments.edit')->withComment($comments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comments)
    {
        // Редактирование продукта в БД. 
        // Принимаем из формы значения полей с name, равными title, price.         
		$attributes = $request->only(['title', 'price']); 
        // Обновляем кортеж в БД.         
		$comments->update($attributes); 
        // Создаём всплывающее сообщение об успешном обновлении БД        
		$request->session()->flash(         
		'message',        
		__('Updated', ['title' => $comments->title])         
		); 
        // Перенаправляем клиент HTTP на маршрут с именем products.index  
		// (см. routes/web.php).       
		return redirect(route('comments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comments)
    {
        // Удаляем товар из БД.      
		$comments->delete(); 
        // Создаём всплывающее сообщение об успешном удалении из БД      
		$request->session()->flash(          
		'message',          
		__('Removed', ['title' => $comments->title])   
		); 
        // Перенаправляем клиент HTTP на маршрут с именем products.index   
		// (см. routes/web.php).       
		return redirect(route('comments.index')); 
    }
	public function remove(Product $comments)     
	{         
		// Использовать шаблон resources/views/products/remove.blade.php, где…         
		// …переменная $producs  — это объект товара.         
		return view('comments.remove')->withComment($comments);  
	}
}
