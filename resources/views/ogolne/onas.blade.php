@extends('layout.szablon')
@section('tytul')
    O nas
@endsection
@section('podtytul')
Strona o nas
@endsection
@section('tresc')
    <div>
        Treść strony o nas Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed tempora iusto, eaque laborum recusandae aliquid ipsam numquam totam explicabo. Illo dolore natus aut dolor ab perspiciatis voluptatum. Corrupti, expedita rem. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt alias ipsa nisi quaerat ut facere accusamus aperiam quas, labore veritatis eius omnis quos sint praesentium quasi optio eum similique harum!
    </div>
    @isset($zadania)
    <ol>
        @foreach ($zadania as $zadanie)
            <li>
               {{ $zadanie }} 
            </li>
        @endforeach
    </ol>        
    @endisset

@endsection