@extends('layouts.admin')

@section('admin_content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('update subCategory') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('subcategory.update',$data->id)}}">
                        @csrf
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <select name="category_id" class="form-control">
                                @foreach ($category as $row)
                                    <option value="{{$row->id}}">{{$row->category_name}}</option>
                                @endforeach
                            </select>
                          </div>
                    
                          <div class="form-group">
                            <label for="exampleInputEmail1">subCategory Name</label>
                            <br>
                            <input type="text" class="form-control  @error('subcategory_name') is-invalid @enderror"  name="subcategory_name"
                             value="{{ $data->subcategory_name }}" required 
                            placeholder="Enter Category Name">
                            @error('subcategory_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                          </div>
                        <button type="submit" class="btn btn-primary">update</button>
                      </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>

  @endsection