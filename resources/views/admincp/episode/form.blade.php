@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <a href="{{route('movie.index')}}" class="btn btn-primary">Liệt Kê Danh Sách Tập Phim</a>
                <div class="card-header">Quản Lý Tập Phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($episode))
                        {!! Form::open(['route'=>'episode.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route'=>['episode.update',$movie->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    @endif
                        
                        <div class="form-group">
                            {!! Form::label('movie', 'Chọn Phim', []) !!}
                            {!! Form::select('movie_id', $list_movie, isset($movie) ? $episode->movie_id : '', ['class'=>'form-control select-movie']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link Phim', []) !!}
                            {!! Form::text('link', isset($episdoe) ? $movie->linkphim : '', ['class'=>'form-control','placeholder'=>'...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('episode', 'Tập Phim', []) !!}
                            <select name="episode" class="form-control" id="episode">
                            </select>
                            
                        </div>
                        
                        @if(!isset($movie))
                            {!! Form::submit('Thêm Phim', ['class'=>'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Phim', ['class'=>'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection