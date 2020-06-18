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
    <h3 style="text-align: center;">TAGS' INFORMATION</h3>
    <div class = "container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <?php
                $i = 1;
                $tags = $tags->tags;
            ?>
            @foreach($tags as $tag)
            <tbody>
                <tr>
                    <td> {{ $i++ }} </td>
                    <td> {{ $tag->name }} </td>
                    <td> {{ $tag->created_at }} </td>
                    <td> {{ $tag->updated_at }} </td>
                    <td>
                        <form action="{{'/tag/'.$tag->id.'/edit'}}" method="GET">
                            <button type="submit" class ="btn btn-link">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{'/tag/'.$tag->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class = "btn btn-link">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
   </div>
</body>
</html>
