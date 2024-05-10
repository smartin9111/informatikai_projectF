      <!-- switcher menu -->
      <div class="switcher">

          <div class="switch_menu">
              <!-- color changer -->
              <div class="switcher_container">
                  <ul id="styleOptions" title="switch styling">
                      <li>
                          <a href="javascript: void(0)" data-theme="green" class="green-color"></a>
                      </li>
                      <li>
                          <a href="javascript: void(0)" data-theme="pink" class="pink-color"></a>
                      </li>
                      <li>
                          <a href="javascript: void(0)" data-theme="violet" class="violet-color"></a>
                      </li>
                      <li>
                          <a href="javascript: void(0)" data-theme="crimson" class="crimson-color"></a>
                      </li>
                      <li>
                          <a href="javascript: void(0)" data-theme="orange" class="orange-color"></a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <!-- end switcher menu -->

      <!-- main header -->
      <header class="main-header header-style-two">
          <!-- header-lower -->
          <div class="header-lower">
              <div class="outer-box">
                  <div class="main-box">
                      <div class="logo-box">
                          <figure class="logo"><a href="{{ url('/') }}"><img
                                      src="{{ asset('assets/images/logo-light.png') }}" alt=""></a></figure>
                      </div>
                      <div class="menu-area clearfix">
                          <!--Mobile Navigation Toggler-->
                          <div class="mobile-nav-toggler">
                              <i class="icon-bar"></i>
                              <i class="icon-bar"></i>
                              <i class="icon-bar"></i>
                          </div>
                          <nav class="main-menu navbar-expand-md navbar-light">
                              <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                  <ul class="navigation clearfix">
                                      @guest
                                          <!-- Látogatóknak megjelenített menüelemek -->
                                          <li><a href="/"><span>Főoldal</span></a></li>
                                          <li><a href="{{ route('register') }}"><span>Regisztráció</span></a></li>
                                      @else
                                          <li><a href="/"><span>Főoldal</span></a></li>
                                          <!-- Bejelentkezett felhasználóknak megjelenített menüelemek -->
                                          @if (Auth::user()->role == 'admin')
                                              <!-- Admin specifikus menüelemek -->
                                              <li><a href="{{ route('admin.partners') }}"><span>Partnerek</span></a></li>
                                              <li><a href="{{ route('admin.vehicles') }}"><span>Járművek</span></a></li>
                                              <li><a href="{{ route('admin.parts') }}"><span>Alkatrészek</span></a></li>
                                              <li><a href="{{ route('admin.offers') }}"><span>Ajánlatok</span></a></li>
                                              <li><a href="{{ route('admin.worksheets') }}"><span>Munkalapok</span></a></li>
                                              <li><a href="{{ route('admin.invoices') }}"><span>Számlák</span></a></li>
                                              <li><a href="{{ route('admin.dashboard') }}"><span>Riportok</span></a></li>
                                          @elseif (Auth::user()->role == 'user')
                                              <!-- Sima felhasználóknak megjelenített menüelemek -->
                                              <li><a href="{{ route('user.vehicles') }}"><span>Járművek</span></a></li>
                                              <li><a href="{{ route('user.offers') }}"><span>Árajánlatok</span></a></li>
                                              <li><a href="{{ route('user.invoices') }}"><span>Számlák</span></a></li>
                                          @endif
                                          <li><a href="{{ route('logout') }}"
                                                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span>Kijelentkezés</span></a>
                                          </li>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                              @csrf
                                          </form>
                                      @endguest
                                  </ul>
                              </div>
                          </nav>
                      </div>
                      <div class="menu-right-content clearfix">
                          @guest
                              <div class="sign-box">
                                  <a href="{{ route('login') }}"><i class="fas fa-user"></i>Bejelentkezés</a>
                              </div>
                          @else
                              <div class="sign-box">
                                  <span><i class="fas fa-user pr-3"></i>{{ Auth::user()->name }}</span>
                              </div>
                          @endguest
                      </div>
                  </div>
              </div>
          </div>
      </header>
      <!-- main-header end -->
