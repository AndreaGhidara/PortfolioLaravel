@extends('layouts.admin')

@section('content')
    <div>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                @foreach ($projects as $project)
                    <div class="col">
                        <section class="mx-auto my-5" style="max-width: 20rem;">
                            <div class="card">
                                <div class="hover-overlay ripple imgContainerCard" data-mdb-ripple-color="light">
                                    <img src="{{ asset("/storage//" . $project->imgPath) }}" class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2">• {{$project->artist}}</p>
                                    <p class="card-text">
                                        {{$project->description}}
                                    </p>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route ('admin.projects.show', $project->id) }}">
                                            <button class="btn btn-primary">
                                                See Project
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
