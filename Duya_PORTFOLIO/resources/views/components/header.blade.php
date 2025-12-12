<html data-theme="dark" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-base-200">
    <div class="navbar bg-base-100 shadow-xl">
  <div class="flex-1">
    <a class="btn btn-ghost text-xl font-semibold"><span class="text-primary">@</span>MyPortfolioAdmin</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1 items-center">
        <li>
            <a href="#" class="btn btn-error btn-sm" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="/logout" method="POST" class="hidden">
                @csrf
            </form>
        </li>
    </ul>
  </div>

</div>