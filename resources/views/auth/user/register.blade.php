@extends('layouts.guest')
@section('title', 'Register')
@section('content')
  <h1 class="font-semibold text-center">User Register</h1>
  <form action="{{ route('auth.register') }}" method ="POST">
    @csrf
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
      <legend class="fieldset-legend">Register</legend>

      <label class="label">Name</label>
      <input type="text" name="name" class="input" value="{{ old('name') }}" placeholder="Name" />
      @error('name')
        <p class="text-error">{{ $message }}</p>
      @enderror

      <label class="label">Email</label>
      <input type="email" name="email" class="input" value="{{ old('email') }}" placeholder="Email" />
      @error('email')
        <p class="text-error">{{ $message }}</p>
      @enderror

      <label class="label">Password</label>
      <input type="password" name="password" class="input" placeholder="Password" />
      @error('password')
        <p class="text-error">{{ $message }}</p>
      @enderror

      <label class="label">Confirm Password</label>
      <input type="password" name="password_confirmation" class="input" placeholder="Confirm Password" />
      @error('password_confirmation')
        <p class="text-error">{{ $message }}</p>
      @enderror

      <button type="submit" class="btn btn-neutral mt-4">Register</button>
      <p class="label justify-center">Already have account? <a class="text-info font-semibold" href="{{ route('auth.login') }}">Login</a>
      </p>
    </fieldset>
  </form>
@endsection
