@extends('layouts.app')

@section('content')
<h1>Fruits database</h1>

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
                <td><img src="{{$fruit->img}}" alt=""></td>
                <td>{{$fruit->name}}</td>
                <td>{{$fruit->slug}}</td>
                <td>{{$fruit->weight}}</td>
                <td>{{$fruit->price}}</td>
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