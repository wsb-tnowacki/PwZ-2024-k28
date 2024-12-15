@extends('layout.szablon')
@section('tytul','Dodawanie postu')
@section('podtytul', 'Dodaj post')
@section('tresc')
@if ($errors->any())
    <div class="alert alert-danger m-1">Uzupełnij brakujące pola
{{--         @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach --}}
    </div>
@endif
<form action="{{route('post.store')}}" method="post">
    @csrf
    <div class="for-group">
        <label for="tytul">Tytuł</label>
        <input type="text" class="form-control" name="tytul" id="tytul" placeholder="Podaj tytul postu" value="{{old('tytul')}}">  
{{--         @if ($errors->has('tytul'))
        <div style="color:red">
            @foreach ($errors->get('tytul') as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
        @endif --}}
        @error('tytul')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <div class="for-group">
        <label for="tresc">Treść</label>
        <textarea class="form-control" name="tresc" id="tresc" cols="4">{{old('tresc')}}</textarea>
        @error('tresc')
        <div style="color: red">{{$message}}</div>
        @enderror 
    </div>
    <button class="btn btn-success m-1" type="submit">Dodaj post</button>
</form>
<button class="btn btn-primary m-1" type="submit">Powrót do listy</button>
@endsection
