<!DOCTYPE html>
<html data-theme="cupcake">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <div class="navbar bg-base-100 shadow-sm">
    <div class="flex-1">
      <a class="btn btn-ghost text-xl">User Layout</a>
    </div>
    <div class="flex-none">
      <ul class="menu menu-horizontal px-2">
        <li>
          <details>
            <summary>Profile</summary>
            <ul class="bg-base-100 rounded-t-none p-2">
              <form action="{{ route('user.logout') }}" method="POST">
                @csrf
                <li><button type="submit">Logouts</button></li>
              </form>
            </ul>
          </details>
        </li>
      </ul>
    </div>
  </div>

  <main class="pt-30 mx-auto w-fit">
    @yield('content')

  </main>
</body>

</html>
