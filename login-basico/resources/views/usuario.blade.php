@auth
    <p>Você está logado!</p>
    <p> {{ Auth::user()->name }}</p>
    <p> {{ Auth::user()->email }}</p>
    <p> {{ Auth::user()->id }}</p>
@endauth

@guest
    <p>Você NÃO está logado!</p>
@endguest
