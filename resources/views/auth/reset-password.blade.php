@extends('layouts.user')
@section('title', 'Forget Password')

@section('content')
  <form action="{{ route('password.update') }}" method="POST">
    @csrf
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
      <legend class="fieldset-legend">Forget Password</legend>

      <label class="label"> Password</label>
      <input type="password" class="input" name="password" placeholder="Enter your new Password" />
      @error('password')
        <span class="text-red-500">{{ $message }}</span>
      @enderror

      <label class="label">Confirm Password</label>
      <input type="password" class="input" name="password_confirmation" placeholder="Enter same password" />
      @error('password_confirmation')
        <span class="text-red-500">{{ $message }}</span>
      @enderror


      <button class="btn btn-neutral mt-4" type="submit">Submit</button>
    </fieldset>
  </form>
@endsection
