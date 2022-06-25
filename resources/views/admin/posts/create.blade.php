@extends('admin.layout')

@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">Crear nuevo post</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><i class="fas fa-tachometer-alt text-sm"><a href="{{route('admin.home')}}"> Admin</a></i></li>
            <li class="breadcrumb-item"><i class="fas fa-list text-sm"></i><a href="{{route('admin.posts.index')}}"> Listado de posts</a></li>
            <li class="breadcrumb-item active"><i class="fas fa-pencil-alt text-sm"></i> Crear post</li>
        </ol>
    </div><!-- /.col -->
@endsection

@push('css')
    {{-- tempusdominus --}}
    <link rel="stylesheet" href="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    {{-- select 2 --}}
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">  
    
@endpush

@section('content')    
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with minimal features & hover style</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf 
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" name="title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{old('title')}}" autocomplete="off">

                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="excerpt">Extracto</label>
                        <input type="text" name="excerpt" class="form-control {{$errors->has('excerpt') ? 'is-invalid' : ''}}" value="{{old('excerpt')}}" autocomplete="off">

                        @error('excerpt')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div> 
                    
                    <div class="form-group">
                        <label>Etiquetas</label>
                        <select class="select2 {{$errors->has('tags') ? 'is-invalid' : ''}}" name="tags[]" multiple="multiple" data-placeholder="Selecciona una o más etiquetas" style="width: 100%;"
                            >
                            @foreach ($tags as $tag)                                
                                <option {{collect(old('tags'))->contains($tag->id) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->name}}</option>                         
                            @endforeach
                        </select>

                        @error('tags')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                          
                    <div class="form-group">
                        <label for="body">Descripción</label>
                        <textarea name="body" class="w-100 form-control" rows="4" id="body"></textarea>
                        @error('body')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>       
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Guardar post</button>
                    </div>
                </div>    
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="published_at">Fecha de publicaión</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="published_at" class="form-control datetimepicker-input {{$errors->has('published_at') ? 'is-invalid' : ''}}" data-target="#reservationdate" value="{{old('published_at')}}" autocomplete="off"/>                    
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>                             
                            </div>
                            @error('published_at')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>      
                      
                    <div class="form-group">
                        <label for="category_id">Categoría</label>
                        <select name="category_id" id="category_id" class="form-control 
                        {{$errors->has('category_id')}}">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" 
                                {{old('category_id') == $category->id ? 'selected ' : ''}}>
                                {{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>                                                      
                </div>
            </div>
        </form>                         
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection

@push('js')
    
<!-- InputMask -->
<script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

{{-- select 2 --}}
<script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>

{{-- ckeditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
    $(function(){
        //Initialize Select2 Elements
        $('.select2').select2()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    })

    /* ckeditor */

    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );        
    
</script>

@endpush
 
