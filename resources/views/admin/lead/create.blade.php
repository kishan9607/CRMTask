@extends('admin.main.headerfooter')
@section('contain')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add lead</h1>
                    </div>

                    <form action="{{ route('leads.store') }}" id="project-form-add" method="POST" enctype="multipart/form-data"
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
                                <label class="form-label" for="phone_number">Phone number</label>

                                <input type="number" min="0" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">

                                @error('phone_number')
                                    <span class="d-flex invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <label class="form-label" for="status"> Role </label>

                                <div class="@error('status') is-invalid @enderror">
                                    <select class="form-select form-control" id="status" name="status">             
                                        <option value=""> Select status </option>
                                        <option value="Pending" @if (old('status') == "Pending") selected @endif> Pending </option>
                                        <option value="Working" @if (old('status') == "Working") selected @endif> Working </option>
                                        <option value="Completed" @if (old('status') == "Completed") selected @endif> Completed </option>
                                        <option value="Cancelled" @if (old('status') == "Cancelled") selected @endif> Cancelled </option>
                                    </select>
                                </div>

                                @error('status')
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
