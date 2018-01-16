<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog Home</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog-home.css" rel="stylesheet">

  </head>

  <body>

<div class="container">

  <div class="row">
<br>
    <!-- Blog Entries Column -->
    <div class="col-md-8">
<h1>{{ $post->title }}</h1>

<h5>{{ $post->body }}</h5>
        
  </div>
  <!-- /.row -->

</div>
</body>
</html>