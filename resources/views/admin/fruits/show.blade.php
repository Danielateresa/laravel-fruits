@extends('layouts.admin')

@section('content')
<h1>Fruits database</h1>

<h3 class="py-4">Fruit {{$fruit->name}} detail</h3>

<div class="card text-left">
    @if($fruit->img)
    <img class="card-img-top" src="{{asset('storage/' . $fruit->img)}}" alt="">
    @endif
    <div class="card-body">
        <h4>Fruit name: </h4>
        <p class="card-title">{{$fruit->name}}</p>
        <h4>Fruit slug: </h4>
        <p>{{$fruit->slug}}</p>
        <h4>Fruit category: </h4>
        <p>{{$fruit->category ? $fruit->category->name : 'No category'}}</p>
        <h4>Fruit weight: </h4>
        <p>{{$fruit->weight}}</p>
        <h4>Fruit price: </h4>
        <p>{{$fruit->price}}</p>
    </div>
</div>

<div class="d-flex justify-content-end">
    <a class="btn btn-primary my-3" href="{{route('admin.fruits.edit', $fruit->slug)}}"><i
            class="fa-solid fa-pencil"></i> edit</a>
</div>

</div>

@endsection