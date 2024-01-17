@extends('layouts.app')

@section('title', $technology['name'])

@section('content')
    <section class="container-fluid mt-5">
        <div class="row">
            @include('admin.partials.sidebar')
            <div class="col-10 d-flex flex-column  ">


                <h2>Progetti in: {{ $technology->name }}</h2>
                <ul>
                    @foreach ($technology->projects as $project)
                        <li><a href="{{ route('admin.technologies.show', $technology->slug) }}">{{ $technology->name }}</a>
                        </li>
                    @endforeach
                </ul>

            </div>

        </div>
    </section>
@endsection
