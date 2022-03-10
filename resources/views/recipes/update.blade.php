<div>
    <label for="select-recipe">Choose a recipe to edit: </label>
    <select name="recipe" id="select-recipe">
        @foreach ($recipes as $recipe)
            <option value="{{$recipe->id}}" @if($post->recipe->contains($recipe->id)) selected @endif>{{ $recipe->title }}</option>
       @endforeach
    </select>
</div>

<form action="{{ route('update.recipe') }}" method="POST">
    @csrf
    @method('PATCH')
    <label for="title">Title</label>
    <input name="title" id="title" type="text" />

    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>

    <label for="ingredients">Ingredients</label>
    <textarea name="ingredients" id="ingredients" cols="30" rows="10"></textarea>

    <label for="recipe_steps">Recipe Steps</label>
    <textarea name="recipe_steps" id="recipe_steps" cols="30" rows="10"></textarea>

        <button type="submit">Update Recipe</button>
    </form>
</form>

<form action="{{ route('delete.recipe', $recipe) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Delete recipe</button>
</form>
