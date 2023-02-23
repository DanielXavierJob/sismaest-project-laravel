@extends('Dashboard.Configuration.constructor', ["title" => "SISMAEST - ".$title, "description" => $description, "title_page" => $title_page, "description_page" => $description_page, "icon"=> $icon, "page" => "Inicio"])

@section('content')
<div class="main-card mb-3 card">
    <div class="row">
        <div class="col-md-4">
            <div class="widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Categorias</div>
                            <div class="widget-subheading">Categorias de Material</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success">{{count($category)}}</div>
                        </div>
                    </div>
                    <div class="widget-progress-wrapper">
                        <div class="progress-bar-sm progress-bar-animated-alt progress">

                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{round((count($category) * 100) / 100, 2)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{round((count($category) * 100) / 100, 2)}}%;"></div>
                        </div>
                        <div class="progress-sub-label">
                            <div class="sub-label-left">Categorias do Material no sistema</div>
                            <div class="sub-label-right">100%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Subcategorias</div>
                            <div class="widget-subheading">Subcategorias de Material</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning">{{count($subcategory)}}</div>
                        </div>
                    </div>
                    <div class="widget-progress-wrapper">
                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{round((count($subcategory) * 100) / 100, 2)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{round((count($subcategory) * 100) / 100, 2)}}%"></div>
                        </div>
                        <div class="progress-sub-label">
                            <div class="sub-label-left">Total de Subcategorias no Sistema</div>
                            <div class="sub-label-right">100%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Estoque</div>
                            <div class="widget-subheading">Total de itens </div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger">{{count($itens)}}</div>
                        </div>
                    </div>
                    <div class="widget-progress-wrapper">
                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{round((count($itens) * 100) / 100, 2)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{round((count($itens) * 100) / 100, 2)}}%;"></div>
                        </div>
                        <div class="progress-sub-label">
                            <div class="sub-label-left">Total de Material no Sistema</div>
                            <div class="sub-label-right">100%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-sm-12 col-lg-6">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    <i class="header-icon lnr-lighter icon-gradient bg-amy-crisp"></i>
                    Historico
                </div>

            </div>
            <div class="scroll-area-lg">
                <div class="scrollbar-container ps ps--active-y">
                    <div class="p-4">
                        <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                            <?php
                            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

                            ?>
                            @foreach($history as $his)

                            <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <p>{{$his->his_dec}}. <span class="text-success">{{ucfirst( utf8_encode( strftime("%A, %B de %Y, as %H:%M:%S", strtotime($his->created_at) ) ) );}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: -418px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 418px; height: 400px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 205px; height: 195px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Atualizações do Dia</h5>
                <div id="carouselExampleControls2" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">

                        {{$i = 1}}
                        @foreach($ntf as $nt)
                        <div class="carousel-item @if($i == 1)active {{$i = 0}}@endif">
                            <img class="d-block w-100" src="{{asset($nt->noty_img)}}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$nt->noty_name}}</h5>
                                <p>{{$nt->noty_desc}}</p>
                            </div>
                        </div>

                        @endforeach


                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">


</div>
<div class="row">
    <div class="card col-md-12 mb-3">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Categorias
            </div>

        </div>
        <div class="card-body">
            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Categoria</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Subcategorias</th>
                        <th class="text-center">Quantidade</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $cat)
                    <tr>
                        <td class="text-center">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">

                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading">{{$cat->category_name}}</div>
                                        <div class="widget-subheading opacity-7">{{$cat->category_description}}</div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center text-muted">{{$cat->category_estado}}</td>

                        <td class="text-center"><?php

                                                foreach ($subcategory as $sb) {
                                                    if ($sb->sbc_key == $cat->category_key) {
                                                        echo $sb->sbc_name . ", ";
                                                    }
                                                }

                                                ?></td>
                        <td class="text-center">
                            <div class="badge badge-warning">10</div>
                        </td>
                        <td class="text-center">
                            <a type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm" href="{{route('estoque.categorias.edit', ['id' => $cat->category_key])}}">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">Categoria</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Subcategorias</th>
                        <th class="text-center">Quantidade</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
@endsection