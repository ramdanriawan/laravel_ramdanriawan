@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-6 col-md-6 col-lg-6">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <h3>Add</h3>

                    @if(session()->has('success'))
                        @if(!session()->get('success'))
                            <strong style="color: red;">{{ session()->get('message') }}</strong>
                    @endif
                @endif

                <!-- Tab panes -->
                    <form method="post" action="{{ url(route('user.store')) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Username</label>
                            <input type="username" class="form-control" placeholder="username" name="username"
                                   value="{{ old('username') == '' ? '' : old('username') }}" required>

                            @if ($errors->has('username'))
                                <span class="bg-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="email" name="email"
                                   value="{{ old('email') == '' ? '' : old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="bg-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Password (Default: user1234)</label>
                            <input type="password" class="form-control" placeholder="password" name="password"
                                   value="{{ old('password') == '' ? '' : old('password') }}" required>

                            @if ($errors->has('password'))
                                <span class="bg-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <input type="hidden" name="level" value="admin">
                        <input type="hidden" name="status" value="active">

                        <div class="form-group">
                            <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" value="submit" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@endsection

