@extends('admin.layout')

@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">Editar post</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><i class="fas fa-tachometer-alt text-sm"><a href="{{route('admin.home')}}"> Admin</a></i></li>
            <li class="breadcrumb-item"><i class="fas fa-list text-sm"></i><a href="{{route('admin.posts.index')}}"> Listado de posts</a></li>
            <li class="breadcrumb-item active"><i class="fas fa-pencil-alt text-sm"></i> Editar post</li>
        </ol>
    </div><!-- /.col -->
@endsection

@push('css')
    {{-- tempusdominus --}}
    <link rel="stylesheet" href="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    {{-- select 2 --}}
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">

     {{-- dropzone --}}

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush

@section('content')    
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with minimal features & hover style</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {!! Form::model($post,['route' => ['admin.posts.update',$post],'method' => 'put']) !!}            
        
            @include('admin.posts.partials.form')    
                                        
        {!! Form::close() !!}  
        
        @if ($post->images)
                    <div class="form-group">
                        <ul class="imgs-post-list">
                            @foreach ($post->images as $image)
                                <form action="{{route('admin.posts.files.destroy',$image)}}" method="post" enctype="multipart/form-data">
                                    {{method_field('DELETE')}} {{csrf_field()}}
                                    <div>
                                        <button style="position: absolute"><i class="fas fa-trash text-danger"></i></button>
                                        <img class="img-post-list img-responsive" src="{{Storage::url($image->url)}}">
                                    </div>
                                </form>
                            @endforeach
                        </ul>
                    </div>                   
        @endif
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

{{-- dropzone --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(function(){
    //Initialize Select2 Elements
        $('.select2').select2({
            tags:true
        })

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

    /* dropzone */

    /* '/admin/posts/{{$post->id}}/files' */

   new Dropzone('.dropzone',{
       url:'/admin/posts/{{$post->slug}}/files',
       headers:{
           'X-CSRF-TOKEN':'{{csrf_token()}}'
       }
   });

   Dropzone.autoDiscover = false

</script>

@endpush
 
