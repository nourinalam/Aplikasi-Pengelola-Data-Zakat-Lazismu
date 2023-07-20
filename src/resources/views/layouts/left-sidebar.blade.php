    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            @guest
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('profile.jpg')}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">HALO LAZIS!</div>
                    <div class="email">Tamu</div>
                </div>
            </div>
            <div class="menu">
                <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="{{route('home')}}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #User Info -->
            @else
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('profile.jpg') }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                    <div class="email">{{Auth::user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{route('profil.edit')}}"><i class="material-icons">person</i>Profile</a></li>
                            @if(Auth::user()->hasRole('Administrator'))
                                <li><a href="{{ route('user.history') }}"><i class="material-icons">list</i>History Login</a></li>
                            @endif
                            <li role="seperator" class="divider"></li>
                            <li><a href="{{ route('password.change') }}"><i class="material-icons">https</i>Ganti Password</a></li>
                            {{-- <li><a href="{{ route('jeniszakat.change') }}"><i class="material-icons">list</i>Atur Jenis Zakat</a></li> --}}
                            <li><a href="{{ route('jenismustahiq.change') }}"><i class="material-icons">list</i>Jenis Mustahiq</a></li>
                            <li><a href="{{ route('pengeluaran') }}"><i class="material-icons">list</i>Pengeluaran</a></li>
                            {{--  <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>  --}}
                            {{--  <li role="seperator" class="divider"></li>  --}}
                            {{--  <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>  --}}
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="{{ (\Request::route()->getName() == 'home') ? 'active' : '' }}">
                        <a href="{{route('home')}}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'zakat' || \Request::route()->getName() == 'zakat.create' || \Request::route()->getName() == 'zakat.createOther' || \Request::route()->getName() == 'zakat.confirmation' || \Request::route()->getName() == 'zakat.edit' || \Request::route()->getName() == 'jeniszakat.change') ? 'active' : '' }}">
                        <a href="{{route('zakat')}}">
                            <i class="material-icons">account_balance_wallet</i>
                            <span>Data Muzakki</span>
                        </a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'jenismustahiq.change') || (\Request::route()->getName() == 'mustahiq') ? 'active' : '' }}">
                        <a href="{{route('mustahiq')}}">
                            <i class="material-icons">face</i>
                            <span>Data Mustahiq</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('jenismustahiq.change') }}">
                            <i class="material-icons">accessible</i>
                            <span>Jenis Mustahiq</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('pengeluaran') }}">
                            <i class="material-icons">transfer_within_a_station</i>
                            <span>Penyaluran Zakat</span>
                        </a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'report') || (\Request::route()->getName() == 'pengeluaran') ? 'active' : '' }}">
                        <a href="{{route('report')}}">
                            <i class="material-icons">assignment</i>
                            <span>Laporan</span>
                        </a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'user' || \Request::route()->getName() == 'profil.edit' || \Request::route()->getName() == 'password.change' || \Request::route()->getName() == 'role.edit' || \Request::route()->getName() == 'user.history') ? 'active' : '' }}">
                        @if(Auth::user()->hasRole('Administrator'))
                            <a href="{{route('user')}}">
                        @else
                            <a href="{{route('profil.edit')}}">
                        @endif
                            <i class="material-icons">account_box</i>
                            <span>Amil Zakat</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; {{date('Y')}} <a href="javascript:void(0);">{{ config('app.name', 'Laravel') }}</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 2.1
                </div>
            </div>
            <!-- #Footer -->
            @endguest
        </aside>
        <!-- #END# Left Sidebar -->
    </section>