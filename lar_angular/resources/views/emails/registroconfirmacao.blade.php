<html>
    <body>
        <h4>Seja bem vindo, {{ $nome }}</h4>
        <p>Você acessou o sistema com email: {{ $email }}</p>
        <p>Data/Hora de acesso: {{ $datahora }}</p>
        <p>Clique no link abaixo para confirmar seu email de registro:</p>
        <a href="{{ $link }}">CLIQUE AQUI</a>
    </body>
</html>