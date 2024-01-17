@extends('layouts.app')

@section('title', $project['title'])

@section('content')
    <section class="container-fluid mt-5">
        <div class="row">
            @include('admin.partials.sidebar')
            <div class="col-10 d-flex ">
                <div class="me-5">
                    <h1>Project List</h1>
                    <p class="text-uppercase">titolo progetto : {{ $project->title }}</p>
                    <p>Descrizione progetto: {{ $project->description }}</p>
                    <a href="{{ $project->link }}">link progetto su github</a>

                  <span class="text-uppercase">categoria di linguaggio usato: {{$project->category->name}}</span>
                </div>

                <div class="img-card">
                    <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}" class="h-70">
                </div>

            </div>
        </div>
    </section>
@endsection
