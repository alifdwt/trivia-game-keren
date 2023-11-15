@extends('layouts.default')

@section('title', 'User')
@section('content')
    <div>
        <h1 class="h3 mb-2 text-gray-800">Users</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Create User
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Avatar</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Diamonds</th>
                                <th>Total Points</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <img src="{{ url($user->avatar()->get()[0]->image_src) }}" alt="avatar"
                                                width="100px">
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->diamonds }}</td>
                                    <td>{{ $user->total_points }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#userEdit{{ $user->id }}">Edit</button>
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#userDestroy{{ $user->id }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modals --}}
        {{-- Create Modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" id="username" placeholder="Username">
                                @error('username')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" id="email" placeholder="Email">
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="diamonds">Diamonds</label>
                                    <input type="number" class="form-control @error('diamonds') is-invalid @enderror"
                                        name="diamonds" value="{{ old('diamonds') }}" id="diamonds"
                                        placeholder="Diamonds">
                                    @error('diamonds')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="total_points">Total Points</label>
                                    <input type="number" class="form-control @error('total_points') is-invalid @enderror"
                                        name="total_points" value="{{ old('total_points') }}" id="total_points"
                                        placeholder="Total Points">
                                    @error('total_points')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="avatar_id">Avatar ID</label>
                                <input type="number" class="form-control @error('avatar_id') is-invalid @enderror"
                                    name="avatar_id" value="{{ old('avatar') }}" id="avatar_id" placeholder="Avatar ID">
                                @error('avatar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- End Create Modal --}}

        {{-- Edit Modal --}}
        @foreach ($users as $editUser)
            <div class="modal fade" id="userEdit{{ $editUser->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('user.update', $editUser->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        name="username" value="{{ $editUser->username }}" id="username"
                                        placeholder="Username">
                                    @error('username')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $editUser->email }}" id="email"
                                        placeholder="Email">
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="diamonds">Diamonds</label>
                                        <input type="number" class="form-control @error('diamonds') is-invalid @enderror"
                                            name="diamonds" value="{{ $editUser->diamonds }}" id="diamonds"
                                            placeholder="Diamonds">
                                        @error('diamonds')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="total_points">Total Points</label>
                                        <input type="number"
                                            class="form-control @error('total_points') is-invalid @enderror"
                                            name="total_points" value="{{ $editUser->total_points }}" id="total_points"
                                            placeholder="Total Points">
                                        @error('total_points')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="avatar_id">Avatar ID</label>
                                    <input type="number" class="form-control @error('avatar_id') is-invalid @enderror"
                                        name="avatar_id" value="{{ $editUser->avatar_id }}" id="avatar_id"
                                        placeholder="Avatar ID">
                                    @error('avatar')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
        {{-- End Edit Modal --}}

        {{-- Delete Modal --}}
        @foreach ($users as $destroyUser)
            <div class="modal fade" id="userDestroy{{ $destroyUser->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('user.destroy', $destroyUser->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Question {{ $destroyUser->id }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h3>Are you sure want to delete {{ $destroyUser->username }}?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                    </form>
                </div>
            </div>
    </div>
    @endforeach
    {{-- End Delete Modal --}}

    </div>
@stop
