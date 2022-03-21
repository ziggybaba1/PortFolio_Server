<x-app-layout>
@php
$blog=$blog ?? '';
@endphp
<div class="pagetitle">
    @if($blog)
      <h1>  {{ __('Edit Post')}}</h1>
      @else
      <h1>  {{ __('Add Post')}}</h1>
      @endif
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">  {{ __('Home') }}</a></li>
          <li class="breadcrumb-item active">  {{!$blog? __('Add Post'): __('Edit Post')}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
    
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Post Form</h5>
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
              <form class="row g-3"  action="{{!$blog?url('blog/submit'):url('blog/update/'.$blog->id)}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="title" value="{{$blog->title ?? ''}}" class="form-control" id="planname" placeholder="Post Title">
                    <label for="planname">Title</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="subtitle" value="{{$blog->subtitle ?? ''}}" class="form-control" id="subtitle" placeholder="Brief Descriprion">
                    <label for="subtitle">Post Brief Descriprion</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="meta" value="{{$blog->meta ?? ''}}" class="form-control" id="meta" placeholder="e.g social,influence,buy">
                    <label for="meta">Add Google Meta tags <em>e.g social,influence,buy</em></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="file" name="image" value="{{$blog->fullimage ?? ''}}" class="form-control" id="image" placeholder="Post Title">
                    <label for="image">Upload Post Image</label>
                  </div>
                </div>
                <div class="col-md-6">
                    <img src="{{url('')}}{{$blog->fullimage ?? ''}}" width="100" alt="">
                </div>
                <div class="col-12">
                <label for="floatingTextarea">Post Content</label>
                  <div class="form-floating">
                  <textarea class="ckeditor form-control" name="description">{{$blog->description ?? ''}}</textarea>
                  
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