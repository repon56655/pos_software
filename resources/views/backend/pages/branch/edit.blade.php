@extends('backend.mastaring.master')
    @section('majid')
       <div class="col-md-6">
            <form action="{{ Route('branch.update',$branch->id) }}" method="post">
                @csrf
                
                <input value="{{ $branch->name }}" type="text" name="name" placeholder="Enter Branch Name" class="mt-3 form-control">

                <input value="{{ $branch->manager }}" type="text" name="manager" placeholder="Enter Branch Name" class="mt-3 form-control">
               
                <input value="{{ $branch->phone }}" type="text" name="phone" placeholder="Enter Branch Name" class="mt-3 form-control">

                <input value="{{ $branch->email }}" type="text" name="email" placeholder="Enter Branch Name" class="mt-3 form-control">

                <select name="status" class="mt-3 form-control">
                    <option value="">-----Select Status-----</option>
                    <option value="1" @if( $branch->status==1 ) selected @endif>Active</option>
                    <option value="2" @if( $branch->status==2 ) selected @endif>Inactive</option>
                </select>

                <button class="mt-3 btn btn-success form-control">Add Branch</button>
            </form>
       </div>
    @endsection
        