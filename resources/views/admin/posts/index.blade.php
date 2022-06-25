@extends('admin.layout')

@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">Admin</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><i class="fas fa-tachometer-alt text-sm"><a href="{{route('admin.home')}}"> Admin</a></i></li>
            <li class="breadcrumb-item active"><i class="fas fa-list text-sm"></i> Listado de posts</li>
        </ol>
    </div><!-- /.col -->

@endsection

@section('content')    
<div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <a href="{{route('admin.posts.create')}}" class="btn btn-success">Crear post</a>
      </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="posts-table" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Excerpt</th>
          <th>Category</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
        <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->excerpt}}</td>
                <td>{{$post->category->name}}</td>
                <td>
                   <div class="d-flex">
                        <a href="{{route('admin.posts.edit',$post)}}" class="btn btn-warning">Edit</a>
                        <form action="" method="post" class="ml-2">
                            @csrf
                            <button class="btn btn-danger">Del</button>
                        </form>
                   </div>
                </td>
            </tr>      
        @endforeach 
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection

@push('js')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script>
        $(function () {        
          $('#posts-table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
@endpush