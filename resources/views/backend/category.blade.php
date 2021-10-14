@extends('layouts.master')
@section('title','Category')
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
                 Add Category
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
                              <th>Parent Name</th>
                              <th>Satatus</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                          @foreach ($categories as $category)
                              <tr>
                                  <td>{{ $category->id  }}</td>
                                  <td>{{ $category->name  }}</td>
                                  <td>{{($category->parents) ? $category->parents->name : 'null' }}</td>
                                  <td>
                                    @if ($category->active === 1)
                                        <label
                                            class="badge badge-success"> Active</label>
                                    @else
                                        <label
                                            class="badge badge-danger"> Not Active</label>
                                    @endif

                                </td>
                                  <td>
                                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                          data-target="#edit{{ $category->id }}"
                                          title="Edit">Edit</button>
                                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        title="Delete"><a href="{{ route ('admin.categories.delete',$category->id)}}" > Delete</button>
                                              
                                  </td>
                              </tr>
  
                              <!-- edit_modal_Grade -->
                              <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog"
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
                                             <form action="{{route('admin.categories.update',$category->id)}}" method="post">
                                                 
                                                 @csrf
                                                 <div class="row">
                                                     <div class="col">
                                                         <label for="name" class="mr-sm-2">Name:</label>
                                                         <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                                                value="{{ $category->name}}" required>
                                                                @error('name')
                                                                <small class="form-text text-danger">{{$message}}</small>
                                                                @enderror
                                                         <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $category->id }}">
                                                     </div>
                                                 </div><br>
                                                 <div class="form-group">
                                                     <label
                                                         for="exampleFormControlTextarea1">Parent Name:</label>
                                                     <select class="form-control form-control-lg"
                                                             id="exampleFormControlSelect1" name="parent_id">
                                                         <option value="{{ $category->parent_id}}">
                                                          {{($category->parents) ? $category->parents->name : '' }}
                                                         </option>
                                                         @foreach ($categories as $category)
                                                             <option value="{{ $category->id }}">
                                                                 {{ $category->name }}
                                                             </option>
                                                         @endforeach
                                                     </select>
  
                                                 </div>
                                                 <br><br>

                                                 <div class="col"> 
                                                    <div class="form-check">
                                                        @if ($category->active == 1)
                                                            <input type="checkbox" checked class="form-check-input" name="active" id="active">
                                                        @else
                                                            <input type="checkbox" class="form-check-input" name="active"  id="active">
                                                        @endif
                                                        <label
                                                            class="form-check-label"
                                                            for="active">Status</label>
                                                    </div>
                                                </div>
  
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
  
  <!-- add_modal_class -->
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   Add New Category
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!--  add form -->
               <form action="{{route('admin.categories.store')}}" method="post">
                   
                   @csrf
                   <div class="row">
                       <div class="col">
                           <label for="name" class="mr-sm-2">Name:</label>
                           <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                  value="" required>
                                  @error('name')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                       </div>
                   </div><br>
                   <div class="form-group">
                       <label
                           for="exampleFormControlTextarea1">Parent Name:</label>
                           <select class="form-control form-control-lg" name="parent_id">
                            <option></option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                   </div>
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