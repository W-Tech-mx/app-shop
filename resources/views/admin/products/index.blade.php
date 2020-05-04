@extends('layouts.app')
@section('title','Listado-Productos APP-SHOP')
@section('body-class','landing-page')

@section('content')
        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="container">
                <div class="section text-center">
                    <h2 class="title">Listado de Productos</h2>
                    <div class="team">
                        <div class="row">
                                <a href="{{ url('/admin/products/create') }}" class="btn btn-success btn-round">New Product</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="col-md-2 text-center">Nombre</th>
                                        <th class="col-md-4 text-center">Description </th>
                                        <th class="text-center">Categoria</th>
                                        <th class="text-cente">Precio</th>
                                        <th class="text-cente">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td class="col-md-2 text-center">{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td class="col-md-4">{{ $product->description}}</td>
                                        <td>{{ $product->category ? $product->category->name : 'General'  }}</td>
                                        <td class="text-right">&dollar; {{ $product->price}}</td>
                                        <td class="td-actions text-right">
                                            <form method="post" action="{{ url('/admin/products/'.$product->id) }}" >
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}
                                            <a type="button" rel="tooltip" title="View product" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-user"></i>
                                            </a>
                                            <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="IMG PRODUCT" class="btn btn-warning btn-simple btn-xs">
                                                <i class="fa fa-image"></i>
                                            </a>
                                            <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Edit product" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                                <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    <tr>
                                         @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            {{-- paginacion de tabla --}}
                            {{$products->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('includes.footer')
@endsection
