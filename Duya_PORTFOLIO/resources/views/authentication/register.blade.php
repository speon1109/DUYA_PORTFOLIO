@include('components.header')
@if ($errors->any())
    <div style="color:red;">
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif
<div>
    <form action="/register" method="POST">
        @csrf
        <input name="name" type="text" placeholder="Enter your name">
        <input name="email" type="email" placeholder="Enter your email">
        <input name="password" type="password" placeholder="Enter your password">
        <input name="password_confirmation" type="password" placeholder="Confirm your password">
        <button>Register</button>
    </form>
</div>
@include('components.footer')