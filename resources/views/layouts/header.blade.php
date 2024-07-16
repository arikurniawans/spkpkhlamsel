<div class="header">
			<div class="header-left">
				<a href="index.html" class="logo"> <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/Lambang_Kabupaten_Lampung_Selatan.png" width="50" height="70" alt="logo"> <span class="logoclass">Bansos PKH</span> </a>
				<a href="index.html" class="logo logo-small"> <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/Lambang_Kabupaten_Lampung_Selatan.png" alt="Logo" width="30" height="30"> </a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
			<ul class="nav user-menu">
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="{{asset('templates/assets/img/admin.png')}}" width="31" alt="{{Auth::user()->name}}"></span> </a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm"> <img src="{{asset('templates/assets/img/admin.png')}}" alt="User Image" class="avatar-img rounded-circle"> </div>
							<div class="user-text">
								<h6>{{Auth::user()->name}}</h6>
								<p class="text-muted mb-0">Administrator</p>
							</div>
						</div> <a class="dropdown-item" href="{{ route('logout') }}">Logout</a> </div>
				</li>
			</ul>
		</div>
