@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Single employee view</h3></div>
                                    <div class="card-body">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Name</label>
                                                <input class="form-control py-4" type="text" name ="name" value="{{ $single->name }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" type="email" name ="email" value="{{ $single->email }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Phone</label>
                                                <input class="form-control py-4" type="text" name ="phone" value="{{ $single->phone }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Address</label>
                                                <input class="form-control py-4" type="text" name ="address" value="{{ $single->address }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Experience</label>
                                                <input class="form-control py-4" type="text" name ="experience" value="{{ $single->experience }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">NID NO:</label>
                                                <input class="form-control py-4" type="text" name ="nid" value="{{ $single->nid }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Salary</label>
                                                <input class="form-control py-4" type="text" name ="salary" value="{{ $single->salary }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Vacation</label>
                                                <input class="form-control py-4" type="text" name ="vacation" value="{{ $single->vacation }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">City</label>
                                                <input class="form-control py-4" type="text" name ="city" value="{{ $single->city }}" />
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