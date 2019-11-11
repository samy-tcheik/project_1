<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon icon-speedometer"></i> @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-title">
                @lang('menus.backend.sidebar.system')
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/auth*')) }}" href="#">
                        <i class="nav-icon icon-user"></i> @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="divider"></li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/log-viewer*')) }}" href="#">
                    <i class="nav-icon icon-people"></i> Adhérents
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.adherents.create', ['prospect'=>0]) }}">
                            <i class="fas fa-user-plus"></i> Créer adhérent
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.adherents.index', ['prospect'=>0]) }}">
                            <i class="fas fa-list"></i> liste des adhérents
                        </a>
                    </li>
                    <div class="nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" ><i class="fas fa-user-cog"></i> Configuration</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.foreign.index',["table"=>"status"]) }}">
                                    Status
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.foreign.index',["table"=>"juridic_forms"]) }}">
                                    Formes Juridiques
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.foreign.index',["table"=>"regions"]) }}">
                                    Regions
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.foreign.index',["table"=>"cities"]) }}">
                                    Cités
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.foreign.index',["table"=>"countries"]) }}">
                                    Pays
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.foreign.index',["table"=>"sectors"]) }}">
                                    Secteurs
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.foreign.index',["table"=>"activities"]) }}">
                                    Activitées
                                </a>
                            </li>
                        </ul>
                    </div>

                </ul>
            </li>
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/log-viewer*')) }}" href="#">
                    <i class="nav-icon icon-map"></i> Eventments
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.type.index')}}">
                         Type d'évenements
                        </a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*'))}}" href=" {{ route('admin.event.index') }}">
                        Evenements
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*'))}}" href="#">
                        Historique
                        </a>
                    </li>
                </ul>
            </li>
            <!--   -->

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/log-viewer*')) }}" href="#">
                    <i class="nav-icon icon-settings"></i> Prospect
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.adherents.create', ['prospect'=>1]) }}">
                            <i class="fas fa-user-plus"></i> Créer Prospect
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.adherents.index',["prospect"=>1]) }}">
                            <i class="fas fa-list"></i> liste des prospectes
                        </a>
                    </li>
                </ul>
            </li>

            <li class="divider"></li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/log-viewer*')) }}" href="#">
                    <i class="nav-icon icon-wallet"></i>  Cotisation
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.cotisation.create') }}">
                            <i class="fas fa-plus-square"></i> Créer Cotisation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.cotisation.index') }}">
                            <i class="fas fa-list"></i> liste des Cotisations
                        </a>
                    </li>
                    <div class="nav-dropdown">
                        <a  class="nav-link nav-dropdown-toggle"><i class="fas fa-cogs"></i> Configuration</a>
                        <div class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.foreign.index',["table"=>"montants"]) }}">
                                    Montants
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('admin.foreign.index',["table"=>"paiment_modes"]) }}">
                                    Paiment modes
                                </a>
                            </li>
                        </div>

                    </div>
                </ul>
            </li>

            <li class="divider"></li>

        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
