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
              <form role="form" method="post" action="{{url('admin/diary/tags')}}">
                <div class="box-body">
                  <div class="form-group">
                    <label for="tag_name">Name</label><span class="text-danger">*</span>
                    <input type="text" name="tag_name" class="form-control" id="tag_name" placeholder="Tag Name">
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
                    <div class="tagcloud">
                        @foreach($data['tags'] as $tag)
                          <a href="#" class="hover-animate">{{$tag->tag_name}}</a>
                        @endforeach

                    </div>
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
