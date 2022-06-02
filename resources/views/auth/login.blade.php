
@extends('layouts.app')

@section('content')


<div class="registration-form">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <center>
            <h2 style="color: #0018ff; font-family: monospace;"><strong style="color: #ff0202;">Sign</strong> In</h2>
        </center><hr>

        <div class="form-group">
            <label>Email</label>
            <input id="email" type="email" class="form-control item @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email...">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group">
            <label>Password</label>
            <input id="password" type="password" class="form-control item @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password...">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group">
            <center>
                <button type="submit" class="btn btn-block create-account">
                {{ __('Signin') }}
            </button>
            </center>
        </div>
    </form>
</div>


@endsection