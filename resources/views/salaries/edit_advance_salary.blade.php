@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><a class="pull-right btn btn-sm btn-success" href="{{ route('all.advanced_salaries') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>All Advance Salary</a><h3 class="text-center font-weight-light my-4">Employ Advance Salary Update</h3></div>
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
                                        <form role="form" action="{{ url('/update-advance-selary/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Month</label>
                                                <select name="month" class="form-control">
                                                      <option value="{{ $edit->month }}">{{ $edit->month }}</option>
                                                      <option value="January">January</option>
                                                      <option value="February">February</option>
                                                      <option value="March">March</option>
                                                      <option value="April">April</option>
                                                      <option value="May">May</option>
                                                      <option value="June">June</option>
                                                      <option value="July">July</option>
                                                      <option value="August">August</option>
                                                      <option value="September ">September </option>
                                                      <option value="October ">October </option>
                                                      <option value="November ">November </option>
                                                      <option value="December ">December </option>
                                                </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Year</label>
                                                <input class="form-control py-4" type="text" name ="year" value="{{ $edit->year }}"/>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Advanced Salary</label>
                                                <input class="form-control py-4" type="text" name ="advanced_salary" value="{{ $edit->advanced_salary }}"/>
                                            </div>
                                           
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Update Advance Salary</button> 
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