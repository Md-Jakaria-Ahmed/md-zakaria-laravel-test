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

<div style="margin-top:100px"></div>
<div class="container">
  
  <div class="row">

  <div class="col-md-8 m-auto">
    <div class="card">
      <div class="card-header">
        <h6 class="font-weight-bold">Update Post</h6>
      </div>
  @if(session('success'))

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 @endif

      <div class="card-body">
        
        <form action="{{ url('post/update/'.$data->id) }}" method="POST">
          @csrf
            <div class="form-group mb-2">
              <label for="title">Post title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"  name="title" value="{{ $data->title }}">
              @error('title')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
            <div class="form-group mb-2">
              <label for="des">Description</label>
              <input  type="text" class="form-control  @error('description') is-invalid @enderror" id="des" value="{{ $data->description }}" name="description">
            
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