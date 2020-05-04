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
                            {{ csrf_field()}}
                            <div class="col-sm-4 p-3">
                                <div class="form-group">
                                    <input type="text" name="name"  placeholder="Nombre Producto" value="{{ $product->name }}" class="form-control" />
                                </div>
                            </div>

                            <div class="col-sm-4 p-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Descripcion corta</label>
                                    <input  class="form-control" type="text" name="description" value="{{ $product->description }}">
                                </div>
                            </div>

                            <div class="col-sm-4 p-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Precio</label>
                                    <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="form-control">
                                </div>
                            </div><br><br>
                            <div class="col-auto p-5">
                                <textarea class="form-control" placeholder="descripcion del producto"  name="long_description">{{ $product->long_description }}</textarea>
                            <button class="btn btn-warning">Guardar Cambio Producto</button>
                             <a href="{{ url('admin/products') }}" class="btn btn-primary">Cancelar</a>
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
