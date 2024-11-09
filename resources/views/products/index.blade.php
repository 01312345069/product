@extends('layout')

@section('content')
    <h1>Product Management</h1>

    <a href="{{ route('products.create') }}">Add Product</a>

    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" name="search" placeholder="Search by ID or description">
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th><a href="?sort=name">Name</a></th>
            <th><a href="?sort=price">Price</a></th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">View</a>
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $products->links() }}
@endsection
