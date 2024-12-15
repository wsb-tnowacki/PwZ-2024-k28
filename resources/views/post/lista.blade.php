@extends('layout.szablon')
@section('tytul','Lista postów')
@section('podtytul', 'Lista postów')
@section('tresc')
@auth
<a href="{{route('post.create')}}" class="btn btn-primary m-1"> Dodaj posta</a>
@endauth

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
        @php($lp=1)
        @php($lp=$posty->firstItem())
            @foreach ($posty as $post)
                <tr>
                    <td>{{$lp++}}</td>
                    <td><a href="{{route('post.show',$post->id)}}">{{$post->tytul}}</a></td>
                    <td>{{$post->user->name}}</td>
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
                <td colspan="5" >Nie ma żadnych postów</td>
            </tr>
        @endif
    @else
        <tr>
            <td colspan="5">Nie ma żadnych postów</td>
        </tr>
    @endisset
</tbody>
</table>
@isset($posty)
{{$posty->links()}}    
@endisset
@endsection
