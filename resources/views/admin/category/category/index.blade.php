@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"> Category</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+ Add Category</button>
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
                  <h3 class="card-title">All Categories list Hear</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>SL</th>
                          <th>Category Name</th>
                          <th>Category Slug</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $key=>$row)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->category_name}}</td>
                            <td>{{$row->category_slug}}</td>
                            <td>
                              <a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>
                              <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

@endsection
