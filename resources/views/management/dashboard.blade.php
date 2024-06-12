<?php

$arrayVisitasPHP = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

foreach ($visitas as $visita) {
    $numeroMes = date("n", strtotime($visita->created_at));
    $arrayVisitasPHP[$numeroMes - 1]++;
}

$correosRecibidos = [];
$correosArray = json_decode($correos, true);

foreach ($correosArray as $correo) {
    if ($correo['para'] == Auth::user()->email) {
        $correosRecibidos[] = $correo;
    }
}

?>

<script>
    var arrayVisitasJS = <?php echo json_encode($arrayVisitasPHP); ?>;
</script>


<x-management title="Dashboard">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Visitas</h6>
                                    <h6 class="font-extrabold mb-0">{{ count(json_decode($visitas)) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Clientes</h6>
                                    <h6 class="font-extrabold mb-0">{{ count(json_decode($clientes)) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Productos</h6>
                                    <h6 class="font-extrabold mb-0">{{ count(json_decode($productos)) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Ventas</h6>
                                    <h6 class="font-extrabold mb-0">{{ count(json_decode($ventas)) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Visitas del Home</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="/assets/compiled/jpg/1.jpg" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                            <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Correos Recientes</h4>
                </div>
                <div class="card-content pb-4">
                    @foreach ($correosRecibidos as $correoRecibido)
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="/assets/compiled/jpg/4.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ $correoRecibido['de'] }}</h5>
                                <h6 class="text-muted mb-0">{{ $correoRecibido['asunto'] }}</h6>
                            </div>
                        </div>
                    @endforeach
                    <div class="px-4">
                        <a href="{{ route('correos') }}"><button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>Ver Todos</button></a>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-management>
