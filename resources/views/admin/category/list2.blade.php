@extends('admin.master')

@section('title')
    quản lý tác giả
@endsection
@section('search')
    <!-- SidebarSearch Form -->
    <div class="form-inline">
        @error('search_author')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <form action="{{route('author.search')}}" class="form-inline" method="post">
            @csrf
            <input name="search_author" class="form-control @error('search_author') border-danger  @enderror"
                   value="{{ $search ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn-sidebar" type="submit">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Authors', 'key' => 'list'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        @can('add_author')
                                            <div class="col-sm-12 mb-2">
                                                <a type="button" class="btn btn-primary float-right"
                                                   data-toggle="modal" data-target="#addAuthorModal"
                                                   id="btnShowFormAddAuthor">Add</a>
                                            </div>
                                        @endcan
                                        <div class="col-sm-6">
                                            <table id="authorTable"
                                                   class="table table-bordered table-striped dataTable dtr-inline"
                                                   role="grid" aria-describedby="example1_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        #
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Name
                                                    </th>
                                                    @canany(['edit_author','delete_author'])
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Action
                                                        </th>
                                                    @endcanany
                                                </tr>
                                                </thead>
                                                <tbody>
{{--                                                @foreach($authors as $key => $author)--}}
{{--                                                    <tr id="{{$author->id}}" class="odd">--}}
{{--                                                        <td class="dtr-control sorting_1"--}}
{{--                                                            tabindex="0">{{$key + $authors->firstItem()}}</td>--}}
{{--                                                        <td id="authorname[{{$author->id}}]">{{$author->name}}</td>--}}
{{--                                                        @canany(['edit_author','delete_author'])--}}
{{--                                                            <td>--}}
{{--                                                                <div style="display: inline-flex">--}}
{{--                                                                    @can('edit_author')--}}
{{--                                                                        <div style="margin: 0 10px">--}}
{{--                                                                            <a data-url="{{route('author.edit',$author->id)}}"--}}
{{--                                                                               data-id="{{$author->id}}"--}}
{{--                                                                               data-toggle="modal"--}}
{{--                                                                               class="btnShowFormUpdateAuthor"><i--}}
{{--                                                                                        class="fas fa-edit"></i></a>--}}
{{--                                                                        </div>--}}
{{--                                                                    @endcan--}}
{{--                                                                    @can('delete_author')--}}
{{--                                                                        <div style="margin: 0 10px">--}}
{{--                                                                            <a href="{{route('author.delete', $author->id)}}"--}}
{{--                                                                               data-id="{{$author->id}}"--}}
{{--                                                                               onclick="return confirm('Xác nhận xóa tác giả:  {{$author->name}}  ?')"--}}
{{--                                                                               class="btnDeleteAuthor"--}}
{{--                                                                               style="color: red"><i--}}
{{--                                                                                        class="far fa-trash-alt"></i></a>--}}
{{--                                                                        </div>--}}
{{--                                                                    @endcan--}}
{{--                                                                </div>--}}
{{--                                                            </td>--}}
{{--                                                        @endcanany--}}
{{--                                                    </tr>--}}
{{--                                                @endforeach--}}
                                                </tbody>
                                                <tfoot>
                                                {{--                                                <tr>--}}
                                                {{--                                                    <th rowspan="1" colspan="1">Rendering engine</th>--}}
                                                {{--                                                    <th rowspan="1" colspan="1">Browser</th>--}}
                                                {{--                                                    <th rowspan="1" colspan="1">Platform(s)</th>--}}
                                                {{--                                                </tr>--}}
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item ">
                                                {{ $authors->links() }}
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="modal fade" id="addAuthorModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm tác giả</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('author.store')}}" method="post"
                                              name="addAuthor" id="addAuthor">
                                            @csrf
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Name</label>
                                                <input type="text" class="form-control" id="authorName">
                                                <p class="text-danger" id="_error"></p>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" id="btnAddAuthor" class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="updateAuthorModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm tác giả</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" name="updateAuthor" id="updateAuthor">
                                            @csrf
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Name</label>
                                                <input type="text" class="form-control" id="updateAuthorName">
                                                <input type="hidden" class="form-control" id="updateAuthorId">
                                                <p class="text-danger" id="_updateError"></p>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" id="btnUpdateAuthor" class="btn btn-primary">update
                                        </button>
                                    </div>
                                </div>
                            </div>
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
    <script>
        function resetForm() {
            $('#_error').text('');
            $('#authorName').removeClass('border-danger');
        }

        function addAuthor() {
            var url = $("#addAuthor").attr('action');
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "name": $("#authorName").val(),
                    "_token": "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $("#authorTable tbody tr").remove()
                    $("#authorTable tbody").html(data);
                    $("#addAuthorModal").modal('hide');
                    $('#addAuthor')[0].reset();
                },
                error: function (data) {
                    var errors = JSON.parse(data.responseText);
                    $.each(errors, function (key, val) {
                        $('#_error').text(val.name);
                        $('#authorName').addClass('border-danger');
                        // console.log(val.name);
                    });
                }
            });
        }

        // show form update author
        function showFormUpdateAuthor(event) {
            event.preventDefault();
            $('#_updateError').text('');
            $('#updateAuthorName').removeClass('border-danger');
            let url = $(this).data('url');
            $.ajax({
                url: url,
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    $("#updateAuthorModal").modal('show');
                    $('#updateAuthor #updateAuthorName').val(data.name);
                    $('#updateAuthor #updateAuthorId').val(data.id);
                }
            })
        }

        // update author
        function updateAuthor() {
            let id = $('#updateAuthorId').val();
            let origin = location.origin;
            let url = origin + '/admin/author/' + id + '/edit';
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    "name": $("#updateAuthorName").val(),
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $("#authorTable tbody tr").remove()
                    $("#authorTable tbody").html(data);
                    // $('#authorTable tbody #authorname['+ data.id+']').children(data.name);
                    $("#updateAuthorModal").modal('hide');
                    $('#updateAuthor')[0].reset();
                }
            })
        }

        $(document).ready(function () {
            // Add author
            $('#btnShowFormAddAuthor').on('click', resetForm);
            $("#btnAddAuthor").on('click', addAuthor);
            $('.btnShowFormUpdateAuthor').on('click', showFormUpdateAuthor);
            $('#btnUpdateAuthor').on('click', updateAuthor);
            // $('.btnDeleteAuthor').on('click', deleteAuthor);

        })
    </script>
@endsection


