@extends('aplikasi.layout')
@section('admin')
<li class="sub-menu " >
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
@endsection
@section('content')

<div class="row">
                <div class="col-md-12">
                    <section class="panel">
                          <header class="panel-heading">
                              <h3>Dashboard</h3>







                          </header>
                    <div class="panel-body">

                    <center><h1>SELAMAT DATANG DI</h1><br/><h4> E-vote SMK MAHAPUTRA</h4></center><br/><br/><br/>



                    <h1>TIGA LANGKH MEMILIH</h1><br/><br/><br/>

                    <br/>
                    <div class="col-lg-4"><section class="panel">
                                                                                                            <div class="panel-body project-team">
                                                                                                                <div class="task-progress">
                                                                                                                      <h3><center>Langkah pertama</center></h3>
                                                                                                                </div>
                                                                  </div>
                                                                  <table class="table table-hover personal-task">
                                                                        <h1><center>LOGIN</center></h1>
                                                                    </table>
                                                                </section></div>



                     <div class="col-lg-4"><section class="panel">
                                                                                                                                 <div class="panel-body project-team">
                                                                                                                                     <div class="task-progress">
                                                                                                                                           <h3>Langkah Kedua</h3>
                                                                                                                                     </div>
                                                                                       </div>
                                                                                       <table class="table table-hover personal-task">
                                                                                             <h1><center>PILIH KATEGORI</center></h1>
                                                                                         </table>
                                                                                     </section></div>



                         <div class="col-lg-4"><section class="panel">
                                                                                                                                                       <div class="panel-body project-team">
                                                                                                                                                           <div class="task-progress">
                                                                                                                                                                 <h3>Langkah Ketiga</h3>
                                                                                                                                                           </div>
                                                                                                             </div>
                                                                                                             <table class="table table-hover personal-task">
                                                                                                                   <h1><center>PILIH KANDIDAT</center></h1>
                                                                                                               </table>
                                                                                                           </section></div>
                                                                                                           <br/><br/><br/>





                    </div>
                    </section>
                </div>






@endsection