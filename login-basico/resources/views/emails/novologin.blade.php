<html>
<body>
<h4>Bem vindo(a) ao sistema, {{ $nome }}!</h4>

<p>Você acabou de acessar o sistema com o email: {{ $email }} </p>

<p>Data/Hora de acesso: {{ $data_hora_acesso }}</p>

<div>
    <img width="10%" height="10%" src="{{ $message->embed(public_path().'/img/laravel.png') }}">
</div>
</body>
</html>
