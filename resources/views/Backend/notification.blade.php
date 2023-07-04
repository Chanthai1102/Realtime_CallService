@extends('backend.master')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper p-4">
        <div class="container-xxl flex-grow-1 container-p-y row" id="callservce">
        </div>
    </div>
    <div class="content-backdrop fade"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>

<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script>
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
                tableCard();
            }
        }
    });


    function onAcceptClick(table){
        //console.log(table);
        console.log(listTable);
        var index = listTable.indexOf("'"+table+"'");
        console.log(index);
        if (index > -1) { // only splice array when item is found
            listTable.splice(index, 1); // 2nd parameter means remove one item only
        }
        tableCard();
    }
    function tableCard(){
        $('#callservce').html("");
        for(var i=0; i<listTable.length; i++){
            $('#callservce').append(
                '<div class="col-md-4">' +
                '<div class="card mb-4">' +
                '    <h5 class="card-header">Call Service</h5>' +
                '    <div class="card-body">' +
                '        <div class="p-4">' +
                '            <p class="text-center fs-large fw-bold">Table '+listTable[i]+'</p>' +
                '        </div>' +
                '        <div class="d-flex justify-content-end">' +
                '            <button type="button"  class="btn btn-primary" onClick="onAcceptClick('+listTable[i]+')">' +
                '                Accept' +
                '            </button>' +
                '        </div>' +
                '    </div>' +
                '</div>' +
                '</div>'
            );
        }
    }
    
</script>
@endsection
