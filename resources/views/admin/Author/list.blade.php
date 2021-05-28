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
@section('breadcrumb')
    <div class="row">
        <div class="col-sm-4" style="text-align: left; padding-left: 32px">
            <a href="{{route('author.create')}}">
                <button type="button" class="btn btn-success btn-sm">Add new Authors</button>
            </a>
        </div>
        <div class="nav-search col-sm-4" id="nav-search" style="text-align: right">
            <form class="form-search" action="{{route('author.search')}}" method="post">
                @csrf
                <span class="input-icon">
									<input name="search" type="text" placeholder="Search ..." class="nav-search-input"
                                           id="nav-search-input" autocomplete="off"/>
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
            </form>
        </div>
    </div>
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
                                <h1 class="text-primary">Danh sach tac gia</h1>
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
                                                        <th class="center">
                                                            <i class="ace-icon fa fa-list bigger-110 hidden-480"></i>
                                                        </th>
                                                        <th class="center">
                                                            <i class="ace-icon fa fa-photo bigger-110 hidden-480"></i>
                                                            Avatar
                                                        </th>
                                                        <th class="center">
                                                            <i class="ace-icon fa fa-user bigger-110 hidden-480"></i>
                                                            Name
                                                        </th>
                                                        <th class="center">
                                                            <i class="ace-icon fa fa-calendar bigger-110 hidden-480"></i>
                                                            Date of Birth
                                                        </th>
                                                        <th class="center">
                                                            <i class="ace-icon fa fa-amazon bigger-110 hidden-480"></i>
                                                            Books in store
                                                        </th>
                                                        <th class="center">
                                                            <i class="ace-icon fa fa-flag bigger-110 hidden-480"></i>
                                                            Country
                                                        </th>

                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($authors as $key=>$author)
                                                        <tr>
                                                            <td class="center">{{$key +1}}</td>
                                                            <td class="center"><img src="{{asset('storage/'.$author->avatar)}}" height="50px" id="authorAvatar"></td>
                                                            <td class="center" style="padding-top: 20px"><a href="{{$author->wiki_link}}" id="authorName">{{$author->name}}</a></td>
                                                            <td class="center" style="padding-top: 20px">{{$author->born}}</td>
                                                            <td class="center" style="padding-top: 20px">{{$author->book_qty}}</td>
                                                            <td class="center" style="padding-top: 20px">{{$author->country}}</td>
                                                            <td class="center" hidden id="authorId">{{$author->id}}</td>
                                                            <td><a href="{{route('author.edit', ['id' => $author->id])}}"
                                                                   class="btn btn-default">EDIT</a></td>
                                                            <td><a href="{{ route('author.destroy', $author->id) }}" class="btn btn-danger"
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

