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
                    <form method="post" action="{{ url(route('hospital.store')) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>HospitalName</label>
                            <input type="text" class="form-control" placeholder="hospitalName" name="hospitalName"
                                   value="{{ old('hospitalName') == '' ? '' : old('hospitalName') }}" required>

                            @if ($errors->has('hospitalName'))
                                <span class="bg-danger">{{ $errors->first('hospitalName') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="address" class="form-control" placeholder="address" name="address"
                                   value="{{ old('address') == '' ? '' : old('address') }}" required>

                            @if ($errors->has('address'))
                                <span class="bg-danger">{{ $errors->first('address') }}</span>
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
                            <label>Phone</label>
                            <input type="number" class="form-control" placeholder="phone" name="phone"
                                   value="{{ old('phone') == '' ? '' : old('phone') }}" required minlength="9">

                            @if ($errors->has('phone'))
                                <span class="bg-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

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

