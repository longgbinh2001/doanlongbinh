
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản Lý Tải phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   {{--  @if(!isset($firebase))
                        {!! Form::open(['route'=>'firebase.store','method'=>'POST']) !!}
                    @else
                        {!! Form::open(['route'=>['firebase.update',$firebase->id],'method'=>'PUT']) !!}
                    @endif
                        {!! Form::open(['url' => 'upload-video', 'files' => true]) !!}
                            <div class="form-group">
                                {!! Form::label('video', 'Chọn video để tải lên') !!}
                                {!! Form::file('video', ['class' => 'form-control']) !!}
                            </div>
                            {!! Form::submit('Tải lên', ['class' => 'btn btn-primary', ]) !!}
                        {!! Form::close() !!} --}}
                        <form action="{{ route('upload.video') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="video">
                            <button type="submit">Upload</button>
                        </form>
                            
                        @if(!isset($firebase))
                            {!! Form::submit('Thêm Danh Mục', ['class'=>'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Danh Mục', ['class'=>'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
            </table>
        </div>
    </div>
</div>
@endsection
