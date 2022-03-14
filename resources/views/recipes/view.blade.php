<a href="{{ url()->previous() }}">Go back</a></p>
<h1>{{$recipes->title}}</h1>

<h3>Description</h3>
<p>{{$recipes->description}}</p>

<h3>Ingredients</h3>
<p>{{$recipes->ingredients}}</p>

<h3>Steps</h3>
<p>{{$recipes->recipe_steps}}</p>
