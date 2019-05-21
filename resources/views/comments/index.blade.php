{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}} 
 
{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}} 
extends('base') 
 
{{-- В секции title родительского шаблона будет выведен перевод фразы: Comments --}} 
@section('title', __('Comments')) 
 
{{-- В секции main родительского шаблона будет выведена форма --}} 
@section('main')     
<p>         
{{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}         
{{             
Html::secureLink(                 
route('comments.create'),                 
__('Create comment') 
)
 }}     
 </p> 
 <div class="table-responsive">         
 <table class="table table-hover table-striped">             
 <tr>                 
 <th>{{ __('Title') }}</th>                 
 <th>{{ __('Price') }}</th>                 
 <th>                     
 <span class="glyphicon glyphicon-pencil" aria-hidden="true">                     
 </span>                
 </th>                 
 <th>                     
 <span class="glyphicon glyphicon-remove" aria-hidden="true">                     
 </span>               
 </th>           
 </tr>        
 @foreach ($comments as $comment)             
 <tr>                   
 <td>{{ $comment->title }}</td>      
 <td>{{ $comment->price }}</td>                    
 <td>{{ Html::secureLink(                      
 route('comments.edit', $comment->id),             
 __('Edit comment')                
 ) }}</td>                    
 <td>{{ Html::secureLink(               
 route('comments.remove', $comment->id),            
 __('Remove comment')            
 ) }}</td>   
 </tr>        
 @endforeach       
 </table>    
 </div>
 @endsection
