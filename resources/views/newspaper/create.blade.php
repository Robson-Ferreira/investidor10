@extends('layouts.app')

@section('content')
    <div class="content">
        <h2>Nova notícia</h2>
        <form action="{{ route('newspaper.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Título *</label>
                <input type="text" placeholder="Digite um título" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" maxlength="255" required>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Descrição *</label>
                <textarea id="description" placeholder="Digite uma descrição..." name="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Categoria *</label>
                <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                    <option value="">Selecione uma categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-success ml-2" id="openModalButton">+</button>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    <div id="categoryModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" id="closeModalButton">&times;</span>
                <h2>Cadastrar Nova Categoria</h2>
            </div>
            <div class="modal-body">
                <form id="categoryForm">
                    <div class="form-group">
                        <label for="categoryName">Nome da Categoria *</label>
                        <input type="text" id="categoryName" class="form-control" maxlength="255" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-error" id="cancelButton">Cancelar</button>
                <button type="button" class="btn btn-success" id="saveCategoryButton">Salvar</button>
            </div>
        </div>
    </div>
@endsection
