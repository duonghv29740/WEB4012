@extends('layout.master')

@section('title', 'Users page')

@section('content-title', 'Users page')

@section('content')
    <div>
        <a href="{{ route('users.create') }}">
            <button class="btn btn-primary">Create</button>
        </a>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>

                    <td>{{ $u->status == 1 ? 'Active' : 'Deactie' }}</td>
                    <td>{{ $u->created_at ?: 'N/A' }}</td>
                    <td>{{ $u->updated_at ?: 'N/A' }}</td>
                    <td>
                        <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.delete', $u->id) }}" method="POST">
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
@endsection
