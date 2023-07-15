@extends('layouts.admin')

@section('content')
    <div>
        <div class="container">
            <div class="row">
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
                                <p class="mb-2">• {{ $project->artist }}</p>
                                <p class="card-text">
                                    {{ $project->description }}
                                </p>
                                <hr class="my-4" />
                                <div>
                                    {{$project->language->name ?? "no language"}}
                                </div>
                                <hr class="my-4" />
                                <div>
                                    @if (count($project->technologies) > 0)
                                        @foreach ($project->technologies as $technology)
                                            <p>{{$technology->name ?? "no technology"}}</p>
                                        @endforeach
                                    @else
                                        <p>no tech</p>
                                    @endif
                                </div>
                                <hr class="my-4" />
                                <div class="d-flex justify-content-between">
                                    <form method="post" action="{{route("admin.projects.destroy", $project->id)}}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            cancella
                                        </button>
                                    </form>
                                    <div>
                                        <a href="{{route("admin.projects.edit", $project)}}">
                                            <button class="btn btn-warning">
                                                Edit
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
