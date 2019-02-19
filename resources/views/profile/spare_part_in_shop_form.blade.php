@extends('layouts.app')

@section('head')
<script src="{{ asset('js/search.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Добавить запчасть в магазин') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('spare-part-in-shop') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="filter" class="col-md-4 col-form-label text-md-right">{{ __('Фильтр') }}</label>

                            <div class="col-md-6">
                                <input id="filter" type="text"  autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="spare_part_id" class="col-md-4 col-form-label text-md-right">{{ __('Выберите запчасть') }}</label>

                            <div class="col-md-6">                      
                                <select name="spare_part_id" id="spare_part_id" placeholder='результаты фильтра'>

                                </select>

                                @if ($errors->has('spare_part_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('spare_part_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Укажите цену') }}</label>

                            <div class="col-md-6">                      
                                <input id="price" type="text" name='price'>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Добавить запчасть') }}
                                </button>
                                <a href="{{route('spare-part-form')}}">Создать новую запчасть</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
