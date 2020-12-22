@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Single employee Update</h3></div>
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
                                        <form role="form" action="{{ url('/update-employee/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Name</label>
                                                <input class="form-control py-4" type="text" name ="name" value="{{ $edit->name }}" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" type="email" name ="email" value="{{ $edit->email }}" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Phone</label>
                                                <input class="form-control py-4" type="text" name ="phone" value="{{ $edit->phone }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Address</label>
                                                <input class="form-control py-4" type="text" name ="address" value="{{ $edit->address }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Experience</label>
                                                <input class="form-control py-4" type="text" name ="experience" value="{{ $edit->experience }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">NID NO:</label>
                                                <input class="form-control py-4" type="text" name ="nid" value="{{ $edit->nid }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Salary</label>
                                                <input class="form-control py-4" type="text" name ="salary" value="{{ $edit->salary }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Vacation</label>
                                                <input class="form-control py-4" type="text" name ="vacation" value="{{ $edit->vacation }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">City</label>
                                                <input class="form-control py-4" type="text" name ="city" value="{{ $edit->city }}" />
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
                                                <button type="submit" class="btn btn-primary">Update Employee</button> 
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