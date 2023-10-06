@extends('admin.main.headerfooter')
@section('contain')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add user</h1>
                    </div>

                    <form action="{{ route('users.store') }}" id="project-form-add" method="POST" enctype="multipart/form-data"
                class="form form-vertical">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 mb-2">
                                <label class="form-label" for="name">Name</label>

                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">

                                @error('name')
                                    <span class="d-flex invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-12 mb-2">
                                <label class="form-label" for="email">Email</label>

                                <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="d-flex invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-12 mb-2">
                                <label class="form-label" for="password">Password</label>

                                <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">

                                @error('password')
                                    <span class="d-flex invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <label class="form-label" for="role"> Role </label>

                                <div class="@error('role') is-invalid @enderror">
                                    <select class="form-select form-control" id="role" name="role">             
                                        <option value=""> Select role </option>
                                        <option value="Admin" @if (old('role') == "Admin") selected @endif> Admin </option>
                                        <option value="User" @if (old('role') == "User") selected @endif> User </option>
                                    </select>
                                </div>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="col-12 mb-3 ml-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            
            <!-- End of Main Content -->@endsection
