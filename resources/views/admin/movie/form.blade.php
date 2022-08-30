@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Quản lí phim') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($movie))
                        {!! Form::open(['route' => 'movie.store','method' => 'POST', 'enctype' =>'multipart/form-data' ]) !!}
                    @else
                        {!! Form::open(['route' => ['movie.update', $movie->id],'method' => 'PUT' , 'enctype' =>'multipart/form-data']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '',
                            ['class'=> 'form-control','placeholder' => 'Nhập vào dữ liệu', 'id' => 'slug', 'onkeyup'=> 'ChangeToSlug()']) !!}
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '',['class'=> 'form-control','placeholder' => 'Nhập vào dữ liệu', 'id' => 'convert_slug']) !!}
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description',   isset($movie) ? $movie->description : '', ['class'=> 'form-control',
                                            'placeholder' => 'Nhập vào dữ liệu', 'id' => 'description', 'style'=>'resize:none' ]) !!}
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('category', 'Category', []) !!}
                            {!! Form::select('category_id', $category ,isset($movie) ? $movie->category_id : '' , ['class'=>'form-control']) !!}
                        </div><br>            
                        <div class="form-group">
                            {!! Form::label('country', 'Country', []) !!}
                            {!! Form::select('country_id',  $country ,isset($movie) ? $movie->country_id : '' , ['class'=>'form-control']) !!}
                        </div><br>            
                        <div class="form-group">
                            {!! Form::label('genre', 'Genre', []) !!}
                            {!! Form::select('genre_id', $genre ,isset($movie) ? $movie->genre_id : '' , ['class'=>'form-control']) !!}
                        </div><br>     
                        <div class="form-group">
                            {!! Form::label('hot', 'HOT', []) !!}
                            {!! Form::select('phim_hot', ['1'=>'Phim HOT', '0'=>'Phim thường'] ,isset($movie) ? $movie->phim_hot : '' , ['class'=>'form-control']) !!}
                        </div><br>     
                        <div class="form-group">
                            {!! Form::label('active', 'Active', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Ẩn'] ,isset($movie) ? $movie->status : '' , ['class'=>'form-control']) !!}
                        </div><br>                           
                        <div class="form-group">
                            {!! Form::label('image', 'Image', []) !!}
                            {!! Form::file('image', ['class'=> 'form-control-file']) !!}
                        </div><br>                        
                        @if(isset($movie))
                            <img src="{{asset('uploads/movie/'.$movie->image)}}" alt="{{$movie->image}}" width="100px">
                        @endif
                        @if(!isset($movie))
                            {!! Form::submit('Xác nhận', ['class'=>'btn btn-primary']) !!}                              
                        @else
                            {!! Form::submit('Cập nhật', ['class'=>'btn btn-primary']) !!}      
                        @endif

                        <a href="{{route('movie.index')}}" class="btn btn-primary">Danh sách phim</a>
                    {!! Form::close() !!}

                </div>
            </div>
          
        </div>
    </div>
</div>
@endsection
