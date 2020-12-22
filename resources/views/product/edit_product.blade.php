@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <a class="pull-right btn btn-sm btn-success" href="{{ route('all.product') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>Single Product Edit</a>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Product Edit</h3></div>
                                    @if ($errors->any())
                  									    <div class="alert alert-danger">
                  									        <ul>
                  									            @foreach ($errors->all() as $error)
                  									                <li>{{ $error }}</li>
                  									            @endforeach
                  									        </ul>
                  									    </div>
                  									@endif

                                    <div class="card-body">
                                        <form role="form" action="{{ url('/update-product/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                            
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Product Name</label>
                                                <input class="form-control py-4" type="text" name ="product_name" value="{{$edit->product_name}}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Product Code</label>
                                                <input class="form-control py-4" type="text" name ="product_code" value="{{$edit->product_code}}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Product Garage</label>
                                                <input class="form-control py-4" type="text" name ="product_garage" value="{{$edit->product_garage}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Product Route</label>
                                                <input class="form-control py-4" type="text" name ="product_route" value="{{$edit->product_route}}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Buying Date</label>
                                                <input class="form-control py-4" type="date" name ="buy_date" value="{{$edit->buy_date}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Expire Date</label>
                                                <input class="form-control py-4" type="date" name ="expire_date" value="{{$edit->expire_date}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Buying Price</label>
                                                <input class="form-control py-4" type="text" name ="buying_price" value="{{$edit->buying_price}}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Selling Price</label>
                                                <input class="form-control py-4" type="text" name ="selling_price" value="{{$edit->selling_price}}" />
                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Category Name</label>
                                                @php
                                                	$cat = DB::table('categories')->get();
                                                @endphp
                                                <select name="cat_id" class="form-control">
                                                  @foreach($cat as $row)
                                                  	<option value="{{$row->id}}" <?php if($edit->cat_id == $row->id){ echo "selected";} ?>>{{$row->cat_name}}</option>
                                                  @endforeach	
												</select>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Supplyer Name</label>
                                                @php
                                                	$supp = DB::table('suppliers')->get();
                                                @endphp
                                                <select name="sup_id" class="form-control">
                                                  @foreach($supp as $row)
                                                  	<option value="{{$row->id}}" <?php if($edit->sup_id == $row->id){ echo "selected";} ?>>{{$row->name}}</option>
                                                  @endforeach	
												</select>
                                            </div>

                                            <div class="form-group">
                                                <img src="" id="image">
                                                <label class="small mb-1" for="inputEmailAddress">Update Photo</label>
                                                <input type="file" name ="product_image" accept="image/*" class="upload" onchange="readURL(this);"/>
                                            </div>
                                            <div class="form-group">
                                            
                                                <img src="{{ URL::to($edit->product_image) }}" name="old_photo" style="height: 100px;width: 100px">  
                                            </div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary">Update Product</button> 
                                            </div>
                                        </form>
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