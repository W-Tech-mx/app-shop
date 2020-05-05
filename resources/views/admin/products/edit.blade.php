@extends('layouts.app')
@section('title','Editar Product APP-SHOP')
@section('body-class','product-page')

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
                <div class="section text-center section-landing">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title">Editae Producto seleccionado</h2>
                                <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nombre del producto</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                            <label class="control-label">Precio del producto</label>
                                            <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $product->price) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                             <div class="form-group label-floating">
                                                <label class="control-label">Descripción corta</label>
                                                <input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Categoría del producto</label>
                                                <select class="form-control" name="category_id">
                                                    <option value="0">General</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if($category->id == old('category_id', $product->category_id)) selected @endif>
                                                        {{ $category->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_description">{{ old('long_description', $product->long_description) }}</textarea>

                                    <button class="btn btn-primary">Guardar cambios</button>
                                    <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
                                </form>
                        </div>
                    </div>

                    <div class="features">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">chat</i>
                                    </div>
                                    <h4 class="info-title">First Feature</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <h4 class="info-title">Second Feature</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">fingerprint</i>
                                    </div>
                                    <h4 class="info-title">Third Feature</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

@include('includes.footer')
@endsection
