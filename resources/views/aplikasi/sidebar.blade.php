 <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="home">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                      <a href="/regis-calon">
                          <i class="icon_pencil-edit"></i>
                          <span>Pendaftaran Calon</span>
                      </a>
                  </li>


                   <li class="sub-menu">
                                        <a href="javascript:;" class="">
                                            <i class="icon_desktop"></i>
                                            <span>VOTING</span>
                                            <span class="menu-arrow arrow_carrot-right"></span>
                                        </a>
                                        <ul class="sub">
                                            @foreach($f as $garaetek)
                                            @if($gararetek2 && $gararetek2->id_kategori==$garaetek->id )
                                            @else
                                            {{--@if($gararetek2->id_kategori != $gararetek->id)--}}
                                            <li><a class="" href="voting">{{$garaetek->nama_kategori}}</a></li>
                                            {{--@endif--}}
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                  @if(auth()->user()->level==1)
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>FITUR Admin</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/data-kategori">data kategori</a></li>
                          <li><a class="" href="/data-kelas">data kelas</a></li>
                          <li><a class="" href="/data-user">data user</a></li>
                          <li><a class="" href="/data-pencalon">data pencalonan</a></li>
                      </ul>
                  </li>
                  @endif

                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>