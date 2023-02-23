@extends('Dashboard.Configuration.constructor', ["title" => "Materiais", "description" => "Painel Material", "page" => "Estoque-Materiais-Visualizar"])

@section('content')
<div class="card col-md-12 mb-3">
    <div class="card-header-tab card-header">
        <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Materiais
        </div>
        <div class="btn-actions-pane-right actions-icon-btn">
            <div class="btn-group dropdown">

                <a href="{{ route('estoque.materiais.add') }}" type="button" class="mb-2 mr-2 btn-transition btn btn-outline-primary">
                    <i class="fa fa-plus"></i> Adicionar
                </a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Item</th>
                    <th class="text-center">Fabricante</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Serial</th>
                    <th class="text-center">Quantidade</th>
                    <th class="text-center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Itens as $Item)
                <tr>
                    <td class="text-center">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">

                                <div class="widget-content-left flex2">
                                    <div class="widget-heading">{{$Item->item_name}}</div>
                                    <div class="widget-subheading opacity-7">{{$Item->item_estado}}</div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center text-muted">{{$Item->item_fabricante}}</td>

                    <td class="text-center">{{$Item->item_modelo}}</td>
                    <td class="text-center">{{$Item->item_serialkey}}</td>
                    <td class="text-center">
                        <div class="badge badge-warning">{{$Item->item_quantidade}}</div>
                    </td>
                    <td class="text-center">
                        <a type="button" id="PopoverCustomT-1" class="mb-2 mr-2 btn btn-dashed btn-outline-link" href=""><i class="lnr-pencil"> </i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">Item</th>
                    <th class="text-center">Fabricante</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Serial</th>
                    <th class="text-center">Quantidade</th>
                    <th class="text-center">Ação</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection