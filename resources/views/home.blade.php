@extends('layouts.app')

@section('content')
@php
    $today = date('d/m/y');
    $total_customers = DB::table('customers')->select('id')->count('id');

    $orders_success = DB::table('orders')->where('order_status', 'success')->select('order_status')->count('order_status');

    $orders_pending = DB::table('orders')->where('order_status', 'pending')->select('order_status')->count('order_status');

    $total_employes = DB::table('employees')->select('id')->count('id');
@endphp
<main>
    <div class="container-fluid">
        <h2 class="mb-4 text-center">Mitaly Online Store Managment</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Mitaly Store</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                     <a href="{{ route('success.orders') }}"><div class="card-body text-white">Success Orders</div></a>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p>{{ $orders_success }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <a href="{{ route('panding.orders') }}"><div class="card-body text-white">Pending Orders</div></a>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p>{{ $orders_pending }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <a href="{{ route('all.employe') }}"><div class="card-body text-white">Total Employes</div></a>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                         <p>{{ $total_employes }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                     <a href="{{ route('all.customer') }}"><div class="card-body text-white">Total Customers</div></a>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p>{{ $total_customers }}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                     <a href="{{ route('all.category') }}"><div class="card-body text-white">All Category</div></a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                     <a href="{{ route('all.product') }}"><div class="card-body text-white">All Products</div></a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                     <a href="{{ route('today.expense') }}"><div class="card-body text-white">View Today Expense</div></a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
