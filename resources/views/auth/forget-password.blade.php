@extends('layouts.user')
@section('title', 'Forget Password')

@section('content')

  @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
      {{ session('status') }}
    </div>
  @endif
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <p class="text-red-500 text-sm">{{ $error }}</p>
    @endforeach

  @endif
  <form action="{{ route('password.email') }}" method="POST">
    @csrf
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
      <legend class="fieldset-legend">Forget Password</legend>
      <label class="label">Email</label>
      <input type="email" name="email" value="{{ old('email') }}" class="input" placeholder="Enter your email" />
      @error('email')
        <p class="text-red-500">{{ $message }}</p>
      @enderror
      <button class="btn btn-neutral mt-4" type="submit">Email Verification Code</button>
    </fieldset>
  </form>
@endsection
