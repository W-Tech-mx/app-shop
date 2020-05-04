@extends('layouts.app')
@section('title','images de Productos APP-SHOP')
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
                    <h2 class="title">Imagenes de Productos "{{ $product->name}}" </h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="photo">
                          <label class="custom-file-label" for="customFileLang"></label>
                        </div>
                        <button type="submit" class="btn btn-success btn-round">Subir img</button>
                        <a href="{{ url('/admin/products') }}" class="btn btn-primary btn-round">Volver</a>
                    </form>
                  {{--   <a href="{{ url('/admin/products/create') }}" class="btn btn-success btn-round">Add new img</a> --}}
                        <div class="row">
                             @foreach($images as $image)
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                  <div class="panel-body ">
                                  <img class="fluid" src="{{ $image->url }}" alt="" width="250">
                                  <form  method="post" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                                     <button type="submit" class="btn btn-danger btn-round">Delete</button>
                                     @if($image->featured)
                                      <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="img destacada">
                                        <i class="material-icons">favorite</i>
                                      </button>
                                     @else
                                      <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                        <i class="material-icons">favorite</i>
                                      </a>
                                    @endif
                                  </form>
                                  </div>
                                </div>
                            </div>
                             @endforeach
                        </div>

                </div>
            </div>
        </div>

@include('includes.footer')
@endsection
