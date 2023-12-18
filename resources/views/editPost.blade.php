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

      <div class="p-5">
        <h1 class="text-center">Edit Post</h1>
        <form class="mx-auto" style="max-width: 28rem;" action="{{route('updatePost', $post-> id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('patch')
            <div class="form-group mb-4">
              <textarea required name="content" class="form-control" id="exampleFormControlTextarea1" placeholder="What is happening?!" rows="3">{{$post->content}}</textarea>
              <img src="{{($post->image != "") ? asset('/storage/image/'.$post->image) : ""}}" class="w-100 mx-auto" id="preview" >
            </div>

            <div class="form-group mb-4">
              <label class="" for="selectImage">{{($post->image != "") ? "Change Image" :   "Add Image"}}</label>
              <input type="file" class="form-control-file d-none" name="image" id="selectImage">
            </div>

            <div class="form-group mb-4 d-flex">
              <label class="w-100" for="inputState">Post as</label>
              <select class="form-select form-control" name="username">
                @foreach ($users as $user)
                  <option {{($user->id == $post->userId) ? 'selected' : '' }} value="{{$user->id}}">{{$user->username}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3 d-none">
                <input type="text" value="{{$post->likeCount}}" class="form-control" id="" name="likeCount">
            </div>
            
            <div class="mb-3 d-none">
                <input type="text" value="{{$post->timestamp}}" class="form-control" id="" name="timestamp">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>
</html>
