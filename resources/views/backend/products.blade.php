@extends('layouts.master')
@section('title','Products')
@section('content')
<div class="row">

  <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
          <div class="card-body">
  
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
  
              <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                 Add Product
              </button>
              <br><br>

              <br>
              <div class="table-responsive">
                  <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                      style="text-align: center">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Stock</th>
                              <th>price</th>
                              <th>price Before</th>
                              <th>Has Offer</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                          @foreach ($products as $product)
                              <tr>
                                  <td>{{ $product->id  }}</td>
                                  <td>{{ $product->name  }}</td>
                                  <td>{{ $product->description  }}</td>
                                  <td>{{ $product->in_stock  }}</td>
                                  <td>{{ $product->price  }}</td>
                                  <td>{{ $product->price_before  }}</td>
                                  <td>
                                    @if ($product->has_offer == 1)
                                    <label
                                        class="badge badge-success"> Yes</label>
                                    @else
                                        <label
                                            class="badge badge-danger"> Not </label>
                                    @endif    
                                    </td>
                                  {{-- <td>{{ $product->has_offer  }}</td> --}}
                                  <td>{{ $product->start_date  }}</td>
                                  <td>{{ $product->end_date  }}</td>
                                  <td><img  style="width: 90px; height: 90px;" src="{{asset('images/products/'.$product->image)}}"></td>
                                  <td>
                                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                          data-target="#edit{{ $product->id }}"
                                          title="Edit">Edit</button>
                                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        title="Delete"><a href="{{ route ('admin.products.delete',$product->id)}}" > Delete</button>
                                              
                                  </td>
                              </tr>
  
                              <!-- edit_modal_Product -->
                              <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog"
                                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                 id="exampleModalLabel">
                                                 Edit
                                             </h5>
                                             <button type="button" class="close" data-dismiss="modal"
                                                     aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                             </button>
                                         </div>
                                         <div class="modal-body">
                                             <!-- edit_form -->
                                             <form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                                 
                                                @csrf
                                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $product->id }}">

                                                <div class="row">
                                                 <div class="col">
                                                     <label
                                                         for="category">Category:</label>
                                                     <select class="form-control form-control-lg"
                                                             id="category_id" name="category_id">
                                                           @foreach ($product->Categories as $producCategory)
                                                            <option value="{{ $producCategory->name }}">   {{ $producCategory->name }}    
                                                            </option>
                                                            @endforeach
                                                            @foreach ($categories as $category)
                                                             <option value="{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </option>
                                                         @endforeach
                                                     </select>
                                                 </div>
                                             </div><br><br>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name" class="mr-sm-2">Name:</label>
                                                        <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}" >
                                                        @error('name')
                                                        <small class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                     <label for="description" class="mr-sm-2">Description:</label>
                                                     <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{$product->description}}</textarea>
                                                     @error('description')
                                                     <small class="form-text text-danger">{{$message}}</small>
                                                     @enderror
                                                 </div>
                                                </div><br>
                                                <div class="row">
                                                 <div class="col">
                                                     <label for="in_stock" class="mr-sm-2">Stock:</label>
                                                     <input id="in_stock" type="number" name="in_stock" class="form-control @error('in_stock') is-invalid @enderror" value="{{$product->in_stock}}" >
                                                     @error('in_stock')
                                                     <small class="form-text text-danger">{{$message}}</small>
                                                     @enderror
                                                 </div>
                                                 <div class="col">
                                                  <label for="price" class="mr-sm-2">Price:</label>
                                                  <input id="price" type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$product->price}}" >
                                                  @error('price')
                                                  <small class="form-text text-danger">{{$message}}</small>
                                                  @enderror
                                              </div>
                                              <div class="col">
                                                 <label for="price_before" class="mr-sm-2">Price Before:</label>
                                                 <input id="price_before" type="number" name="price_before" class="form-control  @error('price_before') is-invalid @enderror" value="{{$product->price_before}}">
                                                 @error('price_before')
                                                 <small class="form-text text-danger">{{$message}}</small>
                                                 @enderror
                                             </div>
                                             </div><br>
                                             <div class="row">
                                                <div class="col "> 
                                                   <div class="form-check mr-30 pr-10">
                                                    @if ($product->has_offer == 1)
                                                     <input type="checkbox" checked class="form-check-input" name="has_offer" id="has_offer">
                                                     @else
                                                     <input type="checkbox" class="form-check-input" name="has_offer" id="has_offer">

                                                     @endif
                                                     <label class="form-check-label" for="has_offer">Has Offer:</label>
                                                   </div>  
                                                  </div>
                                             </div><br>
                                             <div class="row">
                                                
                                                 <div class="col">
                                                     <label for="start_date" class="mr-sm-2">Start Date:</label>
                                                     <input id="start_date" type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{$product->start_date}}" >
                                                     @error('start_date')
                                                     <small class="form-text text-danger">{{$message}}</small>
                                                     @enderror
                                                 </div>
                                                 <div class="col">
                                                  <label for="end_date" class="mr-sm-2">End Date:</label>
                                                  <input id="end_date" type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{$product->end_date}}" >
                                                  @error('end_date')
                                                  <small class="form-text text-danger">{{$message}}</small>
                                                  @enderror
                                              </div>
                                             </div><br>
                                             <div class="row">
                                                <div class="col">
                                                    <label for="image" class="mr-sm-2">Image:</label>
                                                    <input id="image" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                    @error('image')
                                                    <small class="form-text text-danger">{{$message}}</small>
                                                    @enderror
                                                    <img style="width: 100px;height: 100px;" src="{{asset('images/products/'. $product->image) }}">

                                                </div>
                                            </div><br>
                             
                                                
                                                <br><br>
                             
  
                                                 <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary"
                                                             data-dismiss="modal">Close</button>
                                                     <button type="submit"
                                                             class="btn btn-success">submit</button>
                                                 </div>
                                             </form>
  
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         @endforeach
                 </table>
             </div>
         </div>
     </div>
  </div>
  
  <!-- add_modal_Product -->
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   Add New product
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data" >
                   
                   @csrf
                   <div class="row">
                    <div class="col">
                        <label
                            for="category">Category:</label>
                        <select class="form-control form-control-lg"
                                id="category_id" name="category_id">
                                <option value="">Select category </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div><br><br>
                   <div class="row">
                       <div class="col">
                           <label for="name" class="mr-sm-2">Name:</label>
                           <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="" >
                           @error('name')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                       </div>
                       <div class="col">
                        <label for="description" class="mr-sm-2">Description:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3"></textarea>
                        @error('description')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                   </div><br>
                   <div class="row">
                    <div class="col">
                        <label for="in_stock" class="mr-sm-2">Stock:</label>
                        <input id="in_stock" type="number" name="in_stock" class="form-control @error('in_stock') is-invalid @enderror" value="" >
                        @error('in_stock')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col">
                     <label for="price" class="mr-sm-2">Price:</label>
                     <input id="price" type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="" >
                     @error('price')
                     <small class="form-text text-danger">{{$message}}</small>
                     @enderror
                 </div>
                 <div class="col">
                    <label for="price_before" class="mr-sm-2">Price Before:</label>
                    <input id="price_before" type="number" name="price_before" class="form-control  @error('price_before') is-invalid @enderror" value="">
                    @error('price_before')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                </div><br>
                <div class="row">
                   <div class="col "> 
                      <div class="form-check mr-30 pr-10">
                        <input type="checkbox"  class="form-check-input" name="has_offer" id="has_offer">
                        <label class="form-check-label" for="has_offer">Has Offer:</label>
                      </div>  
                     </div>
                </div><br>
                <div class="row">
                   
                    <div class="col">
                        <label for="start_date" class="mr-sm-2">Start Date:</label>
                        <input id="start_date" type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="" >
                        @error('start_date')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col">
                     <label for="end_date" class="mr-sm-2">End Date:</label>
                     <input id="end_date" type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="" >
                     @error('end_date')
                     <small class="form-text text-danger">{{$message}}</small>
                     @enderror
                 </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <label for="image" class="mr-sm-2">Image:</label>
                        <input id="image" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div><br>

                   
                   <br><br>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">Close</button>
                       <button type="submit"
                               class="btn btn-success">submit</button>
                   </div>
               </form>

           </div>
       </div>
   </div>
</div>
  
  </div>
  
  <!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render

@endsection