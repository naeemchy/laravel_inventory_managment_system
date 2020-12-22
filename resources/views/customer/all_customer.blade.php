@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                All Customer List
                                <a class="pull-right btn btn-sm btn-success" href="{{ route('add.customer') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Add Customers</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Shopname</th>
                                                <th>Photo</th>
                                                <th>Bank Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($all_customer as $row)
                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->phone }}</td>
                                                <td>{{ $row->address }}</td>
                                                <td>{{ $row->shopname }}</td>
                                                <td><img src="{{ $row->photo }}" style="height: 80px;width: 80px"></td>
                                                <td>{{ $row->bank_name }}</td>
                                                <td>
                                                    <a href="{{URL::to("/view-customer/".$row->id)}}" class="btn btn-success">View</a>
                                                    <a href="{{URL::to("/edit-customer/".$row->id)}}" class="btn btn-success">Edit</a>
                                                    <a href="{{URL::to("/delete-customer/".$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                                </td>
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