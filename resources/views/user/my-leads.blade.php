@extends('user.main.headerfooter')
@section('contain')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Leads</h1>
        </div>

        @foreach ($data as $item)
            <div class="card mb-5">
                <div class="card-header">
                    <h5 class="card-title">{{ $item->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <b>Number : </b> {{ $item->phone_number }} <br>
                        <b>Email : </b> {{ $item->email }} <br>
                        {{-- <b>Status : </b> {{ $item->status }} --}}
                    <div class="row">
                        <div class="col-md-1">
                            <b>Status : </b>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select form-control" id="status{{ $item->id }}" name="status"
                                onchange="changeStatus({{ $item->id }})">
                                <option value=""> Select status </option>
                                <option value="Pending" @if ($item->status == 'Pending') selected @endif> Pending </option>
                                <option value="Working" @if ($item->status == 'Working') selected @endif> Working </option>
                                <option value="Completed" @if ($item->status == 'Completed') selected @endif> Completed
                                </option>
                                <option value="Cancelled" @if ($item->status == 'Cancelled') selected @endif> Cancelled
                                </option>
                            </select>
                        </div>
                    </div>
                    {{-- <b>Status : </b> {{ $item->status }} --}}
                    </p>

                </div>
            </div>
        @endforeach

    </div>
    <!-- /.container-fluid -->

    </div>

    <!-- End of Main Content -->
@endsection

@section('script')
    <script>
        function changeStatus(id) {
            console.log(id);
            var status = $("#status" + id).val();
            $.ajax({
                type: 'GET',
                url: '/user/leads-edit/' + id + '/' + status,
                success: function(response) {
                    alert(response.success);
                }
            });
        }
    </script>
@endsection
