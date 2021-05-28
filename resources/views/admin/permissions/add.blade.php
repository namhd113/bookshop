

@extends('admin.master')

@section('title')
    Permissions manager
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Permissions', 'key' => 'add'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <form action="{{route('permissions.store')}}" method="post">
                                        @csrf
                                        <div class="form-group col-6">
                                            <label class="text-primary">Module</label>
                                            <select name="name_parent" class="form-control " >
                                                <option selected>Choose module</option>
                                                    @foreach(config('permissions.table_module') as $moduleItem)
                                                        <option value="{{$moduleItem}}">{{$moduleItem}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                @foreach(config('permissions.module_childrent') as $moduleItemChildrent)
                                                <div class="col-md-3">
                                                    <label class="text-primary">
                                                        <input name="name_childrent[]" type="checkbox"  value="{{$moduleItemChildrent}}">
                                                            {{$moduleItemChildrent}}
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


