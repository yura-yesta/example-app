<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Contact add in Zoho CRM - laravelcode.com</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>
                    <a class="btn btn-info" href="{{ Route::get('/task-create', [dealController::class, 'showTask']) }}">Add Contact in ZOHO</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

</body>
</html>
