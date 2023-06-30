@extends('backend.master')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Table /</span> Table Inputs</h4>
            <div class="row">
                <form action="{{route('table-submit')}}" method="post">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Name Table</h5>
                            <div class="card-body">
                                <div class="form-floating">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="floatingInput"
                                        placeholder="Table 001"
                                        aria-describedby="floatingInputHelp"
                                    />
                                    <label for="floatingInput">Name</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        We'll never share your details with anyone else.
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
