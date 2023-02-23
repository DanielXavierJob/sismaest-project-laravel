<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'App\Http\Controllers\Pages\Home@index')->name('index');

Route::get('/login', function () {
    return view('Auth.Login.Index');
});


Route::prefix('Configuracoes')->group(function () {

    Route::prefix('Painel')->group(function () {
        Route::get('/',  'App\Http\Controllers\Pages\Configuracoes\Painel\Show@index')->name('conf.painel.show');
    });

    Route::prefix('Seguranca')->group(function () {
        Route::get('/',  'App\Http\Controllers\Pages\Configuracoes\Seguranca\Show@index')->name('conf.seguranca.show');
    });

    Route::prefix('Sistema')->group(function () {
        Route::get('/',  'App\Http\Controllers\Pages\Configuracoes\Sistema\Show@index')->name('conf.sistema.show');
    });

    Route::prefix('Usuario')->group(function () {
        Route::get('/',  'App\Http\Controllers\Pages\Configuracoes\Usuario\Show@index')->name('conf.usuario.show');
    });
});

Route::prefix('Controle')->group(function () {

    Route::prefix('Cautela')->group(function () {
        Route::get('/',  'App\Http\Controllers\Pages\Controle\Entrada@index')->name('controle.cautela.show');
        Route::get('Adicionar',  'App\Http\Controllers\Pages\Controle\Entrada@Adicionar')->name('controle.cautela.add');
        Route::get('Editar',  'App\Http\Controllers\Pages\Controle\Entrada@Editar')->name('controle.cautela.edit');
    });
    Route::prefix('Entrada')->group(function () {
        Route::get('/',  'App\Http\Controllers\Pages\Controle\Entrada\Show@index')->name('controle.entrada.show');
        Route::get('Adicionar',  'App\Http\Controllers\Pages\Controle\Entrada\Adicionar@index')->name('controle.entrada.add');
        Route::get('Editar',  'App\Http\Controllers\Pages\Controle\Entrada\Editar@index')->name('controle.entrada.edit');
    });

    Route::prefix('Saida')->group(function () {
        Route::get('/',  'App\Http\Controllers\Pages\Controle\Saida\Show@index')->name('controle.saida.show');
        Route::get('Adicionar',  'App\Http\Controllers\Pages\Controle\Saida\Adicionar@index')->name('controle.saida.add');
        Route::get('Editar',  'App\Http\Controllers\Pages\Controle\Saida\Editar@index')->name('controle.saida.edit');
    });
});

Route::prefix('Estoque')->group(function () {

    Route::prefix('Categorias')->group(function () {
        Route::get('/',  'App\Http\Controllers\Pages\Estoque\Categorias\Show@index')->name('estoque.categorias.show');
        Route::get('Adicionar',  'App\Http\Controllers\Pages\Estoque\Categorias\Adicionar@index')->name('estoque.categorias.add');
        Route::get('Editar/{id}',  'App\Http\Controllers\Pages\Estoque\Categorias\Editar@index')->name('estoque.categorias.edit');

        Route::post('/Adicionar', 'App\Http\Controllers\Pages\Estoque\Categorias\Adicionar@Adicionar')->name('estoque.categorias.post.add');
    });

    Route::prefix('Materiais')->group(function () {
        Route::get('/',  'App\Http\Controllers\Pages\Estoque\Materiais\Show@index')->name('estoque.materiais.show');
        Route::get('Adicionar',  'App\Http\Controllers\Pages\Estoque\Materiais\Adicionar@index')->name('estoque.materiais.add');
        Route::get('Editar',  'App\Http\Controllers\Pages\Estoque\Materiais\Editar@index')->name('estoque.materiais.edit');

        Route::post('Adicionar',  'App\Http\Controllers\Pages\Estoque\Materiais\Adicionar@Adicionar')->name('estoque.materiais.post.add');

    });
});

Route::prefix('Modulos')->group(function () {
    Route::get('/{id}', 'App\Http\Controllers\Pages\Modulos@index');
    Route::prefix('Categorias')->group(function () {
        Route::get('Authenticator',  'App\Http\Controllers\Pages\Modulos\Categorias\Authenticators@index')->name('auth.module.authenticator');
        Route::get('Inventory',  'App\Http\Controllers\Pages\Modulos\Categorias\Inventory@index')->name('auth.module.inventory');
        Route::get('Item',  'App\Http\Controllers\Pages\Modulos\Categorias\Item@index')->name('auth.module.item');
        Route::get('Motors',  'App\Http\Controllers\Pages\Modulos\Categorias\Motors@index')->name('auth.module.motors');
        Route::get('Pkey',  'App\Http\Controllers\Pages\Modulos\Categorias\Pkey@index')->name('auth.module.pkey');
        Route::get('Printer',  'App\Http\Controllers\Pages\Modulos\Categorias\Printer@index')->name('auth.module.printer');
        Route::get('Profile',  'App\Http\Controllers\Pages\Modulos\Categorias\Profile@index')->name('auth.module.profile');
        Route::get('Security',  'App\Http\Controllers\Pages\Modulos\Categorias\Security@index')->name('auth.module.security');
        Route::get('Storage',  'App\Http\Controllers\Pages\Modulos\Categorias\Storage@index')->name('auth.module.storage');
    });
});

