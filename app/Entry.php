<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    //Разрешаем работать со след. атрибутами:
	protected $fillable = ['title','content','user_id'];
	
	public function user()
	{
		// Извлечь автора:
		return
		$this->belongsTo(User::class);
	}
}
