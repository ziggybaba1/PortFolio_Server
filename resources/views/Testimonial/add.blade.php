<x-app-layout>
@php
$testimony=$testimony ?? '';
@endphp
<div class="pagetitle">
    @if($testimony)
      <h1>  {{ __('Edit Testimonial')}}</h1>
      @else
      <h1>  {{ __('Add Testimonial')}}</h1>
      @endif
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">  {{ __('Home') }}</a></li>
          <li class="breadcrumb-item active">  {{!$testimony? __('Add Testimonial'): __('Edit Testimonial')}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
    
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Testimonial Form</h5>
              @if($errors->any())
              @foreach($errors->all() as $message)
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
             {{$message}} 
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endforeach
            @endif
            @if (Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle"></i> {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
                @endif
              <!-- Floating Labels Form -->
              <form class="row g-3"  action="{{!$testimony?url('testimonies/submit'):url('testimonies/update/'.$testimony->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="name" value="{{$testimony->name ?? ''}}" class="form-control" id="name" placeholder="Testifier name">
                    <label for="name">Name</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="title" value="{{$testimony->title ?? ''}}" class="form-control" id="title" placeholder="Testifier title">
                    <label for="title">Title</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <textarea  name="description" id="" cols="30" class="form-control" id="description" placeholder="Testifier description" rows="10">{{$testimony->description?? ''}}</textarea>
                   
                    <label for="description">Testifier Description</label>
                  </div>
                </div>
               
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="file" name="image" multiple  class="form-control" id="image" placeholder="Testimonial Images">
                    <label for="image">Upload Testifier Image</label>
                  </div>
                </div>
                @if($testimony)
                <div class="col-md-6">
                    <img src="{{url('')}}{{\App\Models\Media::find($testimony->media)->url ?? ''}}" width="100" alt="">
                </div>
               @endif
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

          </div>
      </div>
    </section>
    </x-app-layout>