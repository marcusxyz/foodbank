@extends('layouts.app')

@section('content')
<main role="main">

    <section class="jumbotron text-center py-5">
        <div class="container">
            @if (Auth::guest())
            <h1 class="jumbotron-heading">Welcome to foodbank!</h1>
            <p class="lead text-muted">Something short about foodbank.</p>
            <p>
                <a href="login" class="btn btn-primary my-2">Log in</a>
                <a href="register" class="btn btn-outline-primary my-2">Create an account</a>
            </p>
            @else

            <h1 class="jumbotron-heading">Welcome to foodbank!</h1>
            <p class="lead text-muted">Something short about foodbank.</p>
            @endif
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2 class="card-title">Recipe title</h2>
                            <p class="card-text">Recipe description ipsam laboriosam nulla doloribus, assumenda perferendis, magni nemo vitae perspiciatis voluptatibus recusandae, odit accusantium!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View recipe</button>
                                </div>
                                <small class="text-muted">By User</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2 class="card-title">Recipe title</h2>
                            <p class="card-text">Recipe description ipsam laboriosam nulla doloribus, assumenda perferendis, magni nemo vitae perspiciatis voluptatibus recusandae, odit accusantium!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View recipe</button>

                                </div>
                                <small class="text-muted">By User</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2 class="card-title">Recipe title</h2>
                            <p class="card-text">Recipe description ipsam laboriosam nulla doloribus, assumenda perferendis, magni nemo vitae perspiciatis voluptatibus recusandae, odit accusantium!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View recipe</button>

                                </div>
                                <small class="text-muted">By User</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
