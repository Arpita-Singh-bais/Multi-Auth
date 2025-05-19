@extends('layouts.user')
@section('title', 'Forget Password')

@section('content')

  @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
      {{ session('status') }}
    </div>
  @endif
  @if ($errors->any())
    <div class="mb-4 font-medium text-sm text-red-600">
      {{ $errors->first() }}
    </div>
  @endif
  <form action="{{ route('password.verify.submit') }}" method="POST">
    @csrf
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
      <legend class="fieldset-legend">Verify Code</legend>
      <label class="label">Email</label>
      <input type="email" name="email" value="{{ old('email') }}" class="input" placeholder="Enter your email" />
      <label class="label">Code</label>
      <input type="code" name="code" value="{{ old('code') }}" class="input" placeholder="Enter your 6 digit code" />

      <button class="btn btn-neutral mt-4" type="submit">Submit</button>
    </fieldset>
  </form>
@endsection
