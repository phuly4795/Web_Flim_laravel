@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 style="text-align: center; margin-bottom:2%">DANH SÁCH PHIM</h3>
            <table class="table table-success table-striped" id="myTable11">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Slug</th>
                    {{-- <th scope="col">Description</th> --}}
                    <th scope="col">category</th>
                    <th scope="col">HOT</th>
                   
                    <th scope="col">country</th>
                    <th scope="col">genre</th>
                    <th scope="col">Status</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($list as $key => $cate)

                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$cate->title}}</td>
                    <td><img src="{{asset('uploads/movie/'.$cate->image)}}" alt="{{$cate->image}}" width="100px"></td>
                    <td>{{$cate->slug}}</td>
                    {{-- <td>{{$cate->description}}</td> --}}


                    <td>{{$cate->category->title}}</td>
                    <td>
                        @if($cate->phim_hot == 0)
                            Phim thường
                        @else
                            Phim HOT
                        @endif
                        
                    </td>
                    <td>{{$cate->genre->title}}</td>
                    <td>{{$cate->country->title}}</td>
                  
                    <td>
                        @if($cate->status)
                            Hiển thị
                        @else
                            Ẩn
                        @endif

                    </td>
                    <td>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['movie.destroy', $cate->id],
                            'onsubmit' => 'return confirm("Bạn muốn xóa?")'
                        ]) !!}
                        {!! Form::submit('Xóa', ['class'=> 'btn btn-danger']) !!}
                        <a href="{{route('movie.edit', $cate->id)}}" class="btn btn-warning">Sửa</a>
                        {!! Form::close() !!}
                      
                    </td>
                  </tr>  
                  @endforeach     
                </tbody>
            </table>
            <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm Phim</a>
                
        </div>
    </div>
</div>
@endsection
