@include('components.header')
<div>
    <form action="/register" method="POST">
        @csrf
        <input name="name" type="text" placeholder="Enter your name">
        <input name="email" type="email" placeholder="Enter your email">
        <input name="password" type="password" placeholder="Enter your password">
        <button>Register</button>
    </form>
</div>
@include('components.footer')