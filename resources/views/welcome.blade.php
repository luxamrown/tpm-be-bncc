<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Book</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>

    <div class="text-center mb-4">
        <h1 >Newest Post</h1>
        <a href="{{url('/create')}}" class="btn btn-primary">Create Post</a>
    </div>

    @foreach ($posts as $post)
    <div class="card bg-light mb-3 mx-auto" style="max-width: 24rem;">
        <div class="card-body">
            <div class="d-flex ">
                <h5 class="card-title">{{$post->user->nickname}}</h5>
                <p class="text-muted mx-2 ">{{$post->user->username}}</p>
            </div>
            <p class="card-text text-muted" style="font-size: 12px;">{{$post->timestamp}}</p>
            <p class="card-text">{{$post->content}}</p>
            @if($post->image != "")
                <img src="{{asset('/storage/image/'.$post->image)}}" class="card-img-top w-100 mx-auto" id="preview">
            @endif
            <hr/>
            <p class="card-text text-small text-muted" style="font-size: 12px;">{{$post->likeCount}} people liked this post</p>

            <div class="d-flex">
                <a href="{{route('edit', $post->id)}}" type="button" class="btn btn-outline-primary btn-sm">Edit</a>
                <form action="{{route('deletePost', $post->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger btn-sm mx-2">Delete</button>
                </form>
                {{-- <a href="{{route('deletePost', $post->id)}}" type="button" class="btn btn-outline-danger btn-sm">Delete</a> --}}
            </div>
        </div>
    </div>

    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
