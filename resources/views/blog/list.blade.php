<x-app-layout>
    
<div class="pagetitle">
      <h1>  {{ __('Blogs') }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">  {{ __('Home') }}</a></li>
          <li class="breadcrumb-item active">  {{ __('Blogs') }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Post List</h5>
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
                    <th scope="col">Title</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Short Description</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\Blog::get() as $plan)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$plan->title}}</td>
                    <td><img src="" alt=""></td>
                    <td>{{$plan->subtitle}}</td>
                    <td>
                        <a href="/blog/edit/{{$plan->id}}" class="btn btn-sm btn-dark">Edit</a>
                        <a href="/blog/delete/{{$plan->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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
