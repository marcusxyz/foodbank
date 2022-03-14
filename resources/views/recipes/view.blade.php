@if (Auth::guest())
<p>Back to <a href="{{ route('dashboard') }}">Dashboard</a></p>
@else
<p>Back to <a href="{{ route('user.profile') }}">Profile</a></p>
@endif
<h1>{{$recipes->title}}</h1>

<h3>Description</h3>
<p>{{$recipes->description}}</p>

<h3>Ingredients</h3>
<p>{{$recipes->ingredients}}</p>

<h3>Steps</h3>
<p>{{$recipes->recipe_steps}}</p>
