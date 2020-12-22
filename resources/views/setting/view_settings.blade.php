@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Company Information</h3></div>
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
                                        <form role="form" action="{{ url('/update-website/'.$setting->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Company Name</label>
                                                <input class="form-control py-4" type="text" name ="company_name" value="{{ $setting->company_name }}" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" type="email" name ="company_email" value="{{ $setting->company_email }}" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Company Phone</label>
                                                <input class="form-control py-4" type="text" name ="company_phone" value="{{ $setting->company_phone }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Company Address</label>
                                                <input class="form-control py-4" type="text" name ="company_address" value="{{ $setting->company_address }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Company Mobile</label>
                                                <input class="form-control py-4" type="text" name ="company_mobile" value="{{ $setting->company_mobile }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Company City</label>
                                                <input class="form-control py-4" type="text" name ="company_city" value="{{ $setting->company_city }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Company Country</label>
                                                <input class="form-control py-4" type="text" name ="company_country" value="{{ $setting->company_country }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Company Zipcode</label>
                                                <input class="form-control py-4" type="text" name ="company_zipcode" value="{{ $setting->company_zipcode }}" />
                                            </div>
                                            
                                            <div class="form-group">
                                                <img src="" id="image">
                                                <label class="small mb-1" for="inputEmailAddress">Update Photo</label>
                                                <input type="file" name ="company_logo" accept="image/*" class="upload" onchange="readURL(this);"/>
                                            </div>
                                            <div class="form-group">
                                            
                                             	<img src="{{ URL::to($setting->company_logo) }}" name="old_photo" style="height: 100px;width: 100px">  
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Update Settings</button> 
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