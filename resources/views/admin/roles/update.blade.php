

@extends('admin.master')

@section('title')
    Role manager
@endsection
@section('scss')
    <style>
        .card-header{
            background-color: #007bff;
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Role', 'key' => 'edit'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <form action="{{route('roles.update', $role->id)}}" method="post">
                                        @csrf

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-primary">Name</label>
                                                <input name="name" value="{{$role->name}}" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="text-primary">Description</label>
                                                <input name="des" value="{{$role->des}}" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-primary">Permissions</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="text-primary">
                                                        <input type="checkbox" class="checkAll">
                                                        Check All
                                                    </label>
                                                </div>
                                                @foreach($permissions as $permissionsParent)
                                                    <div class="card border-primary mb-3 col-md-12 card-permission">
                                                        <div class="card-header text-center">
                                                            <label >
                                                                <input type="checkbox" value="" class="checkbok_parent">
                                                                {{$permissionsParent->des}}
                                                            </label>
                                                        </div>
                                                        <div class="row">
                                                            @foreach($permissionsParent->permissionsChildrent as $permissionsChildrent)
                                                                <div class="card-body text-primary col-md-3">
                                                                    <label>
                                                                        <input
                                                                            {{$role->permissions->contains($permissionsChildrent->id) ? 'checked' : ' '}}
                                                                            class="checkbox_childrent"
                                                                            name="permission_id[{{$permissionsChildrent->id}}]"
                                                                            value="{{ $permissionsChildrent->id }}" type="checkbox" >
                                                                        {{$permissionsChildrent->des}}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        {{--                                        <div class="form-group row">--}}
                                        {{--                                            <div class="col-sm-3">Permissions</div>--}}
                                        {{--                                            <div class="col-sm-9 row">--}}
                                        {{--                                                @foreach($permissions as $permission)--}}
                                        {{--                                                    <div class="form-check mr-3">--}}
                                        {{--                                                        <input value="{{ $permission->id }}" name="permission_id[{{$permission->id}}]" class="form-check-input"--}}
                                        {{--                                                               type="checkbox" id="gridCheck-{{$permission->id}}">--}}
                                        {{--                                                        <label class="form-check-label" for="gridCheck-{{$permission->id}}">--}}
                                        {{--                                                            {{ $permission->name }}--}}
                                        {{--                                                        </label>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                @endforeach--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <button type="submit" class="btn btn-primary" style="padding: 7px 30px">submit</button>
                                    </form>
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
    <script src="{{asset('/backend/roles/js/js.js')}}"></script>
@endsection


