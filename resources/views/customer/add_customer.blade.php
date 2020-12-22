@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Customers</h3></div>
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
                                        <form action="{{ url('/insert-customer') }}" method="POST" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Name**</label>
                                                <input class="form-control py-4" type="text" name ="name" placeholder="Enter Name" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" type="email" name ="email" placeholder="Enter Email" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Phone**</label>
                                                <input class="form-control py-4" type="text" name ="phone" placeholder="Enter Phone" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Address**</label>
                                                <input class="form-control py-4" type="text" name ="address" placeholder="Enter Address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Shopname</label>
                                                <input class="form-control py-4" type="text" name ="shopname" placeholder="Enter Shopname" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Account Holder</label>
                                                <input class="form-control py-4" type="text" name ="account_holder" placeholder="Enter account holder" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Account Number</label>
                                                <input class="form-control py-4" type="text" name ="account_number" placeholder="Enter Account Number" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Bank Name</label>
                                                <input class="form-control py-4" type="text" name ="bank_name" placeholder="Enter bank Name" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Bank Branch</label>
                                                <input class="form-control py-4" type="text" name ="bank_branch" placeholder="Enter bank Branch" />
                                            </div> 
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">City</label>
                                                <input class="form-control py-4" type="text" name ="city" placeholder="Enter Employ City" />
                                            </div>

                                            <div class="form-group">
                                            	<img src="" id="image">
                                                <label class="small mb-1" for="inputEmailAddress">Photo</label>
                                                <input type="file" name ="photo" accept="image/*" class="upload" onchange="readURL(this);"/>
                                            </div>
                                           
                                          
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary">Add customer</button> 
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