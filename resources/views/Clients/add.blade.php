<x-app-layout>
@php
$client=$client ?? '';
@endphp
<div class="pagetitle">
    @if($client)
      <h1>  {{ __('Edit Client')}}</h1>
      @else
      <h1>  {{ __('Add Client')}}</h1>
      @endif
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">  {{ __('Home') }}</a></li>
          <li class="breadcrumb-item active">  {{!$client? __('Add Client'): __('Edit Client')}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
    
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Client Form</h5>
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
              <form class="row g-3"  action="{{!$client?url('client/submit'):url('client/update/'.$client->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="name" value="{{$client->name ?? ''}}" class="form-control" id="name" placeholder="Client's name">
                    <label for="name">Name</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="url" value="{{$client->url ?? ''}}" class="form-control" id="title" placeholder="Client URL">
                    <label for="title">URL</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="file" name="image" multiple  class="form-control" id="image" placeholder="Client Images">
                    <label for="image">Upload Client Image</label>
                  </div>
                </div>
                @if($client)
                <div class="col-md-6">
                    <img src="{{url('')}}{{\App\Models\Media::find($client->media)->url ?? ''}}" width="100" alt="">
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