@extends('layouts.app')
@section('content')
    <section class="container-fluid mt-5">
        <h1 class="text-center">Lista dei Progetti</h1>
        <div class="row">
            @include('admin.partials.sidebar')
            <!-- navbar blu -->
            <div class="col-10">
                <!--section categories  -->
                <div class="card p-3">
                    <h3 class="text-uppercase">
                       scegli la categoria
                    </h3>
                    <ul class="m-3">
                        @foreach ($technologies as $technology)
                        <li><a href="{{ route('admin.technologies.show', $technology->slug) }}" class="text-decoration-none">
                            <p class="text-uppercase text-black ">
                                {{ $technology->name }}</p>
                        </a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
    </section>
    @include('admin.partials.modal_delete')
@endsection
