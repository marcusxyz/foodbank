<p>Create your recipe<a href="{{ route('edit.recipe') }}"> here</a>.</p>

<p>You currently have {{$user->recipes->count()}} recipes</p>
<div>
    @foreach ($user->recipes as $recipe)
        <div style="border: 1px solid black; margin-bottom: 24px; padding: 16px;">
            <h2>{{ $recipe->title }}</h2>
            <a href="#">Edit</a>
            <a href="#">Remove</a>
        </div>
    @endforeach
</div>

