@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>

                    <div class="card-group m-auto">
                        @foreach ($products as $product)
                            <div class="card m-5" style="width: 18rem;">
                                <img class="card-img-top" src="{{ url('storage/' . $product->image) }}" alt="...">
                                <div class="card-body">
                                    <h1 class="card-title">{{ $product->name }}</h1>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <h3 class="card-text" style="color:red">Rp {{ $product->price }}</h3>
                                    <form action="{{ route('show_product', $product) }}" method="get">
                                        <button type="submit" class="btn btn-outline-info">Show detail</button>
                                    </form>
                                    @if (Auth::check() && Auth::user()->is_admin)
                                        <form action="{{ route('delete_product', $product) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger mt-2">Delete product</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection