@extends('admin.master')

@section('title')
    User manager
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'User', 'key' => 'list'])

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
                                        @can('add_user')
                                            <div class="col-sm-12 mb-2 float-right">
                                                <a href="{{route('users.create')}}" class="btn btn-primary">Add</a>
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
                                                        Email
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Roles
                                                    </th>
                                                    @canany(['edit_user', 'delete_user'])
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Action
                                                        </th>
                                                    @endcanany
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $key => $user)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ ++$key}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            @foreach($user->roles as $role)
                                                                {{$role->name . ', '}}
                                                            @endforeach
                                                        </td>
                                                        @canany(['edit_user', 'delete_user'])
                                                            <td>

                                                                <div style="display: inline-flex">
                                                                    @can('edit_user')
                                                                        <div style="margin: 0 10px">
                                                                            <a href="{{route('users.edit', $user->id)}}">
                                                                                <i class="fas fa-edit"></i>
                                                                            </a>
                                                                        </div>
                                                                    @endcan
                                                                    @can('delete_user')
                                                                        <div style="margin: 0 10px">
                                                                            <a href="{{route('users.delete', $user->id)}}"
                                                                               onclick="return confirm('Are you sure delete User : {{$user->name}}  ?')"
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


