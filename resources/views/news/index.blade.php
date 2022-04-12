@extends('layout.master')

@section('title', 'News page')

@section('content-title', 'News page')

@section('content')
    <div>
        <a href="{{ route('news.create') }}">
            <button class="btn btn-primary">Create</button>
        </a>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Product</th>
            <th>Short description</th>
            <th>Description</th>
        </thead>
        <tbody>
            @foreach ($news as $n)
                <tr>
                    <td>{{ $n->id }}</td>
                    <td>{{ $n->title }}</td>
                    <td>
                        <ul>
                            @foreach ($n->products as $p)
                                <li>{{ $p->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $n->desc ?: 'N/A' }}</td>
                    <td>{{ $n->short_desc ?: 'N/A' }}</td>
                    <td>{{ $n->created_at ?: 'N/A' }}</td>
                    <td>{{ $n->updated_at ?: 'N/A' }}</td>
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
    {{ $news->links() }}
@endsection
