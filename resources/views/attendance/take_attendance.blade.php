@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                All Employees Attendance
                            </div>
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Date: {{ date("d/m/y") }}
                                <a class="pull-right btn btn-sm btn-success" href="{{ route('all.attendance') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>all Attendances</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Attendance</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <form action="{{ url('/insert-attendance') }}" method="post"> 
                                        @csrf   
                                            @foreach($employee as $row)
                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td><img src="{{ $row->photo }}" style="height: 80px;width: 80px"></td>
                                                <input type="hidden" name="user_id[]" value="{{ $row->id }}">
                                                <td>
                                                    <input type="radio" name="attendance[{{ $row->id }}]" value="Present" required="">Present
                                                    <input type="radio" name="attendance[{{ $row->id }}]" value="Absent" required="">Absent
                                                </td>
                                                <input type="hidden" name="att_date" value="{{ date("d/m/y") }}">
                                                <input type="hidden" name="att_year" value="{{ date("Y") }}">
                                                 <input type="hidden" name="month" value="{{ date("F") }}">
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-success">Take Attendance</button>
                                    </form>
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