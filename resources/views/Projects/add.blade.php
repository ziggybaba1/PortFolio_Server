<x-app-layout>
@php
$project=$project ?? '';
@endphp
<div class="pagetitle">
    @if($project)
      <h1>  {{ __('Edit Project')}}</h1>
      @else
      <h1>  {{ __('Add Project')}}</h1>
      @endif
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">  {{ __('Home') }}</a></li>
          <li class="breadcrumb-item active">  {{!$project? __('Add Project'): __('Edit Project')}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
    
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Project Form</h5>
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
              <form class="row g-3"  action="{{!$project?url('project/submit'):url('project/update/'.$project->id)}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" name="title" value="{{$project->name ?? ''}}" class="form-control" id="title" placeholder="Project title">
                    <label for="title">Title</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" name="subtitle" value="{{$project->subtitle ?? ''}}" class="form-control" id="subtitle" placeholder="Project title">
                    <label for="subtitle">SubTitle</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <textarea  name="description" id="" cols="30" class="form-control" id="description" placeholder="Project description" rows="10">{{$project->description?? ''}}</textarea>
                   
                    <label for="description">Project Description</label>
                  </div>
                </div>
               
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="file" name="image[]" multiple  class="form-control" id="image" placeholder="Project Images">
                    <label for="image">Upload Project Images</label>
                  </div>
                </div>
                <div class="col-md-12"  style="display:flex;flex-direction:row;justify-content:space-between">
                 @if($project)
                  @foreach($project->media as $image)
                    <div style="display:flex;flex-direction:row" >
                    @if(isset($image['url'])&&$image['url']===$project->thumbnail)
                  <input type="checkbox" checked name="thumbnail" value="{{$image['url']}}" />
                  @else
                  <input type="checkbox" name="thumbnail" value="{{$image['url']}}" />
                  @endif    
                <img src="{{url('')}}{{$image['url'] ?? ''}}" width="100" alt="">
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="col-12">
                <label for="floatingTextarea">Technology</label>
                  <div class="form-floating">
                  <textarea class="ckeditor form-control" name="technology">{{$project->technology ?? ''}}</textarea>
                  </div>
                </div>
                <div class="col-12">
                <label for="floatingTextarea">Repository</label>
                  <div class="form-floating">
                  <textarea class="ckeditor form-control" name="repository">{{$project->repository ?? ''}}</textarea>
                  </div>
                </div>
                <div class="col-12">
                <label for="floatingTextarea">Design</label>
                  <div class="form-floating">
                  <textarea class="ckeditor form-control" name="design">{{$project->design ?? ''}}</textarea>
                  </div>
                </div>
                <div class="col-12">
                <label for="floatingTextarea">Link</label>
                  <div class="form-floating">
                  <textarea class="ckeditor form-control" name="link">{{$project->link ?? ''}}</textarea>
                  </div>
                </div>
                <div class="col-12">
                <label for="floatingTextarea">Contributor</label>
                  <div class="form-floating">
                  <textarea class="ckeditor form-control" name="contributor">{{$project->contributor ?? ''}}</textarea>
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