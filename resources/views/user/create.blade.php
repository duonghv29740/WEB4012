{{-- Neu edit thi se co bien $Users truyen vao --}}
@extends('layout.master')

@section('title', 'Users page')

@section('content-title', isset($user) ? 'Users Edit' : 'Users Create')

@section('content')
    <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" class="form"
        method="POST">
        {{-- Bat buoc trong form se phai co token bang @csrf --}}
        @csrf
        @if (isset($user))
            @method('PUT')
        @endif
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $e)
                    <li class="text-danger">{{ $e }}</li>
                @endforeach
            </ul>
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" class="form-control" id="name" value="{{ isset($user) ? $user->name : '' }}" />
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input name="email" class="form-control" id="name" value="{{ isset($user) ? $user->email : '' }}" />
        </div>
        <div class="form-group">
            <label for="name">Password</label>
            <input name="password" class="form-control" id="name" value="{{ isset($user) ? $user->password : '' }}" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Sumit</button>
            <a href="{{ route('users.index') }}" class="btn btn-warning">
                Cancel
            </a>
        </div>
    </form>

@endsection
