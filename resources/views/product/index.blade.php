@extends('layout')
@section('dashboard-content')

    @if(Session::get('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('deleted') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('delete-failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('delete-failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            All Products </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th> SKU </th>
                        <th> Product Name </th>
                        <th> List Price(MRP) </th>
                        <th> Sale Price </th>
                        <th> Discount </th>
                        <th> Category </th>
                        <th> Photo </th>
                        <th> Warranty </th>
                        <th> Description </th>
                        <th> Keyword </th>
                        <th> Tax </th>
                        <th>Actions </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th> SKU </th>
                        <th> Product Name </th>
                        <th> List Price(MRP) </th>
                        <th> Sale Price </th>
                        <th> Discount </th>
                        <th> Category </th>
                        <th> Photo </th>
                        <th> Warranty </th>
                        <th> Description </th>
                        <th> Keyword </th>
                        <th> Tax </th>
                        <th>Actions </th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($products as $product)

                        <tr>
                            <td> {{ $product->sku }} </td>
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->list_price }} </td>
                            <td> {{ $product->sale_price }} </td>
                            <td> {{ $product->discount }} </td>
                            <td> {{ $product->category->name }} </td>
                            <td> <img src="{{ $product->photo }}" width="100" height="100"></td>
                            <td> {{ $product->warranty }} </td>
                            <td> {{ $product->product_description }} </td>
                            <td> {{ $product->category->keyword }} </td>
                            <td> {{ $product->tax }} </td>
                            <td>
                                <a href="{{ URL::to('edit-product') }}/{{ $product->id }}" class="btn btn-outline-primary btn-sm"> Edit </a>
                                |
                                <a href="{{ URL::to('delete-product') }}/{{ $product->id }}" class="btn btn-outline-danger btn-sm" onclick="checkDelete()"> Delete </a>
                            </td>

                        </tr>


                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <script>
        function checkDelete() {
            var check = confirm('Are you sure you want to Delete this?');
            if(check){
                return true;
            }
            return false;
        }
    </script>

@stop
