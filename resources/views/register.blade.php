<form action="register" method="post">
    @csrf
    <div>
        <label for="name">Name</label>
        <input name="name" id="name" type="name" required />
    </div>
    <div>
        <label for="email">Email</label>
        <input name="email" id="email" type="email" required />
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password" type="password" required />
    </div>
    <button type="submit">Sign up</button>
</form>
<a href="/">Log in here</a>
