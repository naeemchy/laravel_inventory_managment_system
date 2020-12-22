@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><a class="pull-right btn btn-sm btn-success" href="{{ route('all.category') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>All Category</a><h3 class="text-center font-weight-light my-4">Category Update</h3></div>
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
                                        <form role="form" action="{{ url('/update-category/'.$edit->id) }}" method="post">
                                        @csrf
                                            
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Category</label>
                                                <input class="form-control py-4" type="text" name ="cat_name" value="{{ $edit->cat_name }}"/>
                                            </div>
                                           
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Update Category</button> 
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