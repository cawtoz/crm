<?php


$esRecibidos = true;

if(isset($_GET['section']) && $_GET['section'] === 'enviados') {
    $esRecibidos = false;
}

$listaCorreos = [];
$correosArray = json_decode($correos, true);

foreach ($correosArray as $correo) {
    if ($correo[$esRecibidos ? 'para' : 'de'] == Auth::user()->email) {
        $listaCorreos[] = $correo;
    }
}

?>

<x-management title="Correos">
<div class="page-heading email-application overflow-hidden">
    <section class="section content-area-wrapper">
        <div class="sidebar-left">
            <div class="sidebar">
                <div class="sidebar-content email-app-sidebar d-flex">
                    <!-- sidebar close icon -->
                    <span class="sidebar-close-icon">
                        <i class="bi bi-x"></i>
                    </span>
                    <!-- sidebar close icon -->
                    <div class="email-app-menu">
                        <div class="form-group form-group-compose">
                            <!-- compose button  -->
                            <button type="button" class="btn btn-primary btn-block my-4 compose-btn">
                                <i class="bi bi-plus"></i>
                                Redactar
                            </button>
                        </div>
                        <div class="sidebar-menu-list ps">
                            <!-- sidebar menu  -->
                            <div class="list-group list-group-messages">
                                <a href="?section=recibidos" class="list-group-item pt-0 {{ $esRecibidos == true ? 'active' : ''}}" id="inbox-menu">
                                    <div class="fonticon-wrap d-inline me-3">

                                        <svg class="bi" width="1.5em" height="1.5em" fill="currentColor">
                                            <use
                                                xlink:href="/assets/static/images/bootstrap-icons.svg#envelope" />
                                        </svg>
                                    </div>
                                    Recibidos
                                    <span
                                        class="badge bg-light-primary badge-pill badge-round float-right mt-50">5</span>
                                </a>
                                <a href="?section=enviados" h class="list-group-item {{ $esRecibidos == false ? 'active' : ''}}">
                                    <div class="fonticon-wrap d-inline me-3">

                                        <svg class="bi" width="1.5em" height="1.5em" fill="currentColor">
                                            <use
                                                xlink:href="/assets/static/images/bootstrap-icons.svg#archive" />
                                        </svg>
                                    </div>
                                    Enviados
                                </a>
                            </div>
                            <!-- sidebar menu  end-->
                            <!-- sidebar label end -->
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User new mail right area -->
                <div class="compose-new-mail-sidebar ps">
                    <div class="card shadow-none quill-wrapper p-0">
                        <div class="card-header">
                            <h3 class="card-title" id="emailCompose">Nuevo Correo</h3>
                            <button type="button" class="close close-icon email-compose-new-close-btn">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('correos') }}" method="POST" id="compose-form">
                            @csrf
                            <div class="card-content">
                                <div class="card-body pt-0">
                                    <div class="form-group pb-50">
                                        <label for="emailfrom">De</label>
                                        <input type="text" name="de" class="form-control" placeholder="De" value="{{ Auth::user()->email }}" disabled="">
                                    </div>
                                    <div class="form-group">
                                        <label for="emailPara">Para</label>
                                        <input type="email" name="para" class="form-control" placeholder="Para" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailAsunto">Asunto</label>
                                        <input type="text" name="asunto" class="form-control" placeholder="Asunto" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailContenido">Contenido</label>
                                        <textarea type="text" name="contenido" class="form-control" placeholder="Contenido" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end pt-0">
                                <button type="submit" class="btn-send btn btn-primary me-4">
                                    <i class="bi bi-send me-3"></i> <span class="d-sm-inline d-none">Enviar</span>
                                </button>
                            </div>
                        </form>
                        <!-- form start end-->
                    </div>
                </div>
                <!--/ User Chat profile right area -->
            </div>
        </div>
        <div class="content-right">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- email app overlay -->
                    <div class="app-content-overlay"></div>
                    <div class="email-app-area">
                        <!-- Email list Area -->
                        <div class="email-app-list-wrapper">
                            <div class="email-app-list">
                                <div class="email-action">
                                    <!-- action right start here -->
                                    <div class="action-right d-flex flex-grow-1 align-items-center justify-content-around">
                                        <div class="sidebar-toggle d-block d-lg-none">
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-list fs-5" ></i>
                                            </button>
                                        </div>
                                        <!-- search bar  -->
                                        <div class="email-fixed-search flex-grow-1">

                                            <div class="form-group position-relative  mb-0 has-icon-left">
                                                <input type="text" class="form-control" placeholder="Search email..">
                                                <div class="form-control-icon">
                                                    <svg class="bi" width="1.5em" height="1.5em" fill="currentColor">
                                                        <use
                                                            xlink:href="/assets/static/images/bootstrap-icons.svg#search" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / action right -->

                                <!-- email user list start -->
                                <div class="email-user-list list-group ps ps--active-y">
                                    <ul class="users-list-wrapper media-list">
                                        @foreach ($listaCorreos as $correo)
                                        <li class="media">
                                            <div class="user-action">
                                            </div>
                                            <div class="pr-50">
                                                <div class="avatar">
                                                    <img class="rounded-circle" src="/assets/compiled/jpg/5.jpg"
                                                        alt="Generic placeholder image">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="user-details">
                                                    <div class="mail-items">
                                                        <span class="list-group-item-text text-truncate mb-0">
                                                            {{ $correo['asunto'] }}
                                                        </span>
                                                    </div>
                                                    <div class="mail-meta-item">
                                                        <span class="float-right">
                                                            @if ($esRecibidos)
                                                            <span class="mail-date">De: {{ $correo['de'] }}</span>
                                                            @else
                                                            <span class="mail-date">Para: {{ $correo['para'] }}</span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mail-message">
                                                    <p class="list-group-item-text mb-0 truncate">
                                                        {{ $correo['contenido'] }}
                                                    </p>
                                                    <div class="mail-meta-item">
                                                        <span class="float-right">
                                                            <span class="bullet bullet-info bullet-sm"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- email user list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', () => {
            document.querySelector('.email-app-sidebar').classList.toggle('show')
        })
        document.querySelector('.sidebar-close-icon').addEventListener('click', () => {
            document.querySelector('.email-app-sidebar').classList.remove('show')
        })
        document.querySelector('.compose-btn').addEventListener('click', () => {
            document.querySelector('.compose-new-mail-sidebar').classList.add('show')
        })
        document.querySelector('.email-compose-new-close-btn').addEventListener('click', () => {
            document.querySelector('.compose-new-mail-sidebar').classList.remove('show')
        })
    </script>
</x-management>
