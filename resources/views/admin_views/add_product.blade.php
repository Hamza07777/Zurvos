@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <form method="POST" action="{{ route('save_new_product') }}" enctype="multipart/form-data">
            @csrf
            <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">

                <div class="col-lg-12">
                        <h3 class="text-center">Add New Product</h3>

                </div>

                <div class="col-lg-12 mt-lg-5">
                    <label for="">Product Name </label>
                    <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus placeholder="Product Name">
                        @error('product_name')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="col-lg-12 mt-3">
                    <label for=""> Product Category</label>
                    <select class="form-control" name="product_type">
                        <optgroup label="Product Type">
                          <option value="fitness">Fitness</option>
                          <option value="Suppliments">Suppliments</option>
                          <option value="zurvos">Zurvos</option>                  
                        </optgroup>
                      </select>
                      @error('product_type')
                      <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="col-lg-12 mt-lg-5">
                    <label for="">Product Description </label>
                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="product_description" placeholder="Description"></textarea>
                    @error('product_description')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-lg-12 mt-lg-5">
                    <label for="">Product Price </label>
                    <input id="product_price" type="text" class="form-control @error('product_price') is-invalid @enderror" name="product_price" value="{{ old('product_price') }}" required autocomplete="product_price" autofocus placeholder="Product Price">
                    @error('product_price')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-12 mt-3">
                    <label for=""> Upload File</label>
                    <input id="image" class="p-0 form-control @error('image') is-invalid @enderror" required name="image" type="file" accept="image/jpeg, image/png, application/pdf" value="{{ old('image') }}" required style=" border: none;padding-bottom: 10%;"/>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-12 mt-lg-5 mb-lg-5">
                    <button type="submit" name="" id="" class="btn btn-primary btn-lg"  style="width: 100%">ADD PRODUCT</button>
                </div>

            </div>
        </form>
    </div>

</main>
@endsection

<!-- end::main content -->
