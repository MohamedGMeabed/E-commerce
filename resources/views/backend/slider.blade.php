@extends('layouts.master')
@section('title','Slider')
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
                 Add Slider
              </button>
              <br><br>

              <br>
              <div class="table-responsive">
                  <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                      style="text-align: center">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                          @foreach ($sliders as $slider)
                              <tr>
                                  <td>{{ $slider->id  }}</td>
                                  <td>{{ $slider->title  }}</td>
                                  <td>{{$slider->description}}</td>
                                  <td><img  style="width: 90px; height: 90px;" src="{{asset('images/sliders/'.$slider->image)}}"></td>
                                  <td>
                                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                          data-target="#edit{{ $slider->id }}"
                                          title="Edit">Edit</button>
                                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        title="Delete"><a href="{{ route ('admin.slider.delete',$slider->id)}}" > Delete</button>
                                              
                                  </td>
                              </tr>
  
                              <!-- edit_modal_Grade -->
                              <div class="modal fade" id="edit{{ $slider->id }}" tabindex="-1" role="dialog"
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
                                             <form action="{{route('admin.slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                                                 
                                                 @csrf
                                                 <div class="row">
                                                     <div class="col">
                                                         <label for="name" class="mr-sm-2">Title:</label>
                                                         <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                                                value="{{ $slider->title}}" required>
                                                                @error('title')
                                                                <small class="form-text text-danger">{{$message}}</small>
                                                                @enderror
                                                         <input id="id" type="hidden" name="id" class="form-control" value="{{ $slider->id }}">
                                                     </div>
                                                 </div><br>
                                                 <div class="row">
                                                    <div class="col">
                                                        <label for="description" class="mr-sm-2">Description:</label>
                                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ $slider->description}}</textarea>
                                                        @error('description')
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
                                                        <img style="width: 100px;height: 100px;" src="{{asset('images/sliders/'. $slider->image) }}">

                                                    </div>
                                                </div><br>
  
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
                   Add New slider
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!--  add form -->
               <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                   
                   @csrf
                   <div class="row">
                    <div class="col">
                        <label for="name" class="mr-sm-2">Title:</label>
                        <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="" required>
                               @error('title')
                               <small class="form-text text-danger">{{$message}}</small>
                               @enderror
                    </div>
                </div><br>
                <div class="row">
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
                       <label for="image" class="mr-sm-2">Image:</label>
                       <input id="image" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                       @error('image')
                       <small class="form-text text-danger">{{$message}}</small>
                       @enderror
                   </div>
               </div><br>

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