@extends('layouts.app')

@section('content')
<div class="container">
 @if(Auth::user()->isShop)
    <h1>Панель управления магазином</h1>
    <h2>Список товаров</h2>
    <ul>
        @foreach(Auth::user()->sparePartsInShop as $sparePartInShop)
            <li>
                <form id='' action="{{route('spare-part-in-shop-delete', ['spare_part_in_shop' => $sparePartInShop])}}" method='post'>
                    @csrf
                    {{method_field('DELETE')}}
                    {{$sparePartInShop->sparePart->name}} {{$sparePartInShop->sparePart->maker}} {{$sparePartInShop->price}}
                    <button class='btn btn-link'>Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a class='btn btn-success' href="{{route('spare-part-in-shop-form')}}">Добавить новый товар</a>
    <h2>Список подходящих запросов</h2>
 @else
    <h1>Профиль</h1>
    <h2>Мои запросы</h2>
    <a class='btn btn-success' href="{{route('spare-part-in-shop-form')}}">Добавить запрос</a>
 @endif
</div>
@endsection
