@extends('backend.mastaring.master')
    @section('majid')
       <div class="col-md-4">
            <span class="alert alert-success msg" style="display:none"></span>
            <input placeholder="Enter Product Name" type="text" class="name form-control mt-3">
            <span class="text-danger error_name"></span>
            <textarea placeholder="Enter Description" type="text" class="des form-control mt-3"></textarea>
            <span class="text-danger error_des"></span>
            <input placeholder="Enter Product Size" type="text" class="size form-control mt-3">
            <span class="text-danger error_size"></span>
            <input type="color" class="color form-control mt-3">
            <span class="text-danger error_color"></span>
            <input placeholder="Enter Product Code " type="text" class="product_code form-control mt-3">
            <span class="text-danger error_product_code"></span>
            <input placeholder="Enter Cost Price" type="number" class="cost_price form-control mt-3">
            <span class="text-danger error_cost_price"></span>
            <input placeholder="Enter Sale Price" type="number" class="sale_price form-control mt-3">
            <span class="text-danger error_sale_price"></span>
            <button class="btn-add btn btn-success form-control mt-3">Add Product</button>
       </div>
       <div class="col-md-8">
            <table class="table">
               <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Name</th>
                        <th>Cost Price</th>
                        <th>Sale Price</th>
                        <th>Action</th>
                    </tr>
               </thead>
               <tbody class="data">
                    
               </tbody>
            </table>
       </div>

<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are Really Want to Delete this Product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="delete btn btn-danger">Confrim</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input placeholder="Enter Product Name" type="text" class=" form-control mt-3"  id="name">
            
            <textarea placeholder="Enter Description" type="text" class=" form-control mt-3" id="des"></textarea>
            
            <input placeholder="Enter Product Size" type="text" class=" form-control mt-3" id="size">
            
            <input type="color" class=" form-control mt-3" id="color">
            
            <input placeholder="Enter Code" readonly type="text" class=" form-control mt-3" id="product_code">
           
            <input placeholder="Enter Cost Price" type="number" class=" form-control mt-3" id="cost_price">
            
            <input placeholder="Enter Sale Price" type="number" class=" form-control mt-3" id="sale_price">
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="edit btn btn-success">Update Product</button>
      </div>
    </div>
  </div>
</div>
    @endsection
        
        