  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="super-admin/dashboard" class="brand-link">
          <span class="brand-text font-weight-light">Tech Stack</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Admin</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="/super-admin/home" class="nav-link {{ isset($home_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Home
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/super-admin/add-openings" class="nav-link {{ isset($openings_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                             Job Openings
                          </p>
                      </a>
                  </li>
                  {{-- <li class="nav-item">
                <a href="/super-admin/international-journey" class="nav-link {{ isset($international_page) ? 'active' : '' }}">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      International Journey
                   </p>
                </a>
             </li> --}}
                  {{-- <li class="nav-item">
                      <a href="/super-admin/gallery-images" class="nav-link {{ isset($gallery_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Gallery Images
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/super-admin/video" class="nav-link {{ isset($video_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Videos
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/super-admin/blog" class="nav-link {{ isset($blog_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Blogs
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/super-admin/certificate"
                          class="nav-link {{ isset($certificate_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Certificates
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="/super-admin/career" class="nav-link {{ isset($career_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Career
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="/super-admin/testimonial"
                        class="nav-link {{ isset($testimonial_page) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Testimonials
                        </p>
                    </a>
                </li>
                  <li class="nav-item">
                      <a href="/super-admin/contactrequest" class="nav-link {{ isset($contact_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Contact Requests
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="/super-admin/contact"
                          class="nav-link {{ isset($contact_details_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Contact Details
                          </p>
                      </a>
                  </li>
                  <p style="color:white">Products</p>
                  <li class="nav-item">
                      <a href="/super-admin/category" class="nav-link {{ isset($category_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Categories
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/super-admin/subcategory"
                          class="nav-link {{ isset($subcategory_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Sub Categories
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/super-admin/product" class="nav-link {{ isset($product_page) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Products
                          </p>
                      </a>
                  </li> --}}
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
