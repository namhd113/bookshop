@extends('admin.master')

@section('title')
    Create book
@endsection
@section('scss')
    <link rel="stylesheet" href="{{asset('/backend/select2/css/css.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/select2/css/main.css')}}">
    <style>
        .ck-content {
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
                                    <div class="row">
                                        <!-- form input -->
                                        <div class="col-sm-12">
                                            <form class="form-row" action="{{route('book.store')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group col-12">
                                                    <label class="form-check-label text-primary">Name</label>
                                                    <input name="name" type="text"
                                                           class="form-control ">
{{--                                                    @error('name')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">ISBN</label>
                                                    <input name="isbn_no" type="text" class="form-control"
                                                           value="{{rand(0,1).'-'.rand(100,999).'-'.rand(10000,99999).'-'.rand(1,9)}}">
{{--                                                    @error('isbn')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">License No *</label>
                                                    <input name="license_no" type="text" class="form-control">
{{--                                                    @error('license_no')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Language</label>
                                                    <input name="lang" type="text" class="form-control">
{{--                                                    @error('lang')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Published Date</label>
                                                    <input name="publish_date" id="id-date-picker-1" type="date"
                                                           class="form-control">
{{--                                                    @error('publish_date')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Republish No *</label>
                                                    <input name="republish_no" type="text" class="form-control">
{{--                                                    @error('republish_no')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Page number</label>
                                                    <input name="pages" type="number" class="form-control">
{{--                                                    
                                                </div>
                                                   <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Gia</label>
                                                    <input name="price" type="number" class="form-control">
{{--                                                    
                                                </div>

                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Author</label>
                                                    <select name="author_id"
                                                            class="form-control ">
                                                        <option selected>Choose Author</option>
                                                        @foreach($authors as $author)
                                                            <option value="{{$author->id}}">{{$author->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('author_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Category</label>
                                                    <select name="category_id"
                                                            class="form-control ">
                                                        <option selected>Choose Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
{{--                                                    @error('category_id')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
                                                </div>
{{--                                                <div class="form-group col-6">--}}
{{--                                                    <label class="form-check-label text-primary">Nha xuat ban</label>--}}
{{--                                                    <input name="publisher" type="text" class="form-control">--}}
{{--                                                    @error('publisher')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
{{--                                                </div>--}}
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">quanty</label>
                                                    <input name="qty" type="text" class="form-control">
{{--                                                    @error('qty')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Image</label>
                                                    <input name="avatar" onchange="loadFile(event)" type="file"
                                                           class="form-control-file ">
{{--                                                    @error('avatar')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
                                                </div>
                                                <div class="form-group col-6">
                                                    <img id="imageOutput" width="100px">
                                                </div>
{{--                                                <div class="form-group col-6">--}}
{{--                                                    <label class="form-check-label text-primary">Price</label>--}}
{{--                                                    <input name="price" type="text"--}}
{{--                                                           class="form-control ">--}}
{{--                                                    @error('price')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group col-12">--}}
{{--                                                    <label class="form-check-label text-primary">Description</label>--}}
{{--                                                    <textarea id="editor" name="desc"--}}
{{--                                                              class="form-control "--}}
{{--                                                              rows="10"></textarea>--}}
{{--                                                    @error('desc')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
{{--                                                </div>--}}
                                                <div class="form-group col-12">
                                                    <label class="form-check-label text-primary">Detail</label>
                                                    <textarea id="editor" name="detail"
                                                              class="form-control "
                                                              rows="10"></textarea>
{{--                                                    @error('desc')--}}
{{--                                                    <p class="text-danger">{{ $message }}</p>--}}
{{--                                                    @enderror--}}
                                                </div>

                                                <div class="widget-body col-sm-12" style="text-align: center">
                                                    <div class="widget-main no-padding">
                                                        <div class="form-inline">
                                                            <div class="col-sm-6">
                                                                <label class="inline" style="text-align: center">
                                                                    <p>Recommend</p>
                                                                    <input name="recommend"
                                                                           class="ace ace-switch ace-switch-5"
                                                                           type="checkbox" {{old('recommend') ? 'checked': ''}} />
                                                                    <span class="lbl"></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="inline" style="text-align: center">
                                                                    <p>Hot</p>
                                                                    <input name="hot"
                                                                           class="ace ace-switch ace-switch-5"
                                                                           type="checkbox" {{old('hot') ? 'checked': ''}} />
                                                                    <span class="lbl"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-sm btn-success sub">
                                                            Submit
                                                            <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
            'placeholder': 'choose author'
        })
    </script>
    <script>
        var loadFile = function (event) {
            var imageOutput = document.getElementById('imageOutput');
            imageOutput.src = URL.createObjectURL(event.target.files[0]);
            imageOutput.onload = function () {
                URL.revokeObjectURL(imageOutput.src) // free memory
            }
        };

        // const btsubmit = document.querySelector('.sub')
        // btsubmit.addEventListener('click',function(){
        //     alert('ss');
        // })
    </script>
@endsection

