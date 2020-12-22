@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><a class="pull-right btn btn-sm btn-success" href="{{ route('all.supplier') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>All Suppliers</a><h3 class="text-center font-weight-light my-4">Single Supplier view</h3></div>
                                    <div class="card-body">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Name</label>
                                                <input class="form-control py-4" type="text" name ="name" value="{{ $single->name }}" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" type="email" name ="email" value="{{ $single->email }}" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Phone</label>
                                                <input class="form-control py-4" type="text" name ="phone" value="{{ $single->phone }}" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Address</label>
                                                <input class="form-control py-4" type="text" name ="address" value="{{ $single->address }}" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Shopname</label>
                                                @if($single->shop == NULL)
                                                <input class="form-control py-4" type="text" name ="shop" value="None" readonly="" />
                                                @else
                                                <input class="form-control py-4" type="text" name ="shop" value="{{ $single->shop }}" readonly/>
                                                @endif
                                            </div>
                                             <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Profession</label>
                                                <input class="form-control py-4" type="text" name ="type" value="{{ $single->type }}" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Account Holder</label>
                                                <input class="form-control py-4" type="text" name ="account_holder" value="{{ $single->account_holder }}" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Account Number</label>
                                                <input class="form-control py-4" type="text" name ="account_number" value="{{ $single->account_number }}" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Bank Name</label>
                                                <input class="form-control py-4" type="text" name ="bank_name" value="{{ $single->bank_name }}" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Bank Branch</label>
                                                <input class="form-control py-4" type="text" name ="branch_name" value="{{ $single->branch_name }}" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">City</label>
                                                <input class="form-control py-4" type="text" name ="city" value="{{ $single->city }}" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Photo</label>
                                             	<img src="{{ URL::to($single->photo) }}" style="height: 150px;width: 150px">  
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