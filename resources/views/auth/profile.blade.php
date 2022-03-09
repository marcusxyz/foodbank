@extends('layouts.navigation')
@include('errors')

@section('content')
<main role="main">

    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading">Welcome {{$user->name}}!</h1>
            <p class="lead text-muted">Here can you create new recipes and see all recipes that you have liked.</p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
                <h2>My recipes</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2 class="card-title">{{$recipe->title}}</h2>
                            <p class="card-text">{{$recipe->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View recipe</button>
                                </div>
                                <small class="text-muted">By {{$user->name}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2 class="card-title">{{$recipe->title}}</h2>
                            <p class="card-text">{{$recipe->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View recipe</button>

                                </div>
                                <small class="text-muted">By {{$user->name}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2 class="card-title">{{$recipe->title}}</h2>
                            <p class="card-text">{{$recipe->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View recipe</button>

                                </div>
                                <small class="text-muted">By {{$user->name}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
                <h2>My likes recipes</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2 class="card-title">{{$recipe->title}}</h2>
                            <p class="card-text">{{$recipe->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View recipe</button>
                                </div>
                                <small class="text-muted">By {{$user->name}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2 class="card-title">{{$recipe->title}}</h2>
                            <p class="card-text">{{$recipe->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View recipe</button>

                                </div>
                                <small class="text-muted">By {{$user->name}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2 class="card-title">{{$recipe->title}}</h2>
                            <p class="card-text">{{$recipe->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View recipe</button>

                                </div>
                                <small class="text-muted">By {{$user->name}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
