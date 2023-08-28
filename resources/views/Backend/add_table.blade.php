@extends('backend.master')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="d-flex justify-content-between">
                    <h5 class="card-header">Table</h5>
                    <div>
                        <!-- Vertically Centered Modal -->
                        <div class="mx-3">
                            <div class="mt-3">
                                <!-- Button trigger modal -->
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalCenter"
                                >
                                    Add Table
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="/admin/table/submit" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Table</h5>
                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                    ></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameWithTitle" class="form-label">Table Name</label>
                                                            <input
                                                                type="text"
                                                                id="nameWithTitle"
                                                                name="tablename"
                                                                class="form-control"
                                                                placeholder="Enter Name"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                            <label for="emailWithTitle" class="form-label">Description</label>
                                                            <input
                                                                type="text"
                                                                id="emailWithTitle"
                                                                class="form-control"
                                                                name="description"
                                                                placeholder="Description"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <input type="submit" class="btn btn-primary" name="btn_add" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mx-3">
                            <div class="mt-3">

                                <!-- Modal -->
                                <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="/admin/table/submit" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Edit Table</h5>
                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                    ></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameWithTitle" class="form-label">Table Name</label>
                                                            <input
                                                                type="text"
                                                                id="nameWithTitle"
                                                                name="tablename"
                                                                class="form-control"
                                                                placeholder="Enter Name"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                            <label for="emailWithTitle" class="form-label">Description</label>
                                                            <input
                                                                type="text"
                                                                id="emailWithTitle"
                                                                class="form-control"
                                                                name="description"
                                                                placeholder="Description"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <input type="submit" class="btn btn-primary" name="btn_add" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Table Name</th>
                            <th>Description</th>
                            <th>QR</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($table as $item)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item -> tablename }}</strong></td>
                                    <td>{{ $item -> description }}</td>
                                    <td>
                                        <span class="badge bg-label-primary me-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#modalEdit">Edit</span>
                                        <a href="/admin/table/delete/{{ $item -> id }}" class="badge bg-label-danger me-1 cursor-pointer">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
