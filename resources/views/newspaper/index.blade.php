@extends('layouts.app')

@section('content')
    @foreach($newspapers as $newspaper)
        <div class="conteudo">
            <div class="title">
                <h2>{{ $newspaper->title }}</h2>
            </div>
            <div class="description">
                {{ $newspaper['description'] }}
            </div>
            <div class="action">
                <button class="action-button">Acessar</button>
            </div>
        </div>
    @endforeach
@endsection
