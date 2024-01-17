<div class="col-2 bg-primary " id="sidebar">
    <nav class="d-flex flex-column m-3 ">
        <!-- first-top-bar -->

                <h2 class="text-light m-3">Pagine</h2>
                 <p><a href="{{ route('admin.projects.create') }}" class="text-light text-decoration-none m-3">Crea Nuovo Progetto<i class="fa-solid fa-circle-plus m-3"></i></a></p>
                 <p><a href="{{route('admin.projects.index')}}" class=" m-3 text-light">  Pagina principale</a></p>
                 <p><a href="{{route('admin.categories.index')}}" class=" m-3 text-light">  Elementi ordinati per categoria</a></p>

    </nav>
</div>
