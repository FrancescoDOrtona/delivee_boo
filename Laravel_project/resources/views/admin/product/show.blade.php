@extends('layouts.app')

@section('content')
{{-- inizio modale  --}}
<div class="modal" tabindex="-1" id="modalDelete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">are you sure to delete?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-modal">are you sure to delete : </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="button-modal-delete" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
  {{-- fine modale  --}}
<div class="container">
    <div class="row mt-4">
        <div class="col-6 ">
            <img class="img-fluid cover w-100 rounded" src="{{asset('storage/'.$product->image)}}" alt="">
        </div>
        <div class="col-6">
            <h2>{{ $product->name }}</h2>
            <ul>
                <li>{{ $product->price }} € </li>
                @if($product->available == false)
                <li>Not Available</li>
                @else
                <li>Available</li>
                @endif

                <li>{{$product->description}}</li>
            </ul>
            <div class="d-flex align-items-start gap-3 ">
                <a href="{{route('admin.product.edit', $product)}}" class="btn btn-secondary">Edit Product</a>
                <form class="margin-left-auto form-delete" action="{{route('admin.product.destroy',$product)}}" method="POST" data-delete-name="{{$product->name}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger form-delete-btn">Delete</button>
                </form>
            </div>
        </div>
        
    </div>
</div>


@endsection