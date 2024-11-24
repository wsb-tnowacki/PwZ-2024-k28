@extends('layout.szablon')
@section('tytul','Lista postów')
@section('podtytul', 'Lista postów')
@section('tresc')
<a href="{{route('post.create')}}" class="btn btn-primary m-1"> Dodaj posta</a>
<table class="table table-striped">
<thead>
    <th scope="col">Lp</th>
    <th scope="col">Tytuł</th>
    <th scope="col">Autor</th>
    <th scope="col">Data powstania</th>
    @auth
    <th scope="col">Akcja</th>       
    @endauth
</thead>
<tbody>
    @isset($posty)
        @if($posty->count())
            @foreach ($posty as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('post.show',$post->id)}}">{{$post->tytul}}</a></td>
                    <td>{{$post->autor}}</td>
                    <td>{{date('j F Y',strtotime($post->created_at))}}</td>
                    @auth
                                        <td class="d-flex">
                        <a href="{{route('post.edit', $post->id)}}">
                            <button class="btn btn-success m-1" type="submit">E</button>
                        </a>
                        <form action="{{route('post.destroy', $post->id)}}" method="post" onsubmit="return confirm('Czy na pewno usunąć ten post? ')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-1" type="submit">X</button>
                        </form>
                    </td>    
                    @endauth

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">Nie ma żadnych postów</td>
            </tr>
        @endif
    @else
        <tr>
            <td colspan="4">Nie ma żadnych postów</td>
        </tr>
    @endisset
</tbody>
</table>
@endsection
