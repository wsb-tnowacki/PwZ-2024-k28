@extends('layout.szablon')
@section('tytul','Dodawanie postu')
@section('podtytul', 'Dodaj post')
@section('tresc')
@isset($post)
    <div class="for-group">
        <label for="tytul">Tytuł</label>
        <input type="text" class="form-control" name="tytul" id="tytul" value="{{$post->tytul}}" disabled>  
    </div>
    <div class="for-group">
        <label for="autor">Autor</label>
        <input type="text" class="form-control" name="autor" id="autor" value="{{$post->autor}}" disabled>  
    </div>
    <div class="for-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{$post->email}}" disabled>  
    </div>
    <div>
        Data utworzenia: <b>{{date('j F Y H:m:s',strtotime($post->created_at))}}</b>
    </div>
    <div>
        Data edycji: <b>{{date('j F Y H:m:s',strtotime($post->updated_at))}}</b>
    </div>
    <div class="for-group">
        <label for="tresc">Treść</label>
        <textarea class="form-control" name="tresc" id="tresc" cols="4" disabled>{{$post->tresc}}</textarea>
    </div>    
@endisset
<a href="{{route('post.index')}}"><button class="btn btn-primary m-1" type="submit">Powrót do listy</button></a>
@endsection
