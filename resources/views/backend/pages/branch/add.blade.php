@extends('backend.mastaring.master')
    @section('majid')
       <div class="col-md-6">
            <form action="{{ Route('branch.store') }}" method="post">
                @csrf
                
                <input value="{{ old('name') }}" type="text" name="name" placeholder="Enter Branch Name" class="mt-3 form-control">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
                <input value="{{ old('manager') }}" type="text" name="manager" placeholder="Enter Branch Manager Name" class="mt-3 form-control">
                <span class="text-danger">
                    @error('manager')
                        {{ $message }}
                    @enderror
                </span>                
                <input value="{{ old('phone') }}" type="text" name="phone" placeholder="Enter Branch Phone Number" class="mt-3 form-control">
                <span class="text-danger">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </span>
                <input value="{{ old('email') }}" type="text" name="email" placeholder="Enter Branch Email" class="mt-3 form-control">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
                <select name="status" class="mt-3 form-control">
                    <option value="">-----Select Status-----</option>
                    <option value="1" @if( old('status')==1 ) selected @endif>Active</option>
                    <option value="2" @if( old('status')==2 ) selected @endif>Inactive</option>
                </select>
                <span class="text-danger">
                    @error('status')
                        {{ $message }}
                    @enderror
                </span>
                <button class="mt-3 btn btn-success form-control">Add Branch</button>
            </form>
       </div>
    @endsection
        