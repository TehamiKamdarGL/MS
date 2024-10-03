@extends('layouts.admin.admin_main')

@section('main-section')
<button data-bs-toggle="modal" data-bs-target="#modalRawMaterial" class="btn btn-primary mb-3">Add Raw Material</button>
<div class="table-responsive">
<table class="table table-primary">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Material Name</th>
            <th>Supplier</th>
            <th>Quantity</th>
            <th>Cost Price</th>
            <th>Batch Number</th>
            <th>Received Date</th>
        </tr>
    </thead>
    <tbody>
        @if ($rm && count($rm) > 0)
            @foreach ($rm as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->material_name }}</td>
                    <td>{{ $r->supplier }}</td>
                    <td>{{ $r->quantity }}</td>
                    <td>{{ $r->cost_price }}</td>
                    <td>{{ $r->batch_number }}</td>
                    <td>{{ $r->received_date }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" class="text-center">No Raw Material Available</td> <!-- Properly aligned message -->
            </tr>
        @endif
    </tbody>
</table>

</div>


<div class="modal fade" id="modalRawMaterial" tabindex="-1" aria-labelledby="modalRawMaterialLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRawMaterial Label">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
         <input type="text" placeholder="Enter Material Name"  class="form-control mb-1">
         <input type="text" placeholder="Enter Supplier"  class="form-control mb-1">
         <input type="text" placeholder="Enter Quantity"  class="form-control mb-1">
         <input type="text" placeholder="Enter Cost Price"  class="form-control mb-1">
         <input type="text" placeholder="Enter Batch Number"  class="form-control mb-1">
         <input type="text" placeholder="Enter Received Date"  class="form-control mb-1">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection