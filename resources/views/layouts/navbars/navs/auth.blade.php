<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper d-none">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#">{{ $page ?? __('Dashboard') }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <!--  <li class="search-bar input-group">
                    <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                        <span class="d-lg-none d-md-block">{{ __('Search') }}</span>
                    </button>
                </li>-->
                <li class="dropdown nav-item d-lg-none">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="notification d-none d-lg-block d-xl-block"></div>
                        <i class="tim-icons icon-sound-wave"></i>
                        <p class="d-lg-none"> {{ __('Menu') }} </p>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                        @hasanyrole('super_admin|admin')
                        <li class="nav-link">
                            <a href="{{ route('etudiant.index') }}"
                                class="nav-item dropdown-item">{{ __('Dashbord') }}</a>
                        </li>
                        @endhasanyrole

                        @hasanyrole('super_admin|admin')
                        <li class="nav-link">
                            <a href="{{ route('etudiant.index') }}"
                                class="nav-item dropdown-item">{{ __('Dossier étudiant') }}</a>
                        </li>
                        @endhasanyrole

                        @hasanyrole('admin|professeur')
                        <li class="nav-link">
                            <a href="{{ route('assiduite.index') }}"
                                class="nav-item dropdown-item">{{ __('Assiduité') }}</a>
                        </li>
                        @endhasanyrole

                        @hasanyrole('super_admin|admin')
                        <li class="nav-link">
                            <a href="{{ route('evaluation.index') }}"
                               class="nav-item dropdown-item">{{ __('Gestion Documents') }}</a>
                        </li>
                        @endhasanyrole

                        @hasanyrole('super_admin|admin')
                        <li class="nav-link">
                            <a href="{{ route('evaluation.index') }}"
                               class="nav-item dropdown-item">{{ __('Evaluation') }}</a>
                        </li>
                        @endhasanyrole

                        @hasanyrole('professeur')
                        <li class="nav-link">
                            <a href="{{ route('pedagogie.index') }}"
                               class="nav-item dropdown-item">{{ __('Evaluation') }}</a>
                        </li>
                        @endhasanyrole

                        @hasanyrole('parent|etudiant')
                        <li class="nav-link">
                            <a href="{{ route('document.index') }}"
                               class="nav-item dropdown-item">{{ __('Mes demandes') }}</a>
                        </li>
                        @endhasanyrole


                        @hasanyrole('parent|etudiant')
                        <li class="nav-link">
                            <a href="{{ route('document.index') }}"
                               class="nav-item dropdown-item">{{ __('Mes notes') }}</a>
                        </li>
                        @endhasanyrole

                        @hasanyrole('super_admin|admin')
                        <li class="nav-link">
                            <a href="{{ route('home') }}"
                               class="nav-item dropdown-item">{{ __('Parametre') }}</a>
                        </li>
                        @endhasanyrole



                    </ul>
                </li>

                <li class="dropdown nav-item">
                    <div>
                        <select id="annee" name="annee" class="form-control " title="{{ __('Année') }}">
                            <option value="{{session('annee')}}">{{session('annee')}}</option>
                        </select>

                    </div>
                </li>

                <li class="dropdown nav-item">
                    <div>
                        <select id="annee" name="annee" class="form-control " title="{{ __('Semetre') }}">
                            <option>Sem 1</option>
                            <option>Sem 2</option>
                        </select>

                    </div>
                </li>


                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                        @hasanyrole('parent|etudiant')
                        <div class="photo">
                            <img src="{{!empty(session('photoIcone')) && (session('photoIcone') <> "no_picture.jpg") ? asset('/img').'/'.session('photoIcone')  : asset('/img/student.png')}}" title="photo"
                                 alt="{{ __('Profile Photo') }}">
                        </div>
                        @else
                            <div class="photo">
                                <img src="{{ asset('black') }}/img/teacher.png" title="admin"
                                     alt="{{ __('Profile Photo') }}">
                            </div>
                            @endhasanyrole

                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none">{{ __('Log out') }}</p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="nav-link">
                            <a href="{{ route('profile.edit') }}"
                                class="nav-item dropdown-item">{{ __('Profile') }}</a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('profile.edit') }}"
                               class="nav-item dropdown-item">{{session('photoIcone')}}</a>
                        </li>
                        @hasanyrole('super_admin|admin')
                        <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item">{{ __('Parametre') }}</a>
                        </li>
                        @endhasanyrole
                        <li class="dropdown-divider"></li>
                        <li class="nav-link">
                            <a href="{{ route('logout') }}" class="nav-item dropdown-item"
                                onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Déconnexion') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ __('SEARCH') }}">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
        </div>
    </div>
</div>
