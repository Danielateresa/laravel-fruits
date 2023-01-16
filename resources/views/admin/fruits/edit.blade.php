@extends('layouts.admin')

@section('content')
<h1>Edit fruit {{$fruit->name}}</h1>
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
    <form action="{{route('admin.fruits.update', $fruit->slug)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3 d-flex align-items-end gap-3">
            <div>
                <label for="img" class="form-label d-block">Edit image</label>
                <img class="edit_form_img" src="{{asset('storage/' . $fruit->img)}}" alt="">
            </div>

            <div>
                <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror"
                    placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Edit image, must be max 250kb</small>
            </div>
        </div>
        @error('image')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="" aria-describedby="helpId" value="{{ old('name', $fruit->name) }}">
            <small id="helpId" class="text-muted">Required field</small>
        </div>
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                placeholder="" aria-describedby="helpId" value="{{ old('slug', $fruit->slug) }}">
            <small id="helpId" class="text-muted">This field autocompletes itself</small>
        </div>
        @error('slug')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="category_id" class="form-label">Categories</label>
            <select class="form-select form-select-lg @error('category_id') is-invalid @enderror" name="category_id"
                id="category_id">
                <option value="">Select Type</option>
                @forelse($categories as $category)
                <option value="{{$category->id}}"
                    {{ $category->id == old('category_id',  $fruit->category ? $fruit->category->id : '') ? 'selected' : '' }}>
                    {{$category->name}}
                </option>
                @empty
                <option value="">no category found</option>
                @endforelse
            </select>
        </div>
        @error('category_id')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="weight" class="form-label">Weight</label>
            <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror"
                placeholder="" aria-describedby="helpId" step="0.01" value="{{ old('weight', $fruit->weight) }}">
            <small id="helpId" class="text-muted">Insert fruit weight</small>
        </div>
        @error('weight')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                placeholder="" aria-describedby="helpId" step="0.01" value="{{ old('price', $fruit->price) }}">
            <small id="helpId" class="text-muted">Insert fruit price</small>
        </div>
        @error('price')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <button class="btn btn-primary my-3" type="submit"><i class="fa-solid fa-pencil"></i> Edit fruit</button>

    </form>

</div>

@endsection