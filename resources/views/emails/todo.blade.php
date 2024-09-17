<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Todo Email</title>
</head>

<body>
<div class="container">

    <div class="message">
        <p>Dear {{ $mailData['todo_name'] }},</p>
        <p>Your are {{ $mailData['type'] }} todo : {{$mailData['todo_title']}}</p>
    </div>

</div>
</body>

</html>
