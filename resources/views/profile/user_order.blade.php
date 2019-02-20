@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Просмотр заказа</h1>
    <ul>
        <li>Наименование товара - {{$order->sparePart->name}}</li>
        <li>Производитель товара - {{$order->sparePart->maker}}</li>
        <li>Минимальная цена - {{$order->min_price}}</li>
        <li>Максимальная цена - {{$order->max_price}}</li>
    </ul>
    <h2>Список ответов</h2>
    @if($order->responses->count())
    <ul>
        @foreach($order->responses as $response)
            <li>
            {{$response->user->name}} 
            Цена - {{$response->user->sparePartsInShop()->where('spare_part_id', $order->spare_part_id)->first()->price}}
            </li>
        @endforeach
    </ul>
    @else
        Ответов нет
    @endif
</div>
@endsection
