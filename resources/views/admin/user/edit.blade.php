

@extends('admin.master')

@section('title')
    Users manager
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'User', 'key' => 'add'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-5">
                                    <form action="{{route('users.update', $user->id)}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" type="text" class="form-control" value="{{$user->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" type="password" class="form-control">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2">Role</div>
                                            <div class="col-sm-10">
                                                @foreach($roles as $role)
                                                    <div class="form-check">
                                                        <input
                                                                {{$user->roles->contains($role->id) ? 'checked' : ' '}}
                                                                value="{{ $role->id }}" name="role_id[{{$role->id}}]" class="form-check-input"
                                                                type="checkbox" id="gridCheck-{{$role->id}}">
                                                        <label class="form-check-label" for="gridCheck-{{$role->id}}">
                                                            {{ $role->name }}
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


