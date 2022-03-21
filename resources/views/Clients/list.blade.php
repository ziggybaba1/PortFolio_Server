<x-app-layout>
    
<div class="pagetitle">
      <h1>  {{ __('Client') }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">  {{ __('Home') }}</a></li>
          <li class="breadcrumb-item active">  {{ __('Client') }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Client List</h5>
              @if (Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle"></i> {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
                @endif
              <!-- Table with stripped rows -->
              <table class="table ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">url</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($client as $clients)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$clients->name}}</td>
                    <td>{{$clients->url}}</td>
                    <td><img src="{{url('')}}{{\App\Models\Media::findOrFail($clients->media)->url}}" alt=""></td>
                    <td>
                        <a href="/clients/edit/{{$clients->id}}" class="btn btn-sm btn-dark">Edit</a>
                        <a href="/clients/delete/{{$clients->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
</x-app-layout>
