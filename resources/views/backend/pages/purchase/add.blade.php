@extends('backend.mastaring.master')
    @section('majid')
   <div class="col-md-6">
        <input type="date" class="form-control date mt-3">
        <select class="form-control br_id mt-3">
            <option value="">-----Select Branch-----</option>
            @foreach ($branch as $branch)
            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
        </select>
        <input type="text" class="form-control company_name mt-3" placeholder="Enter Company Name">
        <input type="text" class="form-control invoice mt-3" placeholder="Enter Invoice Number">
        <input readonly type="text" class="form-control astock mt-3" placeholder="Stock">
        <input type="text" class="form-control product_id mt-3" placeholder="Enter Product ID">

   </div>
   <div class="col-md-6">
        <input readonly type="text" class="form-control cost_price mt-3" placeholder="Enter Cost Price">
        <input type="text" class="form-control qnt mt-3" placeholder="Enter Quantity">
        <input readonly type="text" class="form-control total_amount mt-3" placeholder="Total Amount">
        <input type="text" class="form-control dis mt-3" placeholder="Enter Discount">
        <input readonly type="text" class="form-control dis_amount mt-3" placeholder="Enter Discount Amount">
        <input readonly type="text" class="form-control grand_total mt-3" placeholder="Grand Total Amount">
        <button type="submit" class="btn btn-success btn-purchaseAdd form-control mt-3">Save</button>

   </div>
    @endsection
        
        