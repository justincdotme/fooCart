@extends('admin.layouts.admin-main')

@section('title')
    @parent Login
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Login</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="alert alert-info">
                                    <span><strong>Username:</strong> demo.user@justinc.me</span> <br />
                                    <span><strong>Password:</strong> demo123</span>
                                    <hr />
                                    <p class="small">
                                        * The application resets periodically.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <form class="form-horizontal" role="form" method="POST" action="/admin/login">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group col-md-12">
                                        <label class="control-label">E-Mail Address</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group col-sm-4 col-sm-offset-4">
                                        <div class="checkbox">
                                            <label class="control-label">
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-sm-4 col-sm-offset-4">
                                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
