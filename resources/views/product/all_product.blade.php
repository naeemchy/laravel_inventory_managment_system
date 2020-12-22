@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                All Products List<a class="pull-right btn btn-sm btn-success" href="{{ route('add.product') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>Add Product</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th> Name</th>
                                                <th>Code</th>
                                                <th>Selling Price</th>
                                                <th>Location</th>
                                                <th>Image</th>
                                                <th>Expire Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($all_product as $row)
                                            <tr>
                                                <td>{{ $row->product_name }}</td>
                                                <td>{{ $row->product_code }}</td>
                                                <td>{{ $row->selling_price }}</td>
                                                <td>{{ $row->product_route }}</td>
                                                <td><img src="{{ $row->product_image }}" style="height: 80px;width: 80px"></td>
                                                <td>{{ $row->expire_date }}</td>
                                                <td>
                                                    <a href="{{URL::to("/view-product/".$row->id)}}" class="btn btn-success">View</a>
                                                    <a href="{{URL::to("/edit-product/".$row->id)}}" class="btn btn-success">Edit</a>
                                                    <a href="{{URL::to("/delete-product/".$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
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