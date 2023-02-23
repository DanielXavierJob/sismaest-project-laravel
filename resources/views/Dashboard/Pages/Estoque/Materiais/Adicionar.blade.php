@extends('Dashboard.Configuration.constructor', ["title" => "SISMAEST - ".$title, "description" => $description, "title_page" => $title_page, "description_page" => $description_page, "icon"=> $icon, "page" => "Estoque-Materiais-Adicionar"])

@section('content')
@if($errors->any())
<form class="needs-validation was-validated" novalidate="" method="POST" action="{{route('estoque.materiais.post.add')}}">
    @else
    <form class="needs-validation" novalidate="" method="POST" action="{{route('estoque.materiais.post.add')}}">
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
                            <h5 class="card-title">Adicionar novo Material</h5>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip01">Nome</label>
                                    <input type="text" name="item_name" class="form-control" id="validationTooltip01" placeholder="Nome do Material" value="" required="">

                                    @error('item_nome')
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
                                    <input type="text" name="item_descricao" class="form-control" id="validationTooltip02" placeholder="Descrição do Material" value="" required="">
                                    @error('item_descricao')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip03">Fabricante</label>
                                    <input name="item_fabricante" type="text" class="form-control" id="validationTooltip03" placeholder="Fabricante do Material" value="" required="">
                                    @error('item_fabricante')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip03">Modelo</label>
                                    <input name="item_Modelo" type="text" class="form-control" id="validationTooltip03" placeholder="Modelo do Material" value="" required="">
                                    @error('item_Modelo')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip03">Categoria/Subcategoria</label>
                                    <select class="form-control" id="validationTooltip03" name="item_categoria" id="" required="">
                                        <option value="" selected>Selecione uma categoria</option>
                                        @foreach($category as $cat)
                                        <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                        @foreach($subcategory as $sbc)
                                            @if($sbc->sbc_key == $cat->category_key)
                                            <option value="cat_{{$cat->category_id}}_sbc_{{$sbc->sbc_id}}">{{$cat->category_name}} >> {{$sbc->sbc_name}}</option>
                                            @endif
                                            @endforeach
                                        @endforeach
                                    </select>

                                    @error('item_categoria')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>
                               
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip03">Codigo do Material</label>
                                    <input name="item_codigo" type="text" class="form-control" id="validationTooltip03" value="0" required="">
                                    @error('item_codigo')
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
                                    <input type="text" name="item_estado" class="form-control" id="validationTooltip02" placeholder="Estado deste Material" value="" required="">
                                    @error('item_estado')
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
                                    <label for="validationTooltip03">Quantidade atual do Material</label>
                                    <input name="item_quantidade" type="number" class="form-control" id="validationTooltip03" value="0" required="">
                                    @error('item_quantidade')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationTooltip03">Quantidade minima de itens</label>
                                    <input name="item_quantidade_min" type="number" class="form-control" id="validationTooltip03" value="0" required="">
                                    @error('item_quantidade_min')
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
                                    <input name="item_quantidade_max" type="number" class="form-control" id="validationTooltip03" value="0" required="">

                                    @error('item_quantidade_max')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                    <div class="valid-tooltip">
                                        Tudo Ok!
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary" type="submit">Criar material</button>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
    @endsection