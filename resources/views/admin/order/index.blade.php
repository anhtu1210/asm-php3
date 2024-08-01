@extends('admin.layouts.master')

@section('title')
    Danh sách Order
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh mục đơn đặt</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Danh mục đơn đặt </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách</h5>

                    <a href="" class="btn btn-primary mb-3"></a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Phone</th>
                                <th>User Address</th>
                                <th>Status_order</th>
                                <th>Status_payment</th>
                                <th>Total Price</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user_name }}</td>
                                    <td>{{ $order->user_email }}</td>
                                    <td>{{ $order->user_phone }}</td>
                                    <td>{{ $order->user_address }}</td>
                                    <td>
                                        <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
                                            @csrf
                                            <select class="form-select" name="status_order" id="status_order">
                                                @foreach ($status as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </form>

                                    </td>
                                    <td>{{ $order->status_payment }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                    <td><a class="btn btn-info" href="{{route('admin.orders.invoice', $order->id)}}">In hóa đơn</a></td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div>
@endsection
@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('script-libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        new DataTable("#example", {
            order: [
                [0, 'desc']
            ]
        });
    </script>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#status_order').change(function() {
            var status = $(this).val();
            // var url = $('#statusForm').attr('action');

            $.ajax({
                url: '{{ route('admin.orders.update', $order->id) }}',
                method: 'patch',
                data: {
                    _token: '{{ csrf_token() }}',
                    status_order: status
                },
                success: function(response) {
                    alert('Cập nhật trạng thái thành công!');
                },
                error: function(xhr) {
                    alert('Có lỗi xảy ra, vui lòng thử lại.');
                }
            });
        });
    </script>
@endsection
