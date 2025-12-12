<html data-theme="dark" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-base-200">
    <div class="navbar bg-base-100">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </div>
      <ul
        tabindex="0"
        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
        <li><a href="/">About me</a></li>
        <li><a href="/showAllGuest">Projects</a></li>
      </ul>
    </div>
    <a href="/" class="btn btn-ghost text-xl font-semibold"><span class="text-primary">@</span>MyPortfolio</a>
  </div>
  <div class="navbar-end">
    <ul class="menu menu-horizontal px-1 hidden lg:flex">
      <li><a href="/" class="font-semibold">About me</a></li>
      <li><a href="/showAllGuest" class="font-semibold">Projects</a></li>
    </ul>
  </div>
</div>