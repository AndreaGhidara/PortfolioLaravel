@extends('layouts.admin')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="post" action="{{ route("admin.projects.update", $project->id) }}" class="needs-validation">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    {{-- Etichetta e Input --}}
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ old("title") ?? $project->title }}">
                    {{-- Errors --}}
                    @error('title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    {{-- Etichetta e Input --}}
                    <label for="description">Description</label>
                    <div class="form-floating">
                        <textarea name="description" class="form-control" id="description">{{old("description") ?? $project->description}}</textarea>
                        <label for="description">Description</label>
                    </div>
                    {{-- Errors --}}
                    @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    {{-- Etichetta e Input --}}
                    <label for="imgPath" class="form-label">ImgPath</label>
                    <input name="imgPath" type="text" class="form-control" id="imgPath" value="{{old("imgPath") ?? $project->imgPath}}">
                    {{-- Errors --}}
                    @error('imgPath')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    {{-- Etichetta e Input --}}
                    <label for="artist" class="form-label">Artist</label>
                    <input name="artist" type="text" class="form-control" id="artist" value="{{old("artist") ?? $project->artist}}">
                    {{-- Errors --}}
                    @error('artist')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection