<x-app-layout>
@php
$blog=$blog ?? '';
@endphp
<div class="pagetitle">
    @if($blog)
      <h1>  {{ __('Edit Media')}}</h1>
      @else
      <h1>  {{ __('Add Media')}}</h1>
      @endif
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">  {{ __('Home') }}</a></li>
          <li class="breadcrumb-item active">  {{!$blog? __('Add Media'): __('Edit Media')}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
    
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Media Form</h5>
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
              <form class="row g-3"  action="{{url('media/submit')}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="file" name="image[]" multiple  class="form-control" id="image" placeholder="Media Images">
                    <label for="image">Upload Media Images</label>
                  </div>
                </div>       
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