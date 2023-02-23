@extends('Dashboard.Configuration.constructor', ["title" => "SISMAEST - ".$title, "description" => $description, "title_page" => $title_page, "description_page" => $description_page, "icon"=> $icon, "page" => "Estoque-Categorias-Adicionar"])

@section('content')
@if($errors->any())
<form class="needs-validation was-validated" novalidate="" method="POST" action="{{route('estoque.categorias.post.add')}}">
    @else
    <form class="needs-validation" novalidate="" method="POST" action="{{route('estoque.categorias.post.add')}}">
        @endif

        @csrf

        @if(isset($warning_exists))
        {{dd($warning_exists)}}
        <div class="invalid-tooltip" style="display: block;">
            {{ $message }}
        </div>
        @enderror
       
        @if(Session::has('status'))
        <p class="alert alert-success">{{ Session::get('status') }}</p>
        @endif
        <div id="category_add">

            <div class="row">
                <div class="col-md-8 col-lg-12" id="cadaster_category">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Criar nova Categoria</h5>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip01">Nome</label>
                                    <input type="text" name="category_name" class="form-control" id="validationTooltip01" placeholder="Nome da Categoria" value="" required="">

                                    @error('category_name')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip02">Descrição</label>
                                    <input type="text" name="category_desc" class="form-control" id="validationTooltip02" placeholder="Descrição da categoria" value="" required="">
                                    @error('category_desc')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltipUsername">Estado</label>
                                    <input type="text" name="category_estado" class="form-control" id="validationTooltip02" placeholder="Estado desta categoria" value="" required="">
                                    @error('category_estado')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationTooltip03">Quantidade minima de itens</label>
                                    <input name="min_item_category" type="number" class="form-control" id="validationTooltip03" value="0" required="">
                                    @error('min_item_category')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationTooltip03">Quantidade máxima de itens</label>
                                    <input name="max_item_category" type="number" class="form-control" id="validationTooltip03" value="0" required="">

                                    @error('max_item_category')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip04">Possui subcategorias? Marque Sim para adiciona-las</label>

                                    <div role="group" class="btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input name="exists_subcategory" type="radio" name="options" id="option1" autocomplete="off" checked="" value='0' onchange="validationNewItem(this)">
                                            Não
                                        </label>
                                        <label class="btn btn-primary">
                                            <input name="exists_subcategory" type="radio" name="options" id="option2" autocomplete="off" value='1' onchange="validationNewItem(this)">
                                            Sim
                                        </label>

                                    </div>
                                    @error('exists_subcategory')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3" id="subcategory_1" style="display: none;">
                                    <label for="validationTooltip05">Informe as subcategorias para criar</label>
                                    <div class="input-group">

                                        <input id="add_item_sbc" type="text" class="form-control" id="validationTooltipUsername" placeholder="Subcategoria" aria-describedby="validationTooltipUsernamePrepend" value="" required="">
                                        <div class="input-group-prepend">
                                            <a class="mb-2 mr-2 btn-transition btn btn-outline-success" style="height: 38px;" onclick="Add()">+
                                            </a>
                                        </div>

                                    </div>



                                </div>

                            </div>
                            <button class="btn btn-primary" type="submit">Criar categoria</button>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4" id="subcategory_2" style="display: none;">

                    <div class="main-card mb-3 card">
                        <div class="card-header">Subcategorias criadas</div>
                        <ul class="todo-list-wrapper list-group list-group-flush" id="new_itens">

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        var total_itens = 0;

        function validationNewItem($var) {
            if ($var.value == "1") {
                document.getElementById('cadaster_category').className = "col-md-8 col-lg-8";
                document.getElementById('subcategory_1').style.display = 'block';
                document.getElementById('subcategory_2').style.display = 'block';

            } else {
                document.getElementById('cadaster_category').className = "col-md-8 col-lg-12";

                document.getElementById('subcategory_1').style.display = 'none';
                document.getElementById('subcategory_2').style.display = 'none';
            }
            console.log($var.value);
        }

        function Add() {
            var text = $('#add_item_sbc').val();
            if (text.length == 0) {
                alert('Uma subcategoria precisa ser informada para adicionar');
            } else {
                var item_num = ++total_itens;
                var newEl = $(
                    ' <li class="list-group-item" id="ul_li_' + item_num + '">' +
                    '  <div class="todo-indicator bg-success"></div>' +
                    '<div class="widget-content p-0">' +
                    ' <div class="widget-content-wrapper">' +
                    ' <div class="widget-content-left mr-2">' +
                    ' <div class="custom-checkbox custom-control">' +
                    '<input name="sbc_' + text + '" type="hidden" style="display: none;"/>' +
                    ' </div>' +
                    ' </div>' +
                    '  <div class="widget-content-left">' +
                    ' <div class="widget-heading">' + text +
                    ' </div>' +
                    '</div>' +
                    '  <div class="widget-content-right widget-content-actions">' +
                    '  <button class="border-0 btn-transition btn btn-outline-danger" id="' + item_num + '" onclick="remove(this)">' +
                    ' <i class="fa fa-trash-alt"></i>' +
                    ' </button>' +
                    '</div>' +
                    '   </div>' +
                    ' </div>' +
                    '</li>');
                // var newEl = $('<li id="ul_li_' + item_num + '" class="list-group-item" >' + text + '<a  id="' + item_num + '"onclick="remove(this)" class="btn-icon btn-icon-only btn btn-link" style="float: right;"><i class="pe-7s-trash btn-icon-wrapper"></i></a> <input name="sbc_' + text + '" type="hidden" style="display: none;"/></li>');

                newEl.hide();
                $('#new_itens').prepend(newEl);
                newEl.slideDown();
                var newEl_1 = $('<div class="main-card mb-3 card ul_li_' + item_num + '">' +
                    ' <div class="card-body">' +
                    ' <h5 class="card-title">Subcategoria - ' + text + ' </h5>' +
                    '  <div class="form-row">' +

                    '  <div class="col-md-4 mb-3">' +
                    ' <label for="validationTooltip02">Descrição</label>' +
                    ' <input type="text" class="form-control" id="validationTooltip02" placeholder="Descrição da categoria" value="" required="" name="subcategory_desc_' + text + '">' +
                    '                    <div class="valid-tooltip">' +
                    '        Tudo Ok!' +
                    '        </div>' +
                    '     </div>' +
                    '  <div class="col-md-2 mb-3">' +
                    '<label for="validationTooltip03">Mostrar notificações de aviso?</label>' +
                    ' <div role="group" class="btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">' +
                    ' <label class="btn btn-primary">' +
                    ' <input type="radio" name="notifications_sbc_' + text + '" id="option1" autocomplete="off" value="0" >' +
                    'Não' +
                    ' </label>' +
                    ' <label class="btn btn-primary active">' +
                    '<input type="radio"  name="notifications_sbc_' + text + '"id="option2" autocomplete="off" checked="" value="1" >' +
                    'Sim' +
                    '  </label>' +
                    ' </div>' +
                    '    </div>' +
                    '         </div>' +
                    ' <div class="form-row">' +
                    '  <div class="col-md-2 mb-3">' +
                    ' <label for="validationTooltip03">Quantidade minima de itens</label>' +
                    ' <input type="number" class="form-control" id="validationTooltip03" value="0" required="" name="subcategory_minitem_' + text + '">' +
                    '    <div class="invalid-tooltip">' +
                    '     Please provide a valid city.' +
                    '    </div>' +
                    '    </div>' +
                    '  <div class="col-md-2 mb-3">' +
                    '<label for="validationTooltip03">Quantidade máxima de itens</label>' +
                    '<input type="number" class="form-control" id="validationTooltip03" value="0" required="" name="subcategory_maxitem_' + text + '">' +
                    '       <div class="invalid-tooltip">' +
                    '  Please provide a valid city.' +
                    '</div>' +
                    '    </div>' +
                    '          </div>' +
                    '    </div>' +
                    '</div>');
                $('#category_add').append(newEl_1);
                newEl_1.slideDown();
            }
        }

        function remove($var) {
            $('#ul_li_' + $var.id).remove();
            $('.ul_li_' + $var.id).remove();
        }
    </script>
    @endsection