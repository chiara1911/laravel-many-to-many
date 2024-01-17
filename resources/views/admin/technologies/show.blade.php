@extends('layouts.app')

@section('title', $category['name'])

@section('content')
    <section class="container-fluid mt-5">
        <div class="row">
            @include('admin.partials.sidebar')
            <div class="col-10 d-flex flex-column  ">
                <h2>Progetti in: {{ $technology->name }}</h2>
                <ul>
                    @foreach ($technology->projects as $project)
                        <li><a href="{{ route('admin.projects.show', $project->slug) }}">{{ $project->title }}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>
    </section>
@endsection
