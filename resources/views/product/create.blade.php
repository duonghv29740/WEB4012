{{-- Neu edit thi se co bien $product truyen vao --}}
@extends('layout.master')

@section('title', 'Product page')

@section('content-title', isset($product) ? 'Product Edit' : 'Product Create')

@section('content')
    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
        enctype="multipart/form-data" class="form" method="POST">
        {{-- Bat buoc trong form se phai co token bang @csrf --}}
        @csrf
        @if (isset($product))
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
            <input name="name" class="form-control" id="name" value="{{ isset($product) ? $product->name : '' }}" />
        </div>
        <div class="form-group">
            <label for="name">Category</label>
            <select name="category_id">
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input name="description" class="form-control" id="description"
                value="{{ isset($product) ? $product->description : '' }}" />
        </div>
        <div class="form-group">
            <label for="short-description">Short Description</label>
            <input name="short_description" class="form-control" id="short-description"
                value="{{ isset($product) ? $product->short_description : '' }}" />
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" class="form-control" id="price" value="{{ isset($product) ? $product->price : '' }}" />
        </div>
        <div class="form-group">
            <label for="thumbnail-url">Thumbnail url</label>
            <input type="file" name="thumbnail_url" class="form-control" id="thumbnail-url"
                value="{{ isset($product) ? $product->thumbnail_url : '' }}" />
            @if (isset($product))
                <img src="{{ asset($product->thumbnail_url) }}" alt="" width="200">
                <input type="hidden" name="thumbnail_url" value="{{ $product->thumbnail_url }}">
            @endif
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input name="quantity" class="form-control" id="quantity"
                value="{{ isset($product) ? $product->quantity : '' }}" />
        </div>
        <div class="form-group">
            <input type="radio" name="status" id="status" value="0"
                {{ isset($product) && $product->status == 0 ? 'checked' : '' }}>
            <label for="status">Deactive</label>
        </div>
        <div class="form-group">
            <input type="radio" name="status" id="status" value="1"
                {{ isset($product) && $product->status == 1 ? 'checked' : '' }}>
            <label for="status">Active</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Sumit</button>
            <a href="{{ route('products.index') }}" class="btn btn-warning">
                Cancel
            </a>
        </div>
    </form>

@endsection
