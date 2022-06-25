@extends('admin.layout')

@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Admin</a></li>
        </ol>
    </div><!-- /.col -->
@endsection

@section('content')
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur eveniet molestias eos quibusdam, minus nisi vitae dolor explicabo autem excepturi aliquam perferendis rem officiis. Reiciendis recusandae maxime perspiciatis architecto unde.</p>
@endsection