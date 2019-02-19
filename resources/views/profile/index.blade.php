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
    @foreach(DB::table('user_orders')->select('user_orders.id', 'spare_part_in_shops.spare_part_id', 'user_orders.min_price', 'user_orders.max_price')
    ->join('spare_part_in_shops', 'user_orders.spare_part_id', 'spare_part_in_shops.spare_part_id')
    ->where('spare_part_in_shops.price', '>=', 'user_orders.min_price')
    ->where('spare_part_in_shops.price', '<=', 'user_orders.max_price')
    ->get() as $order)
        {{$order}}
    @endforeach
 @else
    <h1>Профиль</h1>
    <h2>Мои запросы</h2>
    <a class='btn btn-success' href="{{route('user-order-form')}}">Добавить запрос</a>
    <ul>
        @foreach(Auth::user()->orders as $order)
            <li class='mt-3'>
                <form action="{{route('user-order-delete', ['user_order' => $order])}}" method='post'>
                @csrf
                {{method_field('DELETE')}}
                    <div>{{$order->sparePart->name}} <br> Цена от: {{$order->min_price}} <br> Цена до: {{$order->max_price}}</div>
                    <button class='btn py-0 btn-danger'>Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
 @endif
</div>
@endsection
