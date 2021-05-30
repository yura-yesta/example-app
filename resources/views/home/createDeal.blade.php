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
<div>Нова угода</div>
<div class="container">
    <form method="post" action="createDeal">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">Імя</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="Імя" name="name">
            </div>
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
            <div class="form-group col-md-6">
                <label for="inputPassword4">Наступний крок</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="опис" name="next_step">
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Сворити</button>
    </form>
</div>
<a class="btn btn-info" href="{{url('/') }}"><p>return home</p></a>
</body>
</html>
