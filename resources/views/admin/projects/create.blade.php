@extends('layouts.admin')

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('admin.projects.store') }}">
                    @csrf 
                    {{-- @method('PATCH') --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <div class="form-floating">
                            <textarea name="description" class="form-control" id="description"></textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="imgPath" class="form-label">ImgPath</label>
                        <input name="imgPath" type="text" class="form-control" id="imgPath">
                    </div>
                    <div class="mb-3">
                        <label for="artist" class="form-label">Artist</label>
                        <input name="artist" type="text" class="form-control" id="artist">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection