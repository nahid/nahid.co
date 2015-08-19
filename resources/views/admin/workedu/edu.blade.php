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
              <form role="form" method="post" action="{{url('admin/resume/edu')}}">
                <div class="box-body">
                  <div class="form-group">
                    <label for="institute">Institute</label><span class="text-danger">*</span>
                    <input type="text" name="institute" class="form-control"  placeholder="Institute Name">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label><span class="text-danger">*</span>
                    <input type="text" name="address" class="form-control"  placeholder="Address">
                  </div>
                  <div class="row">
                     <div class="col-xs-6">
                        <div class="form-group">
                            <label for="start_year">Admission Year</label><span class="text-danger">*</span>
                            <select class="form-control" name="start_year">
                                @for($year=date('Y'); $year>=1990; $year--)
                                    <option value="{{$year}}">{{$year}}</option>

                                @endfor
                            </select>
                        </div>
                     </div>
                     <div class="col-xs-6">
                        <div class="form-group">
                            <label for="end_year">Passing Year</label><span class="text-danger">*</span>
                            <select class="form-control" name="end_year">
                                @for($year=date('Y'); $year>=1990; $year--)
                                    <option value="{{$year}}">{{$year}}</option>

                                @endfor
                                <option value="Continue">Continue</option>
                            </select>
                        </div>
                     </div>

                  </div>

                  <div class="form-group">
                    <label for="responsibility">Responsibility</label><span class="text-danger">*</span>
                    <input type="text" name="responsibility" class="form-control"  placeholder="Responsibility">
                  </div>

                  <div class="form-group">
                    <label for="note">Note</label><span class="text-danger">*</span>
                    <textarea name="note" class="form-control"  placeholder="Note"></textarea>
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
                  <h3 class="box-title">Educations List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Address</th>

                      <th style="width: 40px">Action</th>
                    </tr>
                    @foreach($data['edu'] as $edu)
                    <tr>
                      <td>{{$edu->id}}</td>
                      <td>{{$edu->institute}}</td>
                      <td>{{$edu->address}}</td>

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
