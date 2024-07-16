<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						{{-- <li class="active"> <a href="index.html"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li> --}}
                        <li class="{{ Route::currentRouteName() == 'penduduk' ? 'active' : '' }}"> <a href="{{route('penduduk')}}"><i class="fas fa-users-cog"></i> <span>Data Penduduk</span></a> </li>
                        <li class="{{ Route::currentRouteName() == 'kriteria' ? 'active' : '' }}"> <a href="{{route('kriteria')}}"><i class="fas fa-clipboard-list"></i> <span>Kriteria Penerima</span></a> </li>
                        <li class="{{ Route::currentRouteName() == 'alternatif' ? 'active' : '' }}"> <a href="{{route('alternatif')}}"><i class="fas fa-cube"></i> <span>Data Alternatif</span></a> </li>
                        <li class="{{ Route::currentRouteName() == 'rekomendasi' ? 'active' : '' }}"> <a href="{{route('rekomendasi')}}"><i class="fas fa-user-check"></i> <span>Rekomendasi SAW</span></a> </li>
					</ul>
				</div>
			</div>
		</div>
