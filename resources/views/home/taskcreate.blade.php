<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div>Нова задача для :  <?php
    print_r($deal);
    ?></div>
<div class="container">
    <form method="post" action="/createtask">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">ID</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="Імя" name="id" value="{{$deal}}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">Опис</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="опис" name="description">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">Обєкт</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="Імя" name="subject">
            </div>

        </div>


        <button type="submit" class="btn btn-primary">Сворити</button>
    </form>
</div>
</body>
</html>
