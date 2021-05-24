@extends('admin.master')

@section('title')
    Category manager
@endsection
@section('scss')
    <link rel="stylesheet" href="{{asset('/backend/select2/css/css.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/select2/css/main.css')}}">
    <style>
        .ck-content{
            height: 200px !important;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h1>Thêm sách</h1>
                </div>
                <div class="form-group">
                    <form method="POST" action="{{route('author.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        @if($errors->has('name'))
                            <div class="alert alert-danger">
                                {{$errors->first('name')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Tuổi</label>
                            <input type="text" name="age" class="form-control" placeholder="desc">
                        </div>
                        @if($errors->has('age'))
                            <div class="alert alert-danger">
                                {{$errors->first('age')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <input type="text" name="status" class="form-control" placeholder="status">
                        </div>
                        @if($errors->has('status'))
                            <div class="alert alert-danger">
                                {{$errors->first('status')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Quốc tịch</label>
                            <input type="text" name="country" class="form-control" placeholder="status">
                        </div>
                        @if($errors->has('country'))
                            <div class="alert alert-danger">
                                {{$errors->first('country')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Link Wiki</label>
                            <input type="text" name="desc" class="form-control" placeholder="status">
                        </div>
                        @if($errors->has('desc'))
                            <div class="alert alert-danger">
                                {{$errors->first('desc')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" name="author_image" class="form-control-file">
                        </div>
                        @if($errors->has('author_image'))
                            <div class="alert alert-danger">
                                {{$errors->first('author_image')}}
                            </div>
                        @endif



                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
                <script src="{{asset('/backend/select2/js/js.js')}}"></script>
                <script>
                    $('.select2_init').select2({
                        'placeholder' : 'choose author'
                    })
                </script>
                <script>
                    var loadFile = function(event) {
                        var imageOutput = document.getElementById('imageOutput');
                        imageOutput.src = URL.createObjectURL(event.target.files[0]);
                        imageOutput.onload = function() {
                            URL.revokeObjectURL(imageOutput.src) // free memory
                        }
                    };
                </script>
@endsection
