<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="input">
        <label for="name">Username</label>
        <input id="load_name" type="text" name="name">
    </div>
    <div class="input">
        <label for="password">Password</label>
        <input id="load_password" type="password" name="password">
    </div>
    <input type="submit" id="load_submit" value="Load Game">
</form>