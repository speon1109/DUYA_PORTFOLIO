@include('components.header')
<div>
    <form action="/login" method="POST">
        @csrf
        <input name="email" type="email" placeholder="Enter your email">
        <input name="password" type="password" placeholder="Enter your password">
        <button>Login</button>
    </form>
</div>
@include('components.footer')