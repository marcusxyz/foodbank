@if (Auth::guest())
@if ($success = session('success'))
  <p style="color: green;">{{ $success }}</p>
@endif
<h1>Welcome to recipe bank!</h1>
<p>You can login <a href="{{route('login')}}">here</a>.</p>
<p>Or register here <a href="{{route('register')}}">here</a>.</p>
@else
<h1>Welcome to recipe bank, {{ $user->name }}!</h1>
<div style="width: 100%; display: flex; justify-content: space-between;">
    <p>Go to your profile <a href="{{route('user.profile')}}">here</a>.</p>
    <p>You can logout <a href="{{route('logout')}}">here</a>.</p>
</div>
@endif

<h2>All recipes ({{$recipes->count()}}) </h2>
<div>
    @foreach ($recipes as $recipe)
        <div style="border: 1px solid black; margin-bottom: 24px; padding: 16px;">
            <h2>{{ $recipe->title }}</h2>
            <p>{{ $recipe->description }}</p>
            <a href="/view/recipe:{{ $recipe->id }}">View recipe</a>
            <p>By: {{ $recipe->user->name }}</p>
        </div>
    @endforeach
</div>
