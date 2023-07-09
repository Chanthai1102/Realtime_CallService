@extends('backend.master')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper p-4">
        <div class="container-xxl flex-grow-1 container-p-y row" id="callservce">
            @foreach ($table as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-header ">Call Service</h5>
                                <h5 class="card-header ">{{ $item -> bookingdate }}</h5>
                            </div>
                            <div class="card-body">
                                    <div class="p-4">
                                            <p class="text-center fs-large fw-bold">{{ $item -> nametable }}</p>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                            <a class="btn btn-primary" href="/admin/accept/{{ $item -> id }}">
                                                Accept
                                            </a>
                                    </div>
                                </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
    <div class="content-backdrop fade"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script>
    var today = new Date();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var listTable = [];

    //suscribing to pusher channel
    Pusher.logToConsole = false;
    var pusher = new Pusher('12345', {
        cluster: 'mt1',
        broadcaster: 'pusher',
        forceTLS: false,
        wsHost: window.location.hostname,
        wsPort: 6001,
    });

    var channel = pusher.subscribe('events');
    channel.bind('App\\Events\\RealTimeMessage',(d) => {
        if(d){
            if(listTable.includes(d.message)){
                alert("Exist Table");
            }else{
                var nametable = (d.message);
                listTable.push(d.message);
                insertdata_notification(d.message);
                window.location.reload(true);
                tableCard();
            }
        }
    });

//     function tableCard(){
//         $('#callservce').html("");
//         for(var i=0; i<listTable.length; i++){
//             $('#callservce').append(
//                 '<div class="col-md-4">' +
//                 '<div class="card mb-4">' +
//                 '    <h5 class="card-header">Call Service</h5>' +
//                 '    <div class="card-body">' +
//                 '        <div class="p-4">' +
//                 '            <p class="text-center fs-large fw-bold">Table '+listTable[i]+'</p>' +
//                 '        </div>' +
//                 '        <div class="d-flex justify-content-end">' +
//                 '            <button type="button"  class="btn btn-primary" onClick="onAcceptClick('+listTable[i]+')">' +
//                 '                Accept' +
//                 '            </button>' +
//                 '        </div>' +
//                 '    </div>' +
//                 '</div>' +
//                 '</div>'
//             );
//         }
//     }
    function insertdata_notification(name){
        const request = new XMLHttpRequest();
        request.open("POST", "api/table?table="+name, true);
        request.send();

        request.onreadystatechange = function (){
            if(request.readyState == 4 && request.status == 200){
                var obj = JSON.parse(request.responseText)
                console.log(obj);
            }
        }
    }

</script>
@endsection
