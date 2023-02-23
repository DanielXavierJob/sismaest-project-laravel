@extends('Dashboard.Configuration.constructor', ["title" => "SISMAEST - ".$title, "description" => $description, "title_page" => $title_page, "description_page" => $description_page, "icon"=> $icon, "page" => "Estoque-Categorias-Visualizar"])

@section('content')
<div class="card col-md-12 mb-3">
    <div class="card-header-tab card-header">
        <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Categorias
        </div>
        <div class="btn-actions-pane-right actions-icon-btn">
            <div class="btn-group dropdown">

                <a href="{{ route('estoque.categorias.add') }}" type="button" class="mb-2 mr-2 btn-transition btn btn-outline-primary">
                    <i class="fa fa-plus"></i> Adicionar
                </a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Estado</th>
                    <th>Quantidade minima</th>
                    <th>Quantidade maxima</th>
                    <th>Subcategorias</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($category as $cat)
                <tr>
                    <td>{{$cat->category_name}}</td>
                    <td>{{$cat->category_description}}</td>
                    <td>{{$cat->category_estado}}</td>
                    <td>{{$cat->category_min_item}}</td>
                    <td>{{$cat->category_max_item}}</td>
                    <td>@if ($cat->category_exists_subcategory == 1)
                        Sim
                        @else
                        Não
                        @endif</td>
                    <td>
                        <div class="dropdown d-inline-block" style="float: right;">
                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 btn btn-outline-link"><i class="pe-7s-more"></i>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                <button type="button" tabindex="0" class="dropdown-item">Subcategorias</button>
                                <div tabindex="-1" class="dropdown-divider"></div>
                                <a type="button" tabindex="0" class="dropdown-item" href="{{route('estoque.categorias.edit', ['id' => $cat->category_key])}}">Editar</a>
                                <a type="button" tabindex="0" class="dropdown-item btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Excluir</a>
                                <div tabindex="-1" class="dropdown-divider"></div>
                            </div>
                        </div>
                    </td>
                </tr>

                @endforeach
               
            </tbody>
            <tfoot>
                <tr>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Estado</th>
                    <th>Quantidade minima</th>
                    <th>Quantidade maxima</th>
                    <th>Subcategorias</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


@endsection