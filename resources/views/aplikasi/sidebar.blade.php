 <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="/home">
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
                                            @foreach($data_kategori as $kategori)
                                                @if($hitung>0)
                                                    <?php $no=0 ;?>
                                                    @foreach($user as $use)
                                                    @if($use->id_kategori==$kategori->id)
                                                    @else
                                                    <?php $no++; ?>
                                                    @if($no==$hitung)
                                                    <li><a class="" href="/voting/{{$kategori->id}}">{{$kategori->nama_kategori}}</a></li>
                                                    @endif
                                                    @endif

                                                    @endforeach
                                                @else
                                                <li><a class="" href="/voting/{{$kategori->id}}">{{$kategori->nama_kategori}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>

                                    </li>

                                    <li class="sub-menu">
                                                                            <a href="javascript:;" class="">
                                                                                <i class="icon_desktop"></i>
                                                                                <span>Akumulasi voting</span>
                                                                                <span class="menu-arrow arrow_carrot-right"></span>
                                                                            </a>
                                                                            <ul class="sub">
                                                                                 @foreach($data_kategori as $kategori)
                                                                                  <li><a class="" href="/voting/{{$kategori->id}}/akumulasi">{{$kategori->nama_kategori}}</a></li>
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
                          @yield('sidebar')
                          <li><a class="" href="/data-kelas">data kelas</a></li>
                          <li><a class="" href="/data-user">data user</a></li>
                          <li><a class="" href="/data-pencalon">data pencalonan</a></li>
                          <li><a class="" href="/data-calon">data kandidat</a></li>

                      </ul>
                  </li>
                  @endif

                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>