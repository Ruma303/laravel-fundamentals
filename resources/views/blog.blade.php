<h1>Sei nella pagina Blog</h1>
<form action={{ route('logout') }} method="POST">
    @csrf<button type="submit">Logout</button>
</form>
