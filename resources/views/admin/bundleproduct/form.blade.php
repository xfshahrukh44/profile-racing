<div class="form-body">
    <div class="row">

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
                <select name="childsubcategory" id="childsubcategory" class="form-control"></select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('product_title', 'Product Title') !!}
                {!! Form::text('product_title', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>

        {{-- Product type fix kar diya bundle par --}}
        <input type="hidden" name="type" value="bundle">

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

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                <input class="form-control dropify" name="image" type="file" id="image" required>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('additional_image', 'Gallery Images') !!}
                <input class="form-control dropify" name="images[]" type="file" id="images" multiple>
            </div>
        </div>

        <div id="bundle-section">
            <div class="col-md-12">
                <h4 class="card-title">Bundle Items</h4>
            </div>

            <div class="repeater-bundle col-md-12">
                <div data-repeater-list="bundle_items">
                    <div data-repeater-item class="row">

                        <div class="form-group mb-1 col-sm-12 col-md-6">
                            <label>Select Product</label>
                            <select class="form-control" name="product_id" required>
                                <option value="">-- Select Product --</option>
                                @foreach($allProducts as $p)
                                    <option value="{{ $p->id }}">{{ $p->product_title }} ({{ $p->sku }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-1 col-sm-12 col-md-4">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="1" min="1">
                        </div>

                        <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                            <button type="button" class="btn btn-danger" data-repeater-delete>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('.repeater-bundle').repeater({
            initEmpty: false,

            defaultValues: {
                'product_id': '',
                'quantity': 1
            },
            show: function () {

                $(this).slideDown(300, function () {

                });
            },
            hide: function (deleteElement) {
                $(this).slideUp(300, deleteElement);
            }
        });
    });
</script>

<script>

    $(document).ready(function () {

        $('#subcategory_sec').hide();


        $('#category').change(function () {

            var get_id = $('#category').val();

            // alert(get_id);

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

                        console.log(response.getsub_category);
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
                        toastr.success(response.error);
                    }


                }
            });

        });


        // Child Sub-Category Section

        $('#childsubcategory_sec').hide();

        $('#subcategory').change(function () {

            var get_child_id = $('#subcategory').val();

            // alert(get_child_id);

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

                        console.log(response.get_child_sub_category);

                        const options = response.get_child_sub_category;

                        $('#childsubcategory').empty();

                        const selectElement = $('#childsubcategory');

                        options.forEach((option) => {

                            const { id, childsubcategory } = option;
                            const optionElement = $('<option></option>').attr('value', id).text(childsubcategory);
                            selectElement.append(optionElement);

                        });


                    } else {

                        toastr.success(response.error);

                    }


                }
            });




        });






    });



</script>