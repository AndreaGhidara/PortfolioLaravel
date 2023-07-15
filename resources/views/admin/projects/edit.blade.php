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

                    <form method="post" action="{{ route('admin.projects.update', $project->id) }}" class="needs-validation">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            {{-- Etichetta e Input --}}
                            <label for="title" class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" id="title"
                                value="{{ old('title') ?? $project->title }}">
                            {{-- Errors --}}
                            @error('title')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {{-- Etichetta e Input --}}
                            <label for="description">Description</label>
                            <div class="form-floating">
                                <textarea name="description" class="form-control" id="description">{{ old('description') ?? $project->description }}</textarea>
                                <label for="description">Description</label>
                            </div>
                            {{-- Errors --}}
                            @error('description')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {{-- Etichetta e Input --}}
                            <label for="language_id">Language</label>
                            <select name="language_id" id="languagle_id" class="form-select"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                @foreach ($languages as $language)
                                    <option value="{{ old('language-id') ?? $language->id }}">
                                        {{ old('language') ?? $language->name }}</option>
                                @endforeach
                            </select>
                            {{-- Errors --}}
                            @error('language')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            @foreach ($technologies as $i => $technology)
                                <div class="form-check">
                                    <label class="form-check-label" for="technology{{ $i }}">{{ $technology->name }}</label>
                                    <input class="form-check-input" type="checkbox" name="technologies[]"value="{{ $technology->id }}" id="technology{{ $i }}"
                                        @if (old('technologies') && in_array($stack->id, old('technologies'))) {{ 'checked' }}
                        
                            @elseif (!old('stacks') && $project->technologies->contains($technology))
                            {{ 'checked' }} @endif>
                                </div>
                            @endforeach

                        </div>

                        <div class="mb-3">
                            {{-- Etichetta e Input --}}
                            <label for="imgPath" class="form-label">ImgPath</label>
                            <input name="imgPath" type="text" class="form-control" id="imgPath"
                                value="{{ old('imgPath') ?? $project->imgPath }}">
                            {{-- Errors --}}
                            @error('imgPath')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {{-- Etichetta e Input --}}
                            <label for="artist" class="form-label">Artist</label>
                            <input name="artist" type="text" class="form-control" id="artist"
                                value="{{ old('artist') ?? $project->artist }}">
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
