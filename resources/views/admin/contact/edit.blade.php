@extends('admin.main.headerfooter')
@section('contain')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Contact</h1>
                    </div>

                    <form action="{{ route('contacts.update', [$data]) }}" id="project-form-add" method="POST" enctype="multipart/form-data"
                class="form form-vertical">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 mb-2">
                                <label class="form-label" for="name">Name</label>

                                <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">

                                @error('name')
                                    <span class="d-flex invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-12 mb-2">
                                <label class="form-label" for="email">Email</label>

                                <input type="text" class="form-control" name="email" id="email" value="{{ $data->email }}">

                                @error('email')
                                    <span class="d-flex invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-12 mb-2">
                                <label class="form-label" for="phone_number">Phone number</label>

                                <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $data->phone_number }}">

                                @error('phone_number')
                                    <span class="d-flex invalid-feedback" role="alert">
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
