@extends('companyPages.layouts.app')
@section('title', 'Home')
@section('sideBarActivator_Home', 'class=active')

@section('pageSpecificHeadContent')
  {{-- EXTRA HEAD CONTENT --}}
@endsection

@section('body')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <strong class="text-success">Commercial Home</strong>
      <small>this is your Dashboard Home</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Title</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        Start creating your amazing application! <br>

        <form action="{{ route('python.test.url') }}" method="post" class="form-horizontal">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('myUrl') ? ' has-error' : '' }}">
            <label for="myUrl" class="col-md-3 control-label">URL<span class="text-red">*</span></label>
            <div class="col-md-6">
              <input type="text" class="form-control pull-right" id="myUrl" name="myUrl" placeholder="URL" value="{{ Auth::user()->myUrl }}">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-offset-5 col-md-2">
              <button type="submit" class="btn btn-success btn-block pull-right"><strong>Submit</strong></button>
            </div>
          </div>

        </form>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection

@section('pageSpecificLoadScripts')
  {{-- EXTRA SCRIPTS --}}
@endsection