@extends('layouts.guest')
@section('title', 'Login')
@section('content')

  <h1 class="font-semibold text-center">User Login </h1>
  <form action="{{ route('auth.login') }}" method="POST">
    @csrf
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
      <legend class="fieldset-legend ">Login</legend>

      <label class="label">Email</label>
      <input type="email" name="email" class="input" placeholder="Email" />
      @error('email')
        <p class="text-error">
          <span>{{ $message }}</span>
        </p>
      @enderror

      <label class="label">Password</label>
      <input type="password" name="password" class="input" placeholder="Password" />
      @error('password')
        <p class="text-error">
          <span>{{ $message }}</span>
        </p>
      @enderror
      <div class="flex justify-between align-middle">
        <div>
          <label class="label">
            <input type="checkbox" name="remember" checked="checked" class="checkbox" />
            Remember me
          </label>
          @error('remeber')
            <p class="text-error">
              <span>{{ $message }}</span>
            </p>
          @enderror
        </div>
        <div>
          <p class="label text-info"> <a href="{{ route('password.request') }}"> Forgot Password </a> </p>
        </div>
      </div>
      <button type="submit" class="btn btn-neutral mt-4">Login</button>
      <p class="label justify-center">Dont have account? <a class="text-info font-semibold" href="{{ route('auth.register') }}">Register</a>
      </p>
    </fieldset>
  </form>
@endsection
