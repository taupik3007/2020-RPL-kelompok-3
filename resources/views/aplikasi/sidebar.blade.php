 <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="home">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  {{--@if(auth()->user()->level==1)--}}
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>FITUR Admin</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li ><a href="" href=""></a></li>
                          <li><a class="" href="tambah-kelas">Tambah kelas</a></li>
                          <li><a class="" href="data-user">data user</a></li>
                      </ul>
                  </li>
                  {{--@endif--}}

                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>