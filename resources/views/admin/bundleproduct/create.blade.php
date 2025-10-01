@extends('layouts.app')
@push('before-css')
    <link rel="stylesheet" href="{{asset('plugins/vendors/dropify/dist/css/dropify.min.css')}}">



@endpush
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Product</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Home</li>
                        <li class="breadcrumb-item active">Product</li>
                        <li class="breadcrumb-item active">Create New Product</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right">
                <a class="btn btn-info mb-1" href="{{url('/admin/bundleproduct')}}">Back</a>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="basic-form-layouts">
            <div class="row ">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">Product Info</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                {{-- Start Form --}}
                                {!! Form::open(['enctype' => 'multipart/form-data', 'url' => '/admin/bundleproduct', 'files' => true]) !!}

                                <div class="form-body">
                                    <div class="row">

                                        {{-- Category Fields --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::Label('category', 'Select Category:') !!}
                                                <select name="category" class="form-control" id="category">
                                                    <option value="0"> Select Category </option>
                                                    @foreach($items as $key => $val_items)
                                                        <option value="{{ $val_items->id }}"> {{ $val_items->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12" id="subcategory_sec">
                                            <div class="form-group">
                                                {!! Form::Label('item', 'Select Sub-Category:') !!}
                                                <select name="subcategory" id="subcategory" class="form-control"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-12" id="childsubcategory_sec">
                                            <div class="form-group">
                                                {!! Form::Label('item', 'Select Child Sub-Category:') !!}
                                                <select name="childsubcategory" id="childsubcategory"
                                                    class="form-control"></select>
                                            </div>
                                        </div>

                                        {{-- Product Info Fields --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('product_title', 'Product Title') !!}
                                                {!! Form::text('product_title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                        </div>

                                        <input type="hidden" name="type" value="bundle"> {{-- Hidden Type Field --}}

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('price', 'Price') !!}
                                                {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('maximum_price', 'Maximum Price') !!}
                                                {!! Form::text('maximum_price', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('sku', 'Sku') !!}
                                                {!! Form::text('sku', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('tags', 'Tags') !!}
                                                {!! Form::text('tags', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('description', 'Description') !!}
                                                {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('additional_information', 'Additional Information') !!}
                                                {!! Form::textarea('additional_information', null, ['class' => 'form-control', 'id' => 'summary-ckeditor1']) !!}
                                            </div>
                                        </div>

                                        {{-- Image Fields --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('image', 'Image') !!}
                                                <input class="form-control dropify" name="image" type="file" id="image"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('additional_image', 'Gallery Images') !!}
                                                <input class="form-control dropify" name="images[]" type="file" id="images"
                                                    multiple>
                                            </div>
                                        </div>

                                        <div id="bundle-section" class="col-md-12">
                                            <div class="col-md-12">
                                                <h4 class="card-title">Bundle Items</h4>
                                            </div>

                                            <div class="repeater-bundle col-md-12">
                                                <div data-repeater-list="bundle_items">
                                                    <!-- Initial visible row -->
                                                    <div data-repeater-item class="row">
                                                        <div class="form-group mb-1 col-sm-12 col-md-6">
                                                            <label>Select Product</label>
                                                            <select class="form-control" name="product_id" required>
                                                                <option value="">-- Select Product --</option>
                                                                @foreach($allProducts as $p)
                                                                    <option value="{{ $p->id }}">{{ $p->product_title }}
                                                                        ({{ $p->sku }})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group mb-1 col-sm-12 col-md-4">
                                                            <label>Quantity</label>
                                                            <input type="number" name="quantity" class="form-control"
                                                                value="1" min="1">
                                                        </div>

                                                        <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                            <button type="button" class="btn btn-danger"
                                                                data-repeater-delete>
                                                                <i class="ft-x"></i> Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group overflow-hidden">
                                                    <button type="button" data-repeater-create class="btn btn-primary">
                                                        <i class="ft-plus"></i> Add Product to Bundle
                                                    </button>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                                <div class="form-actions text-right pb-0">
                                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}
                                {{-- End Form --}}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        {{-- ... Information/Error Card Content ... --}}
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control">Information</h4>
                            {{-- ... --}}
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="card-text">
                                    @if ($errors->any())
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="alert alert-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if(Session::has('message'))
                                        <ul>
                                            <li class="alert alert-success">{{ Session::get('message') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"
        integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('plugins/vendors/dropify/dist/js/dropify.min.js')}}"></script>

    <script>
        $(document).ready(function () {

            $('form').submit(function (e) {
                if ($('input[name="type"]').val() === 'bundle') {
                    var bundleItems = $('[data-repeater-item]').filter(function () {
                        return $(this).find('select[name="product_id"]').val() !== '';
                    }).length;

                    if (bundleItems === 0) {
                        alert('Please add at least one product to bundle');
                        e.preventDefault();
                        return false;
                    }
                }
            });

            $('.dropify').dropify();

            // Initialize the bundle repeater with proper configuration
            $('.repeater-bundle').repeater({
                initEmpty: false,
                isFirstItemUndeletable: true, // This prevents the first item from being deleted
                show: function () {
                    $(this).slideDown(300);
                    // Make sure the newly added row is visible
                    $(this).css('display', 'flex'); // or 'block' depending on your layout
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to remove this item?')) {
                        $(this).slideUp(300, function () {
                            $(this).remove();
                        });
                    }
                },
                ready: function (setIndexes) {
                    // This ensures all existing items are properly indexed
                }
            });

            // Your other code for category/subcategory handling
            $('#subcategory_sec').hide();
            $('#childsubcategory_sec').hide();

            $('#category').change(function () {
                var get_id = $('#category').val();

                if (get_id == '0') {
                    $('#subcategory_sec').hide(500);
                } else {
                    $('#subcategory_sec').show(500);
                }

                $.ajax({
                    url: "{{route('set_sub_category')}}",
                    type: "get",
                    dataType: "json",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        get_id: get_id
                    },
                    success: function (response) {
                        if (response.status) {
                            const options = response.getsub_category;
                            $('#subcategory').empty();
                            const selectElement = $('#subcategory');
                            const optionElement1 = $('<option></option>').attr('value', 0).text('----');
                            selectElement.append(optionElement1);
                            options.forEach((option) => {
                                const { id, subcategory } = option;
                                const optionElement = $('<option></option>').attr('value', id).text(subcategory);
                                selectElement.append(optionElement);
                            });
                        } else {
                            // toastr.success(response.error);
                        }
                    }
                });
            });

            $('#subcategory').change(function () {
                var get_child_id = $('#subcategory').val();

                if (get_child_id == '0') {
                    $('#childsubcategory_sec').hide(500);
                } else {
                    $('#childsubcategory_sec').show(500);
                }

                $.ajax({
                    url: "{{route('set_child_sub_category')}}",
                    type: "get",
                    dataType: "json",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        get_child_id: get_child_id
                    },
                    success: function (response) {
                        if (response.status) {
                            const options = response.get_child_sub_category;
                            $('#childsubcategory').empty();
                            const selectElement = $('#childsubcategory');
                            options.forEach((option) => {
                                const { id, childsubcategory } = option;
                                const optionElement = $('<option></option>').attr('value', id).text(childsubcategory);
                                selectElement.append(optionElement);
                            });
                        } else {
                            // toastr.success(response.error);
                        }
                    }
                });
            });
        });

        // getval function (Attribute AJAX) - Kept as is
        function getval(sel) {
            var globelsel = sel;
            let value = sel.value;
            $.ajax({
                url: "{{ route('get-attributes')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    value: value
                },
                success: function (response) {
                    $(globelsel).parent().parent().find('.value').html('');
                    if (response.status) {
                        var html = '';
                        for (var i = 0; i < response.message.length; i++) {
                            html += '<option value="' + response.message[i].id + '">' + response.message[i].value + '</option>';
                        }
                        $(globelsel).parent().parent().find('.value').html(html);
                    }
                },
            });
        }
    </script>
@endpush