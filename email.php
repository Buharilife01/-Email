<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="process.php" method="post">
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="">
            <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>
        <textarea name="message" id=""></textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>