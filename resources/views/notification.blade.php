<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Notification</h2>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>

<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script>


    //suscribing to pusher channel
    Pusher.logToConsole = false;
    var pusher = new Pusher('12345', {
        cluster: 'mt1',
        broadcaster: 'pusher',
        //key: process.env.MIX_PUSHER_APP_KEY,
        //cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        forceTLS: false,
        wsHost: window.location.hostname,
        wsPort: 6001,
    });

    var channel = pusher.subscribe('events');
    channel.bind('App\\Events\\RealTimeMessage',(d) => {
        if(d){
            console.log("=============");
        }
    });
</script>
</html>
