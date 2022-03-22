
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
      @if(request()->routeIs('dashboard'))
    <a class="nav-link" href="/dashboard">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
    @else
    <a class="nav-link collapsed" href="/dashboard">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
    @endif
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
  @if(request()->routeIs('blog')||request()->routeIs('blog.add'))
    <a class="nav-link " data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
        @else
        <a class="nav-link collapsed" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
        @endif
      <i class="bi bi-menu-button-wide"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @if(request()->routeIs('blog')||request()->routeIs('blog.add'))
    <ul id="blog-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
    @else
    <ul id="blog-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        @endif
      <li>
      @if(request()->routeIs('blog'))
        <a href="/blogs" class="active">
        @else
        <a href="/blogs" >
        @endif
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>
      <li>
      @if(request()->routeIs('blog.add'))
        <a href="/blog/add" class="active">
        @else
        <a href="/blog/add" >
        @endif
          <i class="bi bi-circle"></i><span>Add New</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
  @if(request()->routeIs('project')||request()->routeIs('project.add'))
    <a class="nav-link " data-bs-target="#plan-nav" data-bs-toggle="collapse" href="#">
        @else
        <a class="nav-link collapsed" data-bs-target="#plan-nav" data-bs-toggle="collapse" href="#">
        @endif
      <i class="bi bi-menu-button-wide"></i><span>Project</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @if(request()->routeIs('project')||request()->routeIs('project.add'))
    <ul id="plan-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
    @else
    <ul id="plan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        @endif
      <li>
      @if(request()->routeIs('project'))
        <a href="/projects" class="active">
        @else
        <a href="/projects" >
        @endif
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>
      <li>
      @if(request()->routeIs('project.add'))
        <a href="/project/add" class="active">
        @else
        <a href="/project/add" >
        @endif
          <i class="bi bi-circle"></i><span>Add New</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
  @if(request()->routeIs('testimonials')||request()->routeIs('testimonial.add'))
    <a class="nav-link" data-bs-target="#transaction-nav" data-bs-toggle="collapse" href="#">
    @else
    <a class="nav-link collapsed" data-bs-target="#transaction-nav" data-bs-toggle="collapse" href="#">
        @endif
      <i class="bi bi-journal-text"></i><span>Testimonial</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @if(request()->routeIs('testimonials')||request()->routeIs('testimonial.add'))
    <ul id="transaction-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      @else
      <ul id="transaction-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      @endif
      <li>
      @if(request()->routeIs('testimonials'))
        <a href="/testimonies" class="active">
          @else
          <a href="/testimonies" >
          @endif
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>
      <li>
      @if(request()->routeIs('testimonial.add'))
        <a href="/testimonies/add" class="active">
        @else
          <a href="/testimonies/add" >
          @endif
          <i class="bi bi-circle"></i><span>Add New</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
  @if(request()->routeIs('clients')||request()->routeIs('clients.add'))
    <a class="nav-link" data-bs-target="#customer-nav" data-bs-toggle="collapse" href="#">
      @else
      <a class="nav-link collapsed" data-bs-target="#customer-nav" data-bs-toggle="collapse" href="#">
      @endif
      <i class="bi bi-layout-text-window-reverse"></i><span>Client</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @if(request()->routeIs('clients')||request()->routeIs('clients.add'))
    <ul id="customer-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
    @else
    <ul id="customer-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      @endif
      <li>
      @if(request()->routeIs('clients'))
        <a href="/clients" class="active">
        @else
        <a href="/clients">
      @endif
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>
      <li>
      @if(request()->routeIs('clients.add'))
        <a href="/clients/add" class="active">
        @else
          <a href="/clients/add" >
          @endif
          <i class="bi bi-circle"></i><span>Add New</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
  @if(request()->routeIs('social')||request()->routeIs('social.insta')||request()->routeIs('social.twitter')||request()->routeIs('social.face')||request()->routeIs('social.link')||request()->routeIs('social.what'))
    <a class="nav-link" data-bs-target="#social-nav" data-bs-toggle="collapse" href="#">
    @else
    <a class="nav-link collapsed" data-bs-target="#social-nav" data-bs-toggle="collapse" href="#">
    @endif  
    <i class="bi bi-bar-chart"></i><span>Social</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @if(request()->routeIs('social')||request()->routeIs('social.insta')||request()->routeIs('social.twitter')||request()->routeIs('social.face')||request()->routeIs('social.link')||request()->routeIs('social.what'))
    <ul id="social-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
    @else
    <ul id="social-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    @endif   
    <li>
    @if(request()->routeIs('social.insta'))
        <a href="/social/instagram" class="active">
        @else
        <a href="/social/instagram">
    @endif   
          <i class="bi bi-circle"></i><span>Instagram</span>
        </a>
      </li>
      <li>
      @if(request()->routeIs('social.twitter'))
        <a href="/social/twitter" class="active">
        @else
        <a href="/social/twitter">
    @endif   
          <i class="bi bi-circle"></i><span>Twitter</span>
        </a>
      </li>
      <li>
      @if(request()->routeIs('social.face'))
        <a href="/social/facebook" class="active">
        @else
        <a href="/social/facebook">
    @endif   
          <i class="bi bi-circle"></i><span>Facebook</span>
        </a>
      </li>
      <li>
      @if(request()->routeIs('social.link'))
        <a href="/social/linkedn" class="active">
        @else
        <a href="/social/linkedn">
    @endif   
          <i class="bi bi-circle"></i><span>Linkedn</span>
        </a>
      </li>
      <li>
      @if(request()->routeIs('social.what'))
        <a href="/social/whatsapp" class="active">
        @else
        <a href="/social/whatsapp">
    @endif   
          <i class="bi bi-circle"></i><span>Whatsapp</span>
        </a>
      </li>
    </ul>
  </li><!-- End Charts Nav -->

 
  <li class="nav-item">
  @if(request()->routeIs('contact'))
    <a class="nav-link" href="/contact">
    @else
    <a class="nav-link collapsed" href="/contact">
      @endif
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li>

  <li class="nav-item">
    @if(request()->routeIs('media')||request()->routeIs('media.add'))
      <a class="nav-link " data-bs-target="#media-nav" data-bs-toggle="collapse" href="#">
          @else
          <a class="nav-link collapsed" data-bs-target="#media-nav" data-bs-toggle="collapse" href="#">
          @endif
        <i class="bi bi-images"></i><span>Media</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      @if(request()->routeIs('media')||request()->routeIs('media.add'))
      <ul id="media-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      @else
      <ul id="media-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          @endif
        <li>
        @if(request()->routeIs('media'))
          <a href="/media" class="active">
          @else
          <a href="/media" >
          @endif
            <i class="bi bi-circle"></i><span>List</span>
          </a>
        </li>
        <li>
        @if(request()->routeIs('media.add'))
          <a href="/media/add" class="active">
          @else
          <a href="/media/add" >
          @endif
            <i class="bi bi-circle"></i><span>Add New</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->
 
  <li class="nav-item">
  @if(request()->routeIs('settings'))
    <a class="nav-link" href="/settings">
    @else
    <a class="nav-link collapsed" href="/settings">
      @endif
      <i class="bi bi-cart"></i>
      <span>Payment Settings</span>
    </a>
  </li>
</ul>

</aside><!-- End Sidebar-->

