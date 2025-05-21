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
                    <form method="post" action="{{ url(route('patient.store')) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>HospitalName</label>

                            <select name="hospitalId" class="form-control" id="select2-1">
                                <option
                                        value="">-- Select Hospital --
                                </option>
                            </select>

                            @if ($errors->has('hospitalName'))
                                <span class="bg-danger">{{ $errors->first('hospitalName') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>PatientName</label>
                            <input type="text" class="form-control" placeholder="patientName" name="patientName"
                                   value="{{ old('patientName') == '' ? '' : old('patientName') }}" required>

                            @if ($errors->has('patientName'))
                                <span class="bg-danger">{{ $errors->first('patientName') }}</span>
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

@section('script-in-this-page')
    <script>
        $(document).ready(function () {
            // Inisialisasi Select2
            $('#select2-1').select2({
                placeholder: "Pilih Rumah Sakit",
                ajax: {
                    url: "{{ route('api.v1.web.hospital.select2') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {

                        return {
                            results: data.items.map(function (item) {
                                return {id: item.id, text: item.hospitalName};
                            })
                        };
                    },
                    cache: true
                }
            });
        });
    </script>

@endsection

