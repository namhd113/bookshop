@extends('admin.master')

@section('title')
    Category manager
@endsection
@section('scss')
    <link rel="stylesheet" href="{{asset('/backend/select2/css/css.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/select2/css/main.css')}}">
    <style>
        .ck-content {
            height: 200px !important;
        }
    </style>
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="col-sm-12 text-center">

            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Add new Book</h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <form method="post" action="{{route('book.store')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- <legend>Form</legend> -->
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="col-sm-6">
                                            <div>
                                                <label style="width: 120px; text-align: left">Name *</label>
                                                @if($errors->has('name'))
                                                    <span>
												<input style="border: solid red" type="text" id="form-field-icon-1"
                                                       name="name"/>
											</span>
                                                    @foreach($errors->get('name') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @else
                                                    <span>
												<input type="text" id="form-field-icon-1" name="name"
                                                       value="{{old('name')}}"/>
											</span>
                                                @endif
                                                <div class="space-8"></div>

                                                <label
                                                        style="width: 120px;text-align: left">Category*</label>
                                                @if($errors->has('category_id'))
                                                    <span>
                                            <select style="width: 187px" name="category_id[]" multiple="multiple"
                                                    class="chosen-select"
                                                    id="form-field-select-4" data-placeholder=" ">
                                                            @foreach($categories as $category)
                                                    <option
                                                            value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                                        </select>
                                                        </span>
                                                    @foreach($errors->get('category_id') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @else
                                                    <span>
                                            <select style="width: 187px" name="category_id[]" multiple="multiple"
                                                    class="chosen-select"
                                                    id="form-field-select-4" data-placeholder=" ">
                                                 @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{collect(old('category_id'))->contains($category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            </span>
                                                @endif
                                                <div class="space-8"></div>

                                                <label style="width: 120px;text-align: left">License No *</label>
                                                @if(!$errors->has('license_no'))
                                                    <span>
												<input type="text" id="form-field-icon-1" name="license_no" value="{{old('license_no')}}"/>
											</span>
                                                @else
                                                    <span>
												<input style="border: solid red" type="text" id="form-field-icon-1"
                                                       name="license_no"/>
											</span>
                                                    @foreach($errors->get('license_no') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @endif
                                                <div class="space-8"></div>

                                                <label style="width: 120px;text-align: left">Language *</label>
                                                @if(!$errors->has('lang'))
                                                    <span>
												<input type="text" id="form-field-icon-1" name="lang" value="{{old('lang')}}"/>
											</span>
                                                @else
                                                    <span>
												<input style="border: solid red" type="text" id="form-field-icon-1"
                                                       name="lang"/>
											</span>
                                                    @foreach($errors->get('language') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @endif
                                                <div class="space-8"></div>

                                                <label style="width: 120px;text-align: left">Published Date *</label>
                                                @if(!$errors->has('publish_date'))
                                                    <span class="input-large">
                                                    <input name="publish_date" class="date-picker"
                                                           id="id-date-picker-1"
                                                           type="text" data-date-format="yyyy-mm-dd" value="{{old('publish_date')}}"/>
                                                </span>
                                                @else
                                                    <span class="input-large">
                                                    <input style="border: solid red" name="publish_date"
                                                           class="date-picker"
                                                           id="id-date-picker-1"
                                                           type="text" data-date-format="yyyy-mm-dd"/>
                                                </span>
                                                    @foreach($errors->get('publish_date') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @endif
                                                <div class="space-8"></div>

                                                <label style="width: 120px;text-align: left">Price *</label>
                                                @if(!$errors->has('price'))
                                                    <span>
												<input type="text" id="form-field-icon-1" name="price" value="{{old('price')}}"/>
											</span>
                                                @else
                                                    <span>
												<input style="border: solid red" type="text" id="form-field-icon-1"
                                                       name="price"/>
											</span>
                                                    @foreach($errors->get('price') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @endif
                                                <div class="space-8"></div>

                                                <label style="width: 120px;text-align: left">Description *</label>
                                                @if(!$errors->has('desc'))
                                                    <span class="input-large">
												<input type="text" id="form-field-icon-1" name="desc" value="{{old('desc')}}"/>
											</span>
                                                @else
                                                    <span class="input-large">
												<input style="border: solid red" type="text" id="form-field-icon-1"
                                                       name="desc"/>
											</span>
                                                    @foreach($errors->get('desc') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div>
                                                <label style="width: 120px;text-align: left">Publisher *</label>
                                                @if(!$errors->has('publisher'))
                                                    <span>
												<input type="text" id="form-field-icon-1" name="publisher" value="{{old('publisher')}}"/>
											</span>
                                                @else
                                                    <span>
												<input style="border: solid red" type="text" id="form-field-icon-1"
                                                       name="publisher"/>
											</span>
                                                    @foreach($errors->get('publisher') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @endif
                                                <div class="space-8"></div>

                                                <label style="width: 120px; text-align: left">Author *</label>
                                                <span>
                                            <select style="width: 187px" name="author_id[]" multiple="multiple"
                                                    class="chosen-select"
                                                    id="form-field-select-4" data-placeholder=" ">
                                                @foreach($authors as $key => $author)
                                                    <option value="{{$author->id}}" {{collect(old('author_id'))->contains($author->id) ? 'selected' : ''}}>{{$author->name}}</option>
                                                @endforeach
                                            </select>
                                            </span>
                                                @if($errors->has('author_id'))
                                                    @foreach($errors->get('author_id') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @endif
                                                <div class="space-8"></div>

                                                <label style="width: 120px;text-align: left">Republish No *</label>
                                                @if(!$errors->has('republish_no'))
                                                    <span>
												<input type="text" id="form-field-icon-1" name="republish_no" value="{{old('republish_no')}}"/>
											</span>
                                                @else
                                                    <span>
												<input style="border: solid red" type="text" id="form-field-icon-1"
                                                       name="republish_no"/>
											</span>
                                                    @foreach($errors->get('republish_no') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @endif
                                                <div class="space-8"></div>

                                                <label style="width: 120px;text-align: left">ISBN No *</label>
                                                @if(!$errors->has('isbn_no'))
                                                    <span>
												<input type="text" id="form-field-icon-1" name="isbn_no" value="{{old('isbn_no')}}"/>
											</span>
                                                @else
                                                    <span>
												<input style="border: solid red" type="text" id="form-field-icon-1" name="isbn_no"/>
											</span>
                                                    @foreach($errors->get('isbn_no') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @endif
                                                <div class="space-8"></div>

                                                <label style="width: 120px;text-align: left">Quantity *</label>
                                                @if(!$errors->has('qty'))
                                                    <span>
												<input type="text" id="form-field-icon-1" name="qty" value="{{old('qty')}}"/>
											</span>
                                                @else
                                                    <span>
												<input style="border: solid red" type="text" id="form-field-icon-1" name="qty"/>
											</span>
                                                    @foreach($errors->get('qty') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @endif
                                                <div class="space-8"></div>

                                                <label style="width: 120px;text-align: left">Total pages</label>
                                                @if(!$errors->has('pages'))
                                                    <span>
												<input type="text" id="form-field-icon-1" name="pages"  value="{{old('pages')}}">
											</span>
                                                @else
                                                    <span>
												<input style="border: solid red" type="text" id="form-field-icon-1" name="pages">
											</span>
                                                    @foreach($errors->get('pages') as $error)
                                                        <p style="color: red; text-align: right;padding-right: 30px">{{$error}}</p>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 space-12"></div>
                                        <div class="widget-body col-sm-12" style="text-align: center">
                                            <div class="widget-main no-padding">
                                                <div class="form-inline">
                                                    <div class="col-sm-6">
                                                        <label class="inline" style="text-align: center">
                                                            <p>Recommend</p>
                                                            <input name="recommend" class="ace ace-switch ace-switch-5"
                                                                   type="checkbox" {{old('recommend') ? 'checked': ''}} />
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="inline" style="text-align: center">
                                                            <p>Hot</p>
                                                            <input name="hot" class="ace ace-switch ace-switch-5"
                                                                   type="checkbox" {{old('hot') ? 'checked': ''}} />
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="space-12 col-sm-12"></div>
                                                <label style="width: 120px;text-align: left">Detail</label>
                                                <textarea id="form-field-icon-1" name="detail" >{{old('detail')}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <img id="avatar" src="{{asset('storage/samples/400x600.png')}}"
                                                 alt="your image"
                                                 width="250" height="380"/>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                            </div>
                                            <div class="form-group col-sm-8 align-left">
                                                <input name="avatar" type="file" id="id-input-file-2"
                                                       style="text-align: left"
                                                       onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0])"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-actions center">
                                <button type="submit" class="btn btn-sm btn-success">
                                    Submit
                                    <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </div>
    </div>
    <script>
        CKEDITOR.replace('detail');
    </script>
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
    </script>
@endsection
