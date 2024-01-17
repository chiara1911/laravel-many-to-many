@extends('layouts.app')

@section('title', 'Create')

@section('content')
    <section class="container-fluid mt-5">
        <div class="row">
            @include('admin.partials.sidebar')
            <div class="col-10">
                <form action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Aggiungi titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror             "
                            id="title" name="title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                   <div class="mb-3">
                        <label for="category_id">Select Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id"
                            id="category_id">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione progetto</label>
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                            name="description">
                        </textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <h6>Select Tags</h6>
                            @foreach ($technologies as $technology)
                            <div class="form-check @error('technologies') is-invalid @enderror">
                                <input type="checkbox" class="form-check-input" name="technologies[]" value="{{$technology->id}}" {{in_array($technology->id,old('technologies',[])) ? 'checked' : ''}}>
                                <label for="technologies[]">{{$technology->name}}</label>
                            </div>

                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3 ">
                        <label for="link" class="form-label">Inserisci l'url del tuo progetto di GIT HUB</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" id="link"
                            name="link">
                        @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <div class="mb-3 ">
                            <label for="image" class="form-label">Inserisci l'immagine del progetto</label>
                            <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Invia</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </section>
@endsection
