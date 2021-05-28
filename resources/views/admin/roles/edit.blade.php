

@extends('admin.master')

@section('title')
    Role manager
@endsection
@section('css')

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
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" value="{{$role->name}}" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input name="des" value="{{$role->des}}" type="text" class="form-control">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">Permissions</div>
                                            <div class="col-sm-12 row">
                                                @foreach($permissions as $permission)
                                                    <div class="form-check mr-3">
                                                        <input
                                                            {{$role->permissions->contains($permission->id) ? 'checked' : ' '}}
                                                            value="{{ $permission->id }}" name="permission_id[{{$permission->id}}]" class="form-check-input"
                                                               type="checkbox" id="gridCheck-{{$permission->id}}">
                                                        <label class="form-check-label" for="gridCheck-{{$permission->id}}">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">submit</button>
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
@endsection


