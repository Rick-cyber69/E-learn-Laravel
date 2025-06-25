<form method="POST" action="/register">
    @csrf
    <input name="name" placeholder="Name">
    <input name="email" placeholder="Email">
    <input name="password" type="password" placeholder="Password">
    <input name="password_confirmation" type="password" placeholder="Confirm Password">
    <button type="submit">Register</button>
</form>
