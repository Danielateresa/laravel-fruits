@extends('layouts.admin')

@section('content')
<h1>Add new fruit on database</h1>
<div class="">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('admin.fruits.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror"
                placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Your image must be max 255kb</small>
        </div>
        @error('image')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Required field</small>
        </div>
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="number" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                placeholder="" aria-describedby="helpId" step="0.01">
            <small id="helpId" class="text-muted">This field autocompletes itself</small>
        </div>
        @error('slug')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="weight" class="form-label">Weight</label>
            <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror"
                placeholder="" aria-describedby="helpId" step="0.01">
            <small id="helpId" class="text-muted">Insert fruit weight</small>
        </div>
        @error('weight')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                placeholder="" aria-describedby="helpId" step="0.01">
            <small id="helpId" class="text-muted">Insert fruit price</small>
        </div>
        @error('price')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <button class="btn btn-primary my-3" type="submit"><i class="fa-solid fa-plus"></i> add fruit</button>

    </form>

</div>

@endsection