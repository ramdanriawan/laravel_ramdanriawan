@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="userpic"><img src="{{ url("") }}/img/default_profile.png" alt=""></div>
                <div class="panel-body">
                    <h2 class="text-center">Edit User</h2>

                    @if(session()->get('success'))
                        <h2 class="text-center" style="color: green;">{{ session()->get('message') }}</h2>
                    @else
                        <h2 class="text-center" style="color: red;">{{ session()->get('message') }}</h2>
                    @endif

                    <form action="{{ route('setting.updateUser', ['user' => $user->id]) }}" method="post">
                        {{ csrf_field() }}

                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus
                                       value="{{ $user->username }}" readonly>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus
                                       value="{{ $user->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                       autocomplete="off">
                            </div>
                            <br>

                            <button type="submit" class="btn btn-lg btn-primary btn-block">Simpan</button>
                        </fieldset>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
