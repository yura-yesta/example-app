<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<div class="container">

    <table class="table table-bordered " >
        <tr>
            <th>Дата створення</th>
            <th>Назва угоди</th>
            <th width="10%">Опис</th>
            <th>Створив</th>
            <th width="180px">Action</th>
        </tr>
        @foreach ($deal as $key => $value)
            <tr>
                <td>{{ $value->Created_Time }}</td>
                <td>{{ $value->Deal_Name }}</td>
                <td>{{ mb_strimwidth($value->Description, 0, 30, '...') }}</td>
                <td>{{ $value->Owner->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{url('/task-create', ['id' => $value->id]) }}">Add Task</a>
                </td>
            </tr>

        @endforeach
    </table>
</div>
<hr>
<a class="btn btn-info" href="{{url('/createDealForm') }}"><p>Create deal</p></a>

</body>
</html>
