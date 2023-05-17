{{-- <!DOCTYPE html>
<html>
   <head>
      <title>Laravel Video Upload Form - ScratchCode.io</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container mt-5">
         <div class="panel panel-primary">
            <div class="panel-heading">
               <h2>Laravel Video Upload Form- ScratchCode.io</h2>
            </div>
            <div class="panel-body">
               @if ($message = Session::get('success'))
                   <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
                   </div>
               @endif
 
               @if (count($errors) > 0)
               <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
 
               <form action="{{ route('store.video') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
 
                     <div class="col-md-12">
                        <div class="col-md-6 form-group">
                           <label>Title:</label>
                           <input type="text" name="title" class="form-control"/>
                        </div>
                        <div class="col-md-6 form-group">
                           <label>Select Video:</label>
                           <input type="file" name="video" class="form-control"/>
                        </div>
                        <div class="col-md-6 form-group">
                           <button type="submit" class="btn btn-success">Save</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html> --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <a href="{{route('episode.index')}}" class="btn btn-primary">Liệt Kê Danh Sách Tập Phim</a>
                <div class="card-header">Quản Lý Tập Phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($episode))
                        {!! Form::open(['route'=>'store.video','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route'=>['update.video',$episode->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    @endif
                        
                        <div class="form-group">
                            {!! Form::label('movie', 'Chọn Phim', []) !!}
                            {!! Form::select('movie_id',['0' => 'Danh sách phim', 'Phim'=> $list_movie] ,isset($episode) ? $episode->movie_id : '', ['class'=>'form-control select-movie']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('video', 'Video', []) !!}
                            {!! Form::file('video', ['class'=>'form-control-file']) !!}
                        </div>

                        @if(isset($episode))
                            <div class="form-group">
                                {!! Form::label('episode', 'Tập Phim', []) !!}
                                {!! Form::text('episode', $episode->episode, ['class' => 'form-control', 'placeholder' => '...', 'readonly']) !!}
                            </div>
                        @else
                            <div class="form-group">
                                {!! Form::label('episode', 'Tập Phim', []) !!}
                                {!! Form::select('episode',['class' => 'form-control', 'placeholder' => 'Chọn tập phim']) !!}
                            </div>
                        @endif
                        

                        @if(!isset($episode))
                            {!! Form::submit('Thêm Tập Phim', ['class'=>'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Tập Phim', ['class'=>'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
