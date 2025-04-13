 <!--start sidebar-->
 <aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <!-- <div class="logo-icon">
        <img src="{{ asset('dashboard/assets/images/logo-icon.png')}}" class="logo-img" alt="">
      </div> -->
      <div class="logo-name flex-grow-1 text-center fw-bold">
        <img src="images/تميز copy 2.svg" width="100px"  alt="">
      </div>
      <div class="sidebar-close">
        <span class="material-icons-outlined">close</span>
      </div>
    </div>
    <div class="sidebar-nav">
      <!--navigation-->
      <ul class="metismenu" id="sidenav">
        <li>
          <a href="{{ route('admin.home') }}">
            <div class="parent-icon"><i class="material-icons-outlined">home</i>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li>
            <a href="{{ route('admin.stages.index') }}">
              <div class="parent-icon"><i class="material-icons-outlined">person</i>
              </div>
              <div class="menu-title">Stage</div>
            </a>
          </li>
        <li>
            <a href="{{ route('admin.grades.index') }}">
              <div class="parent-icon"><i class="material-icons-outlined">person</i>
              </div>
              <div class="menu-title">Grade</div>
            </a>
          </li>
        
        <li>
          <a href="{{ route('admin.instructors.index') }}">
            <div class="parent-icon"><i class="material-icons-outlined">person</i>
            </div>
            <div class="menu-title">Instructor</div>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.courses.index') }}">
            <div class="parent-icon"><i class="fa-solid fa-book"></i>
            </div>
            <div class="menu-title">Courses</div>
          </a>
        </li>
        <li>
          <a href="student.html">
            <div class="parent-icon"><i class="fa-solid fa-user-graduate"></i>
            </div>
            <div class="menu-title">Student</div>
          </a>
        </li>
        <li>
          <a href="parent.html">
            <div class="parent-icon"><i class="fa-solid fa-user-alt"></i>
            </div>
            <div class="menu-title">Parent</div>
          </a>
        </li>
        <li>
          <a href="setting.html">
            <div class="parent-icon"><i class="fa-solid fa-cog"></i>
            </div>
            <div class="menu-title">Setting</div>
          </a>
        </li>
        <li>
          <a href="service.html">
            <div class="parent-icon"><i class="fa-solid fa-list"></i>
            </div>
            <div class="menu-title">Services</div>
          </a>
        </li>

      </ul>

      <div id="footer-section" style="padding-top: 300px;" class="text-center">
        <p class="mb-1 p-0">Copyright © 2024. All right reserved.</p>
        <p>Developed by<a href="https://brmja.tech/" target="_blank"> brmja.tech</a></p>
      </div>

      <!--end navigation-->
    </div>

  </aside>
  <!--end sidebar-->
