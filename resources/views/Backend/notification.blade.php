@extends('backend.master')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper p-4">
        <div class="container-xxl flex-grow-1 container-p-y row" id="callservce">
            <div class="col-md-4">
                <div class="card mb-4">
                    <h5 class="card-header">Call Service</h5>
                    <div class="card-body">
                        <div class="p-4">
                            <p class="text-center fs-large fw-bold" id="nametable">Table 001</p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#exLargeModal"
                            >
                                Accept
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-backdrop fade"></div>
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
        forceTLS: false,
        wsHost: window.location.hostname,
        wsPort: 6001,
    });

    var channel = pusher.subscribe('events');
    channel.bind('App\\Events\\RealTimeMessage',(d) => {
        if(d){
            var nametable = (d.message);
            var div = document.getElementById('callservce');
            div.innerHTML += '<div class="col-md-4"> <div class="card mb-4"> <h5 class="card-header">Call Service</h5> <div class="card-body"> <div class="p-4"> <p class="text-center fs-large fw-bold" id="nametable"></p></div> <div class="d-flex justify-content-end"> <buttontype="button"class="btn btn-primary"data-bs-toggle="modal"data-bs-target="#exLargeModal" >Accept </button> </div> </div> </div> </div>';
            document.getElementById('nametable').innerHTML = nametable;
        }
    });
</script>
@endsection
