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
    {{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Book', 'key' => 'add'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-primary">Book information</h1>
                            </div>
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="table-agile-info">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Sách
                                            </div>
                                            <div>
                                                <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
                                                    <thead>
                                                    <tr>
                                                        <th data-breakpoints="xs">ID</th>
                                                        <th>Tên thư viện</th>
                                                        <th>Mô tả</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($category as $key => $category)
                                                        <tr>
                                                            <th scope="row">{{$key+1}}</th>
                                                            <td>{{$category->name}}</td>
                                                            <td>{!! $category->desc !!}</td>


                                                            <td></td>

                                                            <td><a href="{{route('category.edit', ['id' => $category->id])}}"
                                                                   class="btn btn-default">EDIT</a></td>
                                                            <td><a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger"
                                                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
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

