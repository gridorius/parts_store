@extends('layouts.app')

@section('head')
<script src="{{ asset('js/search.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Создать запрос') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user-order') }}">
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
                            <label for="min_price" class="col-md-4 col-form-label text-md-right">{{ __('Цена от') }}</label>

                            <div class="col-md-6">                      
                                <input id="min_price" type="text" name='min_price'>

                                @if ($errors->has('min_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('min_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="max_price" class="col-md-4 col-form-label text-md-right">{{ __('Цена до') }}</label>

                            <div class="col-md-6">                      
                                <input id="max_price" type="text" name='max_price'>

                                @if ($errors->has('max_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('max_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Создать запрос') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
