@if (Auth::guest())
<h2>Welcome to foodbank!</h2>
<p>You can login <a href="/login">here</a>.</p>
<p>Or register here <a href="/register">here</a>.</p>
@else
<h2>Hello, {{ $user->name }}!</h2>
<p>Get to your profile <a href="/profile">here</a>.</p>
<p>You can logout <a href="/logout">here</a>.</p>
@endif
