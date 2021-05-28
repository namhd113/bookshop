@extends('admin.master')

@section('title')
    Role manager
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Permission', 'key' => 'list'])

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

                                        {{--btn add--}}
                                        @can('add_permission')
                                            <div class="col-sm-12 mb-2 float-right">
                                                <a href="{{route('permissions.create')}}"
                                                   class="btn btn-primary">Add</a>
                                            </div>
                                        @endcan
                                        <div class="col-sm-8">
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
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Description
                                                    </th>
                                                    @canany(['edit_permission', 'delete_permission'])
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Action
                                                    </th>
                                                    @endcanany
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($permissions as $key => $permission)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ ++$key}}</td>
                                                        <td>{{$permission->name}}</td>
                                                        <td>{{$permission->des}}</td>
                                                        @canany(['edit_permission', 'delete_permission'])
                                                        <td>
                                                            <div style="display: inline-flex">
                                                                @can('edit_permission')
                                                                    <div style="margin: 0 10px">
                                                                        <a href="{{route('permissions.edit', $permission->id)}}">
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                @endcan

                                                                    <div style="margin: 0 10px">
                                                                        <a href="{{route('permissions.delete', $permission->id)}}"
                                                                           onclick="return confirm('Are you sure delete Permission: {{$permission->name}}  ?')"
                                                                           style="color: red">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </div>

                                                            </div>
                                                        </td>
                                                        @endcanany
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-end">
                                                    <li class="page-item ">
                                                        {{ $permissions->links() }}
                                                    </li>
                                                </ul>
                                            </nav>
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
@endsection



