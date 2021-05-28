@extends('admin.master')

@section('title')
    Role manager
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Roles', 'key' => 'list'])

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
                                        @can('add_role')
                                            <div class="col-sm-12 mb-2 float-right">
                                                <a href="{{route('roles.create')}}" class="btn btn-primary">Add</a>
                                            </div>
                                        @endcan
                                        <div class="col-sm-12">
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
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Roles
                                                    </th>
                                                    @canany(['edit_role', 'delete_role'])
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Action
                                                        </th>
                                                    @endcanany
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($roles as $key => $role)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ ++$key}}</td>
                                                        <td>{{$role->name}}</td>
                                                        <td>{{$role->des}}</td>
                                                        <td>
                                                            @foreach($role->permissions as $permission)
                                                                {{$permission->des . ', '}}
                                                            @endforeach
                                                        </td>
                                                        @canany(['edit_role', 'delete_role'])
                                                            <td>
                                                                <div style="display: inline-flex">
                                                                    @can('edit_role')
                                                                        <div style="margin: 0 10px">
                                                                            <a href="{{route('roles.edit', $role->id)}}">
                                                                                <i class="fas fa-edit"></i>
                                                                            </a>
                                                                        </div>
                                                                    @endcan
                                                                    @can('delete_role')
                                                                        <div style="margin: 0 10px">
                                                                            <a href="{{route('roles.delete', $role->id)}}"
                                                                               onclick="return confirm('Are you sure delete Role: {{$role->name}}  ?')"
                                                                               style="color: red">
                                                                                <i class="far fa-trash-alt"></i>
                                                                            </a>
                                                                        </div>
                                                                    @endcan
                                                                </div>
                                                            </td>
                                                        @endcanany
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
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



