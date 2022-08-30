@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h3 style="text-align: center; margin-bottom:2%">DANH SÁCH DANH MỤC</h3>
            
            <table class="table table-success table-striped">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody class="order_position">
                @foreach ($list as $key => $cate)

                  <tr id="{{$cate->id}}">
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$cate->title}}</td>
                    <td>{{$cate->slug}}</td>
                    <td>{{$cate->description}}</td>
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
                            'route' => ['category.destroy', $cate->id],
                            'onsubmit' => 'return confirm("Bạn muốn xóa?")'
                        ]) !!}
                        {!! Form::submit('Xóa', ['class'=> 'btn btn-danger']) !!}
                        <a href="{{route('category.edit', $cate->id)}}" class="btn btn-warning">Sửa</a>
                        {!! Form::close() !!}
                      
                    </td>
                  </tr>  
                  @endforeach     
                </tbody>
              </table>
              <a href="{{route('category.create')}}" class="btn btn-primary">Thêm danh mục</a>
        </div>
    </div>
</div>
@endsection
