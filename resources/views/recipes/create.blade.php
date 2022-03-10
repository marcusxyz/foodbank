@include('errors')
<p>Back to <a href="{{ route('user.profile') }}">Profile</a></p>
<h1>Create new recipe</h1>

<form action="{{route('recipes.create')}}" method="post">
    @csrf
    <label for="title">Title</label>

    <input name="title" id="title" type="text" />

    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>

    <label for="ingredients">Ingredients</label>
    <textarea name="ingredients" id="ingredients" cols="30" rows="10"></textarea>

    <label for="recipe_steps">Recipe Steps</label>
    <textarea name="recipe_steps" id="recipe_steps" cols="30" rows="10"></textarea>

    <button type="submit">Create Recipe</button>
</form>
