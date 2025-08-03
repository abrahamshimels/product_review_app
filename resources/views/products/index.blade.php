{{-- home.blade.php --}}
@extends('layouts.app')

@section('content')
    @foreach ($products as $product)
    <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
    @endforeach
@endsection
