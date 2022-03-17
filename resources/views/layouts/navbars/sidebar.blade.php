<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('I') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('ISCHOOL') }}</a>
        </div>
        <ul class="nav">

            @hasanyrole('super_admin|admin')

          <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            @endhasanyrole
         <!--      <li>
              <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">!-->

            @hasanyrole('super_admin|admin')
            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('etudiant.index',["#dossier"] ) }}"  >
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Dosier étudiants') }}</p>
                </a>
            </li>

            @endhasanyrole

            @hasanyrole('admin|professeur')

            <li @if ($pageSlug == 'assiduite') class="active " @endif>
                <a href="{{ route('assiduite.index') }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('Assiduité') }}</p>
                </a>
            </li>
            @endhasanyrole



                @hasanyrole('super_admin|admin')
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('evaluation.index') }}">
                    <i class="tim-icons icon-bank"></i>
                    <p>{{ __('Gestion Documents') }}</p>
                </a>
            </li>
               @endhasanyrole

            @hasanyrole('super_admin|admin')
            <li @if ($pageSlug == 'document') class="active " @endif>
                <a href="{{ route('evaluation.index') }}">
                    <i class="tim-icons icon-bank"></i>
                    <p>{{ __('Evaluation') }}</p>
                </a>
            </li>
            @endhasanyrole


            @hasanyrole('professeur')
            <li @if ($pageSlug == 'document') class="active " @endif>
                <a href="{{ route('pedagogie.index') }}">
                    <i class="tim-icons icon-bank"></i>
                    <p>{{ __('Evaluation') }}</p>
                </a>
            </li>
            @endhasanyrole


                @hasanyrole('parent|etudiant')

            <li @if ($pageSlug == 'document') class="active " @endif>
                <a href="{{ route('document.index') }}">
                    <i class="tim-icons icon-bank"></i>
                    <p>{{ __('Mes demandes') }}</p>
                </a>
            </li>
                @endhasanyrole


            @hasanyrole('parent|etudiant')

            <li @if ($pageSlug == 'notes') class="active " @endif>
                <a href="{{ route('document.index') }}">
                    <i class="tim-icons icon-notes"></i>
                    <p>{{ __('Mes notes') }}</p>
                </a>
            </li>
            @endhasanyrole



            <li @if ($pageSlug == 'assiduite') class="active " @endif>
                <a href="#" disabled="true">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Profil') }}</p>
                </a>
            </li>

            @hasanyrole('super_admin|admin')

            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Parametre') }}</p>
                </a>
            </li>

            @endhasanyrole



            <!--   </ul>
                 </div>
            </li>!-->
            <!--   <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li>!-->
        </ul>
    </div>
</div>
