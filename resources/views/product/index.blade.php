@extends('layout.master')

@section('title', 'Products page')

@section('content-title', 'Products page')

@section('content')
    <div>
        <a href="{{ route('products.create') }}">
            <button class="btn btn-primary">Create</button>
        </a>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Thumbnail Url</th>
            <th>Category</th>
            <th>Description</th>
            <th>Short description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>
                        <img src="{{ asset($p->thumbnail_url) }}" alt="" width="200">
                    </td>
                    <td>
                        <ul>
                            @foreach ($p->categories as $c)
                                <li>{{ $c->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $p->description ?: 'N/A' }}</td>
                    <td>{{ $p->short_description ?: 'N/A' }}</td>
                    <td>{{ $p->price }}</td>
                    <td>{{ $p->quantity }}</td>
                    <td>{{ $p->status == 1 ? 'Active' : 'Deactive' }}</td>
                    <td>{{ $p->created_at ?: 'N/A' }}</td>
                    <td>{{ $p->updated_at ?: 'N/A' }}</td>
                    <td>
                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.delete', $p->id) }}" method="POST">
                            @method('DELETE')
                            {{-- <input type="text" name="_method" value="DELETE"> --}}
                            @csrf
                            {{-- <input type="text" name="csrf_token" value="asdadasd"> --}}
                            <button type="submit" class="btn btn-danger">
                                Dele
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
