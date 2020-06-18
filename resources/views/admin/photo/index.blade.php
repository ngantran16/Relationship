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
    <h3 style="text-align: center;">PHOTO'S INFORMATION</h3>
    <div class = "container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Title</th>
                <th>Categories</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <?php $i = 1?>
            <tbody>
                @foreach ($photos as $photo)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $photo->title }} </td>
                        <td> {{ $photo->category->name }} <br>
                            <a href="{{'/admin/photo/category/'.$photo->category->id}}">more</a>
                        </td>
                        <td> {{ $photo->image }} </td>
                        <td>
                            @foreach ($photo->tags as $tag)
                                {{ $tag->name }}
                                <br>
                            @endforeach
                            <a href="{{'/admin/photo/tags/'.$photo->id}}">more</a>
                        </td>
                        <td>
                            <form action="{{'/admin/photo/'.$photo->id.'/edit'}}" method="GET">
                                <button type="submit" class ="btn btn-link">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{'/admin/photo/'.$photo->id}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class = "btn btn-link">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
