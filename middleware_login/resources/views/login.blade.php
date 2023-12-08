<form action="{{ url('login') }}" method="post">
    @csrf
    <input name="user" type="text">
    <input name="passwd" type="password">
    <button type="submit">Logar</button>
</form>
