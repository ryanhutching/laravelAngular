<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('api/upload/json') }}" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
        <input type="file" name="upload_file" />
        <button type="submit">Upload</button>
    </form>
    <p>{!! $errors->first('upload_file') !!}</p>
</body>
</html>