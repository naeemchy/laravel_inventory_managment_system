@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Single product view</h3> <i class="fas fa-table mr-1"></i>
                                Single Product<a class="pull-right btn btn-sm btn-success" href="{{ route('all.product') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>All Product</a></div>
                                    <div class="card-body">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Name</label>
                                                <input class="form-control py-4" type="text" name ="product_name" value="{{ $single->product_name }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Category</label>
                                                <input class="form-control py-4" type="text" name ="cat_id" value="{{ $single->cat_name }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Supplier</label>
                                                <input class="form-control py-4" type="text" name ="sup_id" value="{{ $single->name }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">product code</label>
                                                <input class="form-control py-4" type="text" name ="product_code" value="{{ $single->product_code }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">product garage</label>
                                                <input class="form-control py-4" type="text" name ="product_garage" value="{{ $single->product_garage }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">product route</label>
                                                <input class="form-control py-4" type="text" name ="product_route" value="{{ $single->product_route }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">buy date</label>
                                                <input class="form-control py-4" type="text" name ="buy_date" value="{{ $single->buy_date }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">expire date</label>
                                                <input class="form-control py-4" type="text" name ="expire_date" value="{{ $single->expire_date }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">buying price</label>
                                                <input class="form-control py-4" type="text" name ="buying_price" value="{{ $single->buying_price }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">selling price</label>
                                                <input class="form-control py-4" type="text" name ="selling_price" value="{{ $single->selling_price }}" />
                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Photo</label>
                                             	<img src="{{ URL::to($single->product_image) }}" style="height: 150px;width: 150px">  
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

<script type="text/javascript">
	function readURL(input){
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function (e){
				$('#image')
					.attr('src', e.target.result)
					.width(80)
					.height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
@endsection