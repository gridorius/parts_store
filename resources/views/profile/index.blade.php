@extends('layouts.app')

@section('content')
<div class="container">
 @if(Auth::user()->isShop)
 <h1>Панель управления магазином</h1>
    <div class="row">
    <div class="col-md-6">
    <h2>Список товаров</h2>
    <a class='btn btn-success' href="{{route('spare-part-in-shop-form')}}">Добавить новый товар</a>
    <ul class='pt-3'>
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
    </div>
    <div class="col-6">
    <h2>Список подходящих заказов</h2>
    <ul >
    @foreach(DB::table('user_orders')
        ->select('user_orders.id', 'spare_parts.name as spare_part', 'spare_parts.maker', 't2.price')
        ->join('spare_part_in_shops as t2', 'user_orders.spare_part_id', 't2.spare_part_id')
        ->join('spare_parts', 'spare_parts.id', 'user_orders.spare_part_id')
        ->whereRaw('t2.price >= user_orders.min_price')
        ->whereRaw('t2.price <= user_orders.max_price')
        ->get() as $order)
    <li>
    <form action="{{route('response-to-order')}}" method='post'>
        @csrf
        {{$order->spare_part}} {{$order->maker}}
        <input type="hidden" name='user_order_id' value='{{$order->id}}'>
        <button class='btn btn-link'>Ответить</button>
    </form>
    </li>
    @endforeach
    </ul>
    </div>
</div>
 @else
 <h1>профиль</h1>
    <h2>Мои заказы</h2>
    <a class='btn btn-success' href="{{route('user-order-form')}}">Добавить заказ</a>
    <ul>
        @foreach(Auth::user()->orders as $order)
            <li class='mt-3'>
                <form action="{{route('user-order-delete', ['user_order' => $order])}}" method='post'>
                @csrf
                {{method_field('DELETE')}}
                    <a href="{{route('user-order-show', ['user_order' => $order])}}"><div>{{$order->sparePart->name}} {{$order->sparePart->maker}}</a> <br> Ответов - {{$order->responses->count()}}</div>
                    <button class='btn py-0 btn-danger'>Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
 @endif
</div>
@endsection
