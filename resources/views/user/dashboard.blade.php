@extends('layouts.user')
@section('title', 'UserDashboard')
@section('content')
  <div class="hero bg-base-100">
    <div class="hero-content text-center">
      <div class="max-w-md">
        <h1 class="text-5xl font-bold">User Dashboard</h1>
        <h2 class="text-xl font-semibold">Welcome {{ Auth::user()->name }}</h2>
        @csrf
        <p class="py-6">
          Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
          quasi. In deleniti eaque aut repudiandae et a id nisi.
        </p>
        <button class="btn btn-primary">Get Started</button>
      </div>
    </div>
  </div>
@endsection
