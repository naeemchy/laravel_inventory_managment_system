@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><a class="pull-right btn btn-sm btn-success" href="{{ route('all.supplier') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>All Supplier</a><h3 class="text-center font-weight-light my-4">Single Supplier Update</h3></div>
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
                                        <form role="form" action="{{ url('/update-supplier/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Name</label>
                                                <input class="form-control py-4" type="text" name ="name" value="{{ $edit->name }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" type="email" name ="email" value="{{ $edit->email }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Phone</label>
                                                <input class="form-control py-4" type="text" name ="phone" value="{{ $edit->phone }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Address</label>
                                                <input class="form-control py-4" type="text" name ="address" value="{{ $edit->address }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Shop</label>
                                                @if($edit->shop == NULL)
                                                <input class="form-control py-4" type="text" name ="shop" value="None" />
                                                @else
                                                <input class="form-control py-4" type="text" name ="shop" value="{{ $edit->shop }}"/>
                                                @endif
                                            </div>
                                             <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Profession</label>
                                                <input class="form-control py-4" type="text" name ="type" value="{{ $edit->type }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Account Holder</label>
                                                <input class="form-control py-4" type="text" name ="account_holder" value="{{ $edit->account_holder }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Account Number</label>
                                                <input class="form-control py-4" type="text" name ="account_number" value="{{ $edit->account_number }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Bank Name</label>
                                                <input class="form-control py-4" type="text" name ="bank_name" value="{{ $edit->bank_name }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"> Branch Name</label>
                                                <input class="form-control py-4" type="text" name ="branch_name" value="{{ $edit->branch_name }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">City</label>
                                                <input class="form-control py-4" type="text" name ="city" value="{{ $edit->city }}"/>
                                            </div>
                                            <div class="form-group">
                                                <img src="" id="image">
                                                <label class="small mb-1" for="inputEmailAddress">Update Photo</label>
                                                <input type="file" name ="photo" accept="image/*" class="upload" onchange="readURL(this);"/>
                                            </div>
                                            <div class="form-group">
                                            
                                             	<img src="{{ URL::to($edit->photo) }}" name="old_photo" style="height: 100px;width: 100px">  
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Update Supplier</button> 
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