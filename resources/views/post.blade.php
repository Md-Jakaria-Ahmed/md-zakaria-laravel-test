<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>



 <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-block-inline" href="{{ url('/') }}">
                    {{ config('app.name', 'Blog') }}
                   
                </a>
                <a href="{{ url('post') }}" class="text-dark font-weight-blod" style="text-decoration: none;">
                     <h5 class="m-auto">Blog-page</h5>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown float-right">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>




<div class="container">

  
  <div class="row">
  <div class="col-md-8">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Post List:</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-right">Action</th>
                    </tr>
                </thead>
              <tbody>
                @php 
                    $sr = 1;
                @endphp
                    @foreach($posts as $post)
                    <tr>
                      <th scope="row">{{ $sr++ }}</th>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->description }}</td>
                      <td>
                        <a href="{{ url('post/edit/'.$post->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('post/delete/'.$post->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                                 
                </tbody>
            </table>
        </div>
    </div>
</div>

  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h6 class="font-weight-bold">Add New Post</h6>
      </div>
  @if(session('success'))

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 @endif
   @if(session('delete'))

      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 @endif

      <div class="card-body">
        
        <form action="{{ url('blog/post_page') }}" method="POST">
          @csrf
            <div class="form-group mb-2">
              <label for="exampleInputEmail1">Post title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"  name="title">
              @error('title')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
            <div class="form-group mb-2">
              <label for="exampleInputEmail1">Description</label>
              <textarea class="form-control  @error('description') is-invalid @enderror" id="exampleInputEmail1"  name="description">
              </textarea>
               @error('description')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>

</div>

</body>
</html>