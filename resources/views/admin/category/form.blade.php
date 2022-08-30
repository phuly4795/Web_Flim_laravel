@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Quản lí danh mục') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($category))
                        {!! Form::open(['route' => 'category.store','method' => 'POST']) !!}
                    @else
                        {!! Form::open(['route' => ['category.update', $category->id],'method' => 'PUT']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($category) ? $category->title : '',
                            ['class'=> 'form-control','placeholder' => 'Nhập vào dữ liệu', 'id' => 'slug', 'onkeyup'=> 'ChangeToSlug()']) !!}
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($category) ? $category->slug : '',['class'=> 'form-control','placeholder' => 'Nhập vào dữ liệu', 'id' => 'convert_slug']) !!}
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description',   isset($category) ? $category->description : '', ['class'=> 'form-control',
                                            'placeholder' => 'Nhập vào dữ liệu', 'id' => 'description', 'style'=>'resize:none' ]) !!}
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('active', 'Active', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Ẩn'] ,isset($category) ? $category->status : '' , ['class'=>'form-control']) !!}
                        </div><br>            

                        @if(!isset($category))
                            {!! Form::submit('Xác nhận', ['class'=>'btn btn-primary']) !!}                              
                        @else
                            {!! Form::submit('Cập nhật', ['class'=>'btn btn-primary']) !!}      
                        @endif
                        <a href="{{route('category.index')}}" class="btn btn-primary">Danh sách danh mục</a>
                    {!! Form::close() !!}

                </div>
            </div><br>
            
        </div>
    </div>
</div>
@endsection
