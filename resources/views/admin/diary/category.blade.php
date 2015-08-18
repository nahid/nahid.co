@extends('admin.layouts.master')

@section('contents')

<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Create New Category</h3>
              </div><!-- /.box-header -->
              <!-- form start -->

              @if(count($errors)>0)
              <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                  <li>{{$err}}</li>
                @endforeach
              </div>
              @endif
              @if(session('msg'))
              <div class="alert alert-success">
                {{session('msg')}}
              </div>
              @endif
              <form role="form" method="post" action="{{url('admin/diary/category')}}">
                <div class="box-body">
                  <div class="form-group">
                    <label for="category_name">Name</label><span class="text-danger">*</span>
                    <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Category Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Category Icon</label>
                    <input type="file" id="category_icon">

                  </div>

                </div><!-- /.box-body -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="box-footer">
                  <button type="submit" class="btn btn-success btn-lg">Save</button>
                </div>
              </form>
            </div><!-- /.box -->




          </div><!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Bordered Table</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Alias</th>

                      <th style="width: 40px">Action</th>
                    </tr>
                    @foreach($data['category'] as $cat)
                    <tr>
                      <td>{{$cat->id}}</td>
                      <td>{{$cat->category_name}}</td>
                      <td>{{$cat->category_alias}}</td>

                      <td><span class="badge bg-red">55%</span></td>
                    </tr>
                      @endforeach

                  </tbody></table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
                </div>
              </div>
        </div>
@endsection
