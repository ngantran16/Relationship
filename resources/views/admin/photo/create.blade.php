<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class = "container">

        <form method="POST" action="/admin/photos" class = "form" enctype="multipart/form-data" >
            @csrf
            <h3 style="text-align: center;">ADD A PHOTO</h3>
            <div class="form-group">
                <label for="title">Title:</label>
                <input id="title" class="form-control" placeholder="Enter title" name = "title">
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" name="category" id="category">
                    @foreach ($categories as $category)
                        <option value = "{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">Tags:</label>
                <select class="form-control" name="tags[]" id="tags" multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value = "{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input class="form-control" placeholder="Enter image" type = "file" name = "image">
            </div>

            <div class="form-group">
                <label for="image">Description:</label>
                <input class="form-control" placeholder="Enter description" name = "description">
            </div>

            <button class="btn btn-primary" type = "submit">Submit</button>
        </form>
    </div>
</body>
</html>
