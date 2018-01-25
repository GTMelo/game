<form action="/register" method="post">
    {{ csrf_field() }}
    <div class="input">
        <label for="name">Username</label>
        <input id="new_name" type="text" name="name">
    </div>
    <div class="input">
        <label for="password">Password</label>
        <input id="new_password" type="password" name="password">
    </div>
    <div class="input">
        <label for="password_confirmation">Password confirmation</label>
        <input id="new_password_confirmation" type="password" name="password_confirmation">
    </div>
    <div class="input">
        <label for="email">Email</label>
        <input id="new_email" type="email" name="email">
    </div>
    <input type="submit" id="new_submit" value="Start">
</form>