@extends('admin.layouts.master')

@section('contents')

<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Add New Education</h3>
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
              <form role="form" method="post" action="{{url('admin/resume/skills')}}">
                <div class="box-body">
                  <div class="form-group">
                    <label for="skill">Skill Name</label><span class="text-danger">*</span>
                    <input type="text" name="skill" class="form-control"  placeholder="Skill Name">
                  </div>

                  <div class="form-group">
                    <label for="skill_level">Skill Level</label><span class="text-danger">*</span>
                    <input type="number" name="skill_level" class="form-control"  placeholder="skill_level">
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
                  <h3 class="box-title">Skills List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Level</th>

                      <th style="width: 40px">Action</th>
                    </tr>
                    @foreach($data['skills'] as $skill)
                    <tr>
                      <td>{{$skill->id}}</td>
                      <td>{{$skill->skill}}</td>
                      <td>{{$skill->skill_range}}</td>

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
