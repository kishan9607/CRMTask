@extends('admin.main.headerfooter')
@section('contain')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Assign Lead</h1>
                    </div>

                    <form action="{{ route('assign-leads.store') }}" id="project-form-add" method="POST" enctype="multipart/form-data"
                class="form form-vertical">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 mb-2">
                                <label class="form-label" for="lead_id"> Lead </label>

                                <div class="@error('lead_id') is-invalid @enderror">
                                    <select class="form-select form-control" id="lead_id" name="lead_id">             
                                        <option value=""> Select Leads </option>
                                        @foreach ($lead as $item)
                                            <option value="{{$item->id}}" @if (old('lead_id') == $item->id) selected @endif> {{$item->name}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('lead_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <label class="form-label" for="user_id"> User </label>

                                <div class="@error('user_id') is-invalid @enderror">
                                    <select class="form-select form-control" id="user_id" name="user_id[]">             
                                        @foreach ($user as $item)
                                            <option value="{{$item->id}}" @if (old('user_id') == $item->id) selected @endif> {{$item->name}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('user_id')
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
