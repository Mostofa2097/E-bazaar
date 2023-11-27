@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"> subCategory</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+ Add subCategory</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All subCategories list Hear</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example2" class="table table-bordered table-hover table-sm">
                        <thead>
                        <tr>
                          <th>SL</th>
                          <th>SubCategory Name</th>
                          <th>SubCategory Slug</th>
                          <th>Category Name</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $key=>$row)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->subcategory_name}}</td>
                            <td>{{$row->subcategory_slug}}</td>
                            <td>{{$row->category_name}}</td>
                            <td>
                              <a href="{{route('subcategory.edit', $row->id)}}" class="btn btn-info btn-sm " id="edit" ><i class="fa fa-edit"></i></a>
                              <a href="{{route('subcategory.delete', $row->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                            </td>
                            
                          </tr>
                          @endforeach
                       
                        
                        
                        </tbody>
                        
                      </table>
                </div>
              </div>
            </div>
        </div>
     </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="Post" action="{{route('subcategory.store')}}">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <select name="category_id" class="form-control">
                @foreach ($category as $row)
                    <option value="{{$row->id}}">{{$row->category_name}}</option>
                @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="subcategory_name" class="form-label">subCategory Name</label>
            <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" required>
            <div id="emailHelp" class="form-text">This is you main subcategory</div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
crossorigin="anonymous" referrerpolicy="no-referrer">
</script>


<script type="text/javascript">
$('body').on('click', '.edit', function(){ 
  Let cat_id = $(this).data('id'); 
  $.get("category/edit"+cat_id,function(data){
    $('#e_categorry_name').val(data.category_name);
    $('#e_categorry_id').val(data.id);
  });
});
</script>

@endsection
