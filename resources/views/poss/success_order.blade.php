@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                All Success Order List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Payment</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($success as $row)
                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->order_date }}</td>
                                                <td>{{ $row->total_products }}</td>
                                                <td>{{ $row->total }}</td>
                                                <td>{{ $row->payment_status }}</td>
                                                <td><span class="badge badge-success">{{ $row->order_status }}</span></td>
                                                <td>
                                                    <a href="{{URL::to("/view-order-status/".$row->id)}}" class="btn btn-success btn-sm">View</a>
                                                    
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