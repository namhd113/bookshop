@extends('admin.master')

@section('title')
    Category manager
@endsection
@section('scss')
    <link rel="stylesheet" href="{{asset('/backend/select2/css/css.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/select2/css/main.css')}}">
    <style>
        .ck-content {
            height: 200px !important;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Them tac gia</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('author.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <label style="width: 100px; text-align: left">Name</label>
                                            <span class="input-icon">
												<input type="text" id="form-field-icon-1" name="name"/>
												<i class="ace-icon glyphicon glyphicon-user"></i>
											</span>
                                            <div class="space-12"></div>

                                            <label style="width: 100px;text-align: left">Country</label>
                                            <span class="input-icon">
												<input type="text" id="form-field-icon-1" name="country"/>
												<i class="ace-icon glyphicon glyphicon-flag"></i>
											</span>
                                            <div class="space-12"></div>

                                            <label style="width: 100px;text-align: left">Wikipedia</label>
                                            <span class="input-icon">
												<input type="text" id="form-field-icon-1" name="wiki_link"/>
												<i class="ace-icon glyphicon glyphicon-link"></i>
											</span>
                                            <div class="space-12"></div>

                                            <label style="width: 100px;text-align: left">Born</label>
                                            <span class="input-icon">
                                                        <input name="born" class="form-control date-picker"
                                                               id="id-date-picker-1"
                                                               type="date" data-date-format="yyyy-mm-dd"/>
                                                <i class="ace-icon glyphicon glyphicon-heart"></i>
                                            </span>
                                            <div class="space-12"></div>

                                            <label style="width: 100px;text-align: left">Die</label>
                                            <span class="input-icon">
                                                        <input name="die" class="form-control date-picker"
                                                               id="id-date-picker-1"
                                                               type="date" data-date-format="yyyy-mm-dd"/>
                                                <i class="ace-icon glyphicon glyphicon-calendar"></i>
                                            </span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="avatar" class="form-control-file">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-check">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">

                            </div>
                        </form>
                    </div>


                </div>


            </div>

        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('/backend/select2/js/js.js')}}"></script>
    <script>
        $('.select2_init').select2({
            'placeholder': 'choose author'
        })
    </script>
    <script>
        var loadFile = function (event) {
            var imageOutput = document.getElementById('imageOutput');
            imageOutput.src = URL.createObjectURL(event.target.files[0]);
            imageOutput.onload = function () {
                URL.revokeObjectURL(imageOutput.src) // free memory
            }
        };
    </script>
@endsection
