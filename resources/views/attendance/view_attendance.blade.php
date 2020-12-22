@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                View Employees Attendance :{{ $date->att_date }}
                            </div>
                            <div class="card-header">
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
                                   
                                            @foreach($edit as $row)
                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td><img src="{{ URL::to($row->photo) }}" style="height: 80px;width: 80px"></td>
                                                <input type="hidden" name="id[]" value="{{ $row->id }}">
                                                <td>
                                                    <input type="radio" name="attendance[{{ $row->id }}]" value="Present" disabled="" 
                                                    <?php if($row->attendance == 'Present'){echo "checked";}?>
                                                    >Present
                                                    <input type="radio" name="attendance[{{ $row->id }}]" value="Absent" disabled="" <?php if($row->attendance == 'Absent'){echo "checked";}?>>Absent
                                                </td>
                                                <input type="hidden" name="att_date" value="{{ date("d/m/y") }}">
                                                <input type="hidden" name="att_year" value="{{ date("Y") }}">
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
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