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

                    <form method="POST" action="{{ route('admin.projects.store') }}" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PATCH') x edit --}}

                        <div class="mb-3">
                            {{-- Titolo --}}
                            <label for="title" class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" id="title"
                                value="{{ old('title') }}">
                            {{-- Titolo-Errors --}}
                            @error('title')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {{-- Descrizione --}}
                            <label for="description">Description</label>
                            <div class="form-floating">
                                <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                                <label for="description">Description</label>
                            </div>
                            {{-- Descrizione-Errors --}}
                            @error('description')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            @foreach ($technologies as $i => $technology)
                                {{-- Technology --}}
                                <div class="form-check">
                                    <input @checked(in_array($technology->id, old('technology') ?? [])) class="form-check-input" name="technologies[]" type="checkbox"
                                        value="{{ $technology->id }}" id="technologies{{ $i }}">
                                    <label class="form-check-label" for="technologies{{ $i }}">
                                        {{ $technology->name }}
                                    </label>
                                        @dump(old('technology'))
                                    </div>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            {{-- Language --}}
                            <label for="language_id">Language</label>
                            <select class="form-select" name="language_id" id="language_id"
                                aria-label="Default select example">
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                            {{-- Errors --}}
                            @error('language')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror 
                        </div>

                        <div class="mb-3">
                            {{-- ImgPath --}}
                            <label for="imgPath" class="form-label">ImgPath</label>
                            <input name="imgPath" type="file" class="form-control" id="imgPath">
                            {{-- Errors --}}
                            @error('imgPath')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                        </div>

                        <div class="mb-3">
                            {{-- Artist --}}
                            <label for="artist" class="form-label">Artist</label>
                            <input name="artist" type="text" class="form-control" id="artist"
                                value="{{ old('artist') }}">
                            {{-- Artist-Errors --}}
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
