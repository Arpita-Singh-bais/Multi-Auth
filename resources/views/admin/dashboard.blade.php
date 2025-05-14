@extends('layouts.admin')
@section('title', 'AdminDashboard')
@section('content')
  <div class="hero">
    <div class="hero-content text-center">
      <div class="max-w-md">
        <h1 class="text-5xl font-bold">Hello there Admin Dashboard</h1>
        <h2 class="text-xl font-semibold">Welcome {{ Auth::guard('admin')->user()->name }}</h2>
        <p class="py-6">
          Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
          quasi. In deleniti eaque aut repudiandae et a id nisi.
        </p>
        <button class="btn btn-primary">Get Started</button>
      </div>
    </div>
  </div>
@endsection
