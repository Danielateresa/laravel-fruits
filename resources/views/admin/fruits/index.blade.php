@extends('layouts.admin')

@section('content')
<h1>Fruits database</h1>
<div class="d-flex justify-content-end">
    <a class="btn btn-primary my-3" href="{{route('admin.fruits.create')}}"><i class="fa-solid fa-plus"></i> add new</a>
</div>

@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    <strong>{{session('message')}}</strong>
</div>
@endif

<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
        <thead class="table-light">
            <tr>
                <th>id</th>
                <th>img</th>
                <th>name</th>
                <th>slug</th>
                <th>weight</th>
                <th>price</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($fruits as $fruit)
            <tr class="table-primary">
                <td scope="row">{{$fruit->id}}</td>
                <td><img class="img-fluid" src="{{asset('storage/' . $fruit->img)}}" alt=""></td>
                <td>{{$fruit->name}}</td>
                <td>{{$fruit->slug}}</td>
                <td>{{$fruit->weight}}</td>
                <td>{{$fruit->price}} €</td>
                <td><a class="btn btn-primary" href="{{route('admin.fruits.show', $fruit->slug)}}"><i
                            class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-warning" href="{{route('admin.fruits.edit', $fruit->slug)}}"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                    <form class="d-inline" action="{{route('admin.fruits.destroy', $fruit->slug)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-eraser"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <h3>No fruits on database yet</h3>
            @endforelse
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>

@endsection