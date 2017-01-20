<?php

use Illuminate\Routing\Router;
use Modules\Pearlskin\Repositories;
/** @var Router $router */

$router->group(['prefix' => '/pearlskin'], function (Router $router) {
    $router->bind('client', function ($id) {
        return app('Modules\Pearlskin\Repositories\ClientRepository')->find($id);
    });
    $router->get('clients', [
        'as' => 'admin.pearlskin.client.index',
        'uses' => 'ClientController@index',
        'middleware' => 'can:pearlskin.clients.index'
    ]);
    $router->get('clients/create', [
        'as' => 'admin.pearlskin.client.create',
        'uses' => 'ClientController@create',
        'middleware' => 'can:pearlskin.clients.create'
    ]);
    $router->post('clients', [
        'as' => 'admin.pearlskin.client.store',
        'uses' => 'ClientController@store',
        'middleware' => 'can:pearlskin.clients.create'
    ]);
    $router->get('clients/{client}/edit', [
        'as' => 'admin.pearlskin.client.edit',
        'uses' => 'ClientController@edit',
        'middleware' => 'can:pearlskin.clients.edit'
    ]);
    $router->put('clients/{client}', [
        'as' => 'admin.pearlskin.client.update',
        'uses' => 'ClientController@update',
        'middleware' => 'can:pearlskin.clients.edit'
    ]);
    $router->delete('clients/{client}', [
        'as' => 'admin.pearlskin.client.destroy',
        'uses' => 'ClientController@destroy',
        'middleware' => 'can:pearlskin.clients.destroy'
    ]);
    $router->bind('doctor', function ($id) {
        return app('Modules\Pearlskin\Repositories\DoctorRepository')->find($id);
    });
    $router->get('doctors', [
        'as' => 'admin.pearlskin.doctor.index',
        'uses' => 'DoctorController@index',
        'middleware' => 'can:pearlskin.doctors.index'
    ]);
    $router->get('doctors/create', [
        'as' => 'admin.pearlskin.doctor.create',
        'uses' => 'DoctorController@create',
        'middleware' => 'can:pearlskin.doctors.create'
    ]);
    $router->post('doctors', [
        'as' => 'admin.pearlskin.doctor.store',
        'uses' => 'DoctorController@store',
        'middleware' => 'can:pearlskin.doctors.create'
    ]);
    $router->get('doctors/{doctor}/edit', [
        'as' => 'admin.pearlskin.doctor.edit',
        'uses' => 'DoctorController@edit',
        'middleware' => 'can:pearlskin.doctors.edit'
    ]);
    $router->put('doctors/{doctor}', [
        'as' => 'admin.pearlskin.doctor.update',
        'uses' => 'DoctorController@update',
        'middleware' => 'can:pearlskin.doctors.edit'
    ]);
    $router->delete('doctors/{doctor}', [
        'as' => 'admin.pearlskin.doctor.destroy',
        'uses' => 'DoctorController@destroy',
        'middleware' => 'can:pearlskin.doctors.destroy'
    ]);
    $router->bind('procedure', function ($id) {
        return app('Modules\Pearlskin\Repositories\ProcedureRepository')->find($id);
    });
    $router->get('procedures', [
        'as' => 'admin.pearlskin.procedure.index',
        'uses' => 'ProcedureController@index',
        'middleware' => 'can:pearlskin.procedures.index'
    ]);
    $router->get('procedures/create', [
        'as' => 'admin.pearlskin.procedure.create',
        'uses' => 'ProcedureController@create',
        'middleware' => 'can:pearlskin.procedures.create'
    ]);
    $router->post('procedures', [
        'as' => 'admin.pearlskin.procedure.store',
        'uses' => 'ProcedureController@store',
        'middleware' => 'can:pearlskin.procedures.create'
    ]);
    $router->get('procedures/{procedure}/edit', [
        'as' => 'admin.pearlskin.procedure.edit',
        'uses' => 'ProcedureController@edit',
        'middleware' => 'can:pearlskin.procedures.edit'
    ]);
    $router->put('procedures/{procedure}', [
        'as' => 'admin.pearlskin.procedure.update',
        'uses' => 'ProcedureController@update',
        'middleware' => 'can:pearlskin.procedures.edit'
    ]);
    $router->delete('procedures/{procedure}', [
        'as' => 'admin.pearlskin.procedure.destroy',
        'uses' => 'ProcedureController@destroy',
        'middleware' => 'can:pearlskin.procedures.destroy'
    ]);

    /**
     * Procedure Categories routes
     */
    $router->bind('procedureCategory', function ($id) {
        return app('Modules\Pearlskin\Repositories\ProcedureCategoryRepository')->find($id);
    });
    $router->get('procedures-categories', [
        'as' => 'admin.pearlskin.procedures_categories.index',
        'uses' => 'ProcedureCategoryController@index',
        'middleware' => 'can:pearlskin.procedures_categories.index'
    ]);
    $router->get('procedures-categories/create', [
        'as' => 'admin.pearlskin.procedures_categories.create',
        'uses' => 'ProcedureCategoryController@create',
        'middleware' => 'can:pearlskin.procedures_categories.create'
    ]);
    $router->post('procedures-categories', [
        'as' => 'admin.pearlskin.procedures_categories.store',
        'uses' => 'ProcedureCategoryController@store',
        'middleware' => 'can:pearlskin.procedures_categories.create'
    ]);
    $router->get('procedures-categories/{procedureCategory}/edit', [
        'as' => 'admin.pearlskin.procedures_categories.edit',
        'uses' => 'ProcedureCategoryController@edit',
        'middleware' => 'can:pearlskin.procedures_categories.edit'
    ]);
    $router->put('procedures-categories/{procedureCategory}', [
        'as' => 'admin.pearlskin.procedures_categories.update',
        'uses' => 'ProcedureCategoryController@update',
        'middleware' => 'can:pearlskin.procedures_categories.edit'
    ]);
    $router->delete('procedures-categories/{procedureCategory}', [
        'as' => 'admin.pearlskin.procedures_categories.destroy',
        'uses' => 'ProcedureCategoryController@destroy',
        'middleware' => 'can:pearlskin.procedures_categories.destroy'
    ]);
    /**
     * Manipulations routes
     */
    $router->bind('manipulation', function ($id) {
        return app('Modules\Pearlskin\Repositories\ManipulationRepository')->find($id);
    });
    $router->get('manipulations', [
        'as' => 'admin.pearlskin.manipulation.index',
        'uses' => 'ManipulationController@index',
        'middleware' => 'can:pearlskin.manipulations.index'
    ]);
    $router->get('manipulations/create', [
        'as' => 'admin.pearlskin.manipulation.create',
        'uses' => 'ManipulationController@create',
        'middleware' => 'can:pearlskin.manipulations.create'
    ]);
    $router->post('manipulations', [
        'as' => 'admin.pearlskin.manipulation.store',
        'uses' => 'ManipulationController@store',
        'middleware' => 'can:pearlskin.manipulations.create'
    ]);
    $router->get('manipulations/{manipulation}/edit', [
        'as' => 'admin.pearlskin.manipulation.edit',
        'uses' => 'ManipulationController@edit',
        'middleware' => 'can:pearlskin.manipulations.edit'
    ]);
    $router->put('manipulations/{manipulation}', [
        'as' => 'admin.pearlskin.manipulation.update',
        'uses' => 'ManipulationController@update',
        'middleware' => 'can:pearlskin.manipulations.edit'
    ]);
    $router->delete('manipulations/{manipulation}', [
        'as' => 'admin.pearlskin.manipulation.destroy',
        'uses' => 'ManipulationController@destroy',
        'middleware' => 'can:pearlskin.manipulations.destroy'
    ]);
    $router->bind('schedule', function ($id) {
        return app('Modules\Pearlskin\Repositories\ScheduleRepository')->find($id);
    });
    $router->get('schedules', [
        'as' => 'admin.pearlskin.schedule.index',
        'uses' => 'ScheduleController@index',
        'middleware' => 'can:pearlskin.schedules.index'
    ]);
    $router->get('schedules/create', [
        'as' => 'admin.pearlskin.schedule.create',
        'uses' => 'ScheduleController@create',
        'middleware' => 'can:pearlskin.schedules.create'
    ]);
    $router->post('schedules', [
        'as' => 'admin.pearlskin.schedule.store',
        'uses' => 'ScheduleController@store',
        'middleware' => 'can:pearlskin.schedules.create'
    ]);
    $router->get('schedules/{schedule}/edit', [
        'as' => 'admin.pearlskin.schedule.edit',
        'uses' => 'ScheduleController@edit',
        'middleware' => 'can:pearlskin.schedules.edit'
    ]);
    $router->put('schedules/{schedule}', [
        'as' => 'admin.pearlskin.schedule.update',
        'uses' => 'ScheduleController@update',
        'middleware' => 'can:pearlskin.schedules.edit'
    ]);
    $router->delete('schedules/{schedule}', [
        'as' => 'admin.pearlskin.schedule.destroy',
        'uses' => 'ScheduleController@destroy',
        'middleware' => 'can:pearlskin.schedules.destroy'
    ]);

    // Address routes

    $router->bind('address', function ($id) {
        return app('Modules\Pearlskin\Repositories\AddressRepository')->find($id);
    });
    $router->get('addresses', [
        'as' => 'admin.pearlskin.address.index',
        'uses' => 'AddressController@index',
        'middleware' => 'can:pearlskin.addresses.index'
    ]);
    $router->get('addresses/create', [
        'as' => 'admin.pearlskin.address.create',
        'uses' => 'AddressController@create',
        'middleware' => 'can:pearlskin.addresses.create'
    ]);
    $router->post('addresses', [
        'as' => 'admin.pearlskin.address.store',
        'uses' => 'AddressController@store',
        'middleware' => 'can:pearlskin.addresses.create'
    ]);
    $router->get('addresses/{address}/edit', [
        'as' => 'admin.pearlskin.address.edit',
        'uses' => 'AddressController@edit',
        'middleware' => 'can:pearlskin.addresses.edit'
    ]);
    $router->put('addresses/{address}', [
        'as' => 'admin.pearlskin.address.update',
        'uses' => 'AddressController@update',
        'middleware' => 'can:pearlskin.addresses.edit'
    ]);
    $router->delete('addresses/{address}', [
        'as' => 'admin.pearlskin.address.destroy',
        'uses' => 'AddressController@destroy',
        'middleware' => 'can:pearlskin.addresses.destroy'
    ]);

    // Carousel routes

    $router->bind('carousel', function ($id) {
        return app('Modules\Pearlskin\Repositories\CarouselRepository')->find($id);
    });
    $router->get('carousels', [
        'as' => 'admin.pearlskin.carousel.index',
        'uses' => 'CarouselController@index',
        'middleware' => 'can:pearlskin.carousels.index'
    ]);
    $router->get('carousels/create', [
        'as' => 'admin.pearlskin.carousel.create',
        'uses' => 'CarouselController@create',
        'middleware' => 'can:pearlskin.carousels.create'
    ]);
    $router->post('carousels', [
        'as' => 'admin.pearlskin.carousel.store',
        'uses' => 'CarouselController@store',
        'middleware' => 'can:pearlskin.carousels.create'
    ]);
    $router->get('carousels/{carousel}/edit', [
        'as' => 'admin.pearlskin.carousel.edit',
        'uses' => 'CarouselController@edit',
        'middleware' => 'can:pearlskin.carousels.edit'
    ]);
    $router->put('carousels/{carousel}', [
        'as' => 'admin.pearlskin.carousel.update',
        'uses' => 'CarouselController@update',
        'middleware' => 'can:pearlskin.carousels.edit'
    ]);
    $router->delete('carousels/{carousel}', [
        'as' => 'admin.pearlskin.carousel.destroy',
        'uses' => 'CarouselController@destroy',
        'middleware' => 'can:pearlskin.carousels.destroy'
    ]);

    // Position routes

    $router->bind('position', function ($id) {
        return app('Modules\Pearlskin\Repositories\PositionRepository')->find($id);
    });
    $router->get('positions', [
        'as' => 'admin.pearlskin.position.index',
        'uses' => 'PositionController@index',
        'middleware' => 'can:pearlskin.positions.index'
    ]);
    $router->get('positions/create', [
        'as' => 'admin.pearlskin.position.create',
        'uses' => 'PositionController@create',
        'middleware' => 'can:pearlskin.positions.create'
    ]);
    $router->post('positions', [
        'as' => 'admin.pearlskin.position.store',
        'uses' => 'PositionController@store',
        'middleware' => 'can:pearlskin.positions.create'
    ]);
    $router->get('positions/{position}/edit', [
        'as' => 'admin.pearlskin.position.edit',
        'uses' => 'PositionController@edit',
        'middleware' => 'can:pearlskin.positions.edit'
    ]);
    $router->put('positions/{position}', [
        'as' => 'admin.pearlskin.position.update',
        'uses' => 'PositionController@update',
        'middleware' => 'can:pearlskin.positions.edit'
    ]);
    $router->delete('positions/{position}', [
        'as' => 'admin.pearlskin.position.destroy',
        'uses' => 'PositionController@destroy',
        'middleware' => 'can:pearlskin.positions.destroy'
    ]);

    // ContentBlock routes

    $router->bind('contentBlock', function ($id) {
        return app('Modules\Pearlskin\Repositories\ContentBlockRepository')->find($id);
    });
    $router->get('contentBlocks', [
        'as' => 'admin.pearlskin.contentBlock.index',
        'uses' => 'ContentBlockController@index',
        'middleware' => 'can:pearlskin.contentBlocks.index'
    ]);
    $router->get('contentBlocks/create', [
        'as' => 'admin.pearlskin.contentBlock.create',
        'uses' => 'ContentBlockController@create',
        'middleware' => 'can:pearlskin.contentBlocks.create'
    ]);
    $router->post('contentBlocks', [
        'as' => 'admin.pearlskin.contentBlock.store',
        'uses' => 'ContentBlockController@store',
        'middleware' => 'can:pearlskin.contentBlocks.create'
    ]);
    $router->get('contentBlocks/{contentBlock}/edit', [
        'as' => 'admin.pearlskin.contentBlock.edit',
        'uses' => 'ContentBlockController@edit',
        'middleware' => 'can:pearlskin.contentBlocks.edit'
    ]);
    $router->put('contentBlocks/{contentBlock}', [
        'as' => 'admin.pearlskin.contentBlock.update',
        'uses' => 'ContentBlockController@update',
        'middleware' => 'can:pearlskin.contentBlocks.edit'
    ]);
    $router->delete('contentBlocks/{contentBlock}', [
        'as' => 'admin.pearlskin.contentBlock.destroy',
        'uses' => 'ContentBlockController@destroy',
        'middleware' => 'can:pearlskin.contentBlocks.destroy'
    ]);

    // Article routes

    $router->bind('article', function ($id) {
        return app('Modules\Pearlskin\Repositories\ArticleRepository')->find($id);
    });
    $router->get('articles', [
        'as' => 'admin.pearlskin.article.index',
        'uses' => 'ArticleController@index',
        'middleware' => 'can:pearlskin.articles.index'
    ]);
    $router->get('articles/create', [
        'as' => 'admin.pearlskin.article.create',
        'uses' => 'ArticleController@create',
        'middleware' => 'can:pearlskin.articles.create'
    ]);
    $router->post('articles', [
        'as' => 'admin.pearlskin.article.store',
        'uses' => 'ArticleController@store',
        'middleware' => 'can:pearlskin.articles.create'
    ]);
    $router->get('articles/{article}/edit', [
        'as' => 'admin.pearlskin.article.edit',
        'uses' => 'ArticleController@edit',
        'middleware' => 'can:pearlskin.articles.edit'
    ]);
    $router->put('articles/{article}', [
        'as' => 'admin.pearlskin.article.update',
        'uses' => 'ArticleController@update',
        'middleware' => 'can:pearlskin.articles.edit'
    ]);
    $router->delete('articles/{article}', [
        'as' => 'admin.pearlskin.article.destroy',
        'uses' => 'ArticleController@destroy',
        'middleware' => 'can:pearlskin.articles.destroy'
    ]);

    // EmailMessages routes

    $router->bind('email', function ($id) {
        return app('Modules\Pearlskin\Repositories\EmailMessageRepository')->find($id);
    });
    $router->get('emails', [
        'as' => 'admin.pearlskin.email.index',
        'uses' => 'EmailController@index',
        'middleware' => 'can:pearlskin.emails.index'
    ]);
    $router->get('emails/create', [
        'as' => 'admin.pearlskin.email.create',
        'uses' => 'EmailController@create',
        'middleware' => 'can:pearlskin.emails.create'
    ]);
    $router->post('emails', [
        'as' => 'admin.pearlskin.email.store',
        'uses' => 'EmailController@store',
        'middleware' => 'can:pearlskin.emails.create'
    ]);
    $router->get('emails/{email}/reply', [
        'as' => 'admin.pearlskin.email.reply',
        'uses' => 'EmailController@reply',
        'middleware' => 'can:pearlskin.emails.edit'
    ]);
    $router->put('emails/{email}', [
        'as' => 'admin.pearlskin.email.update',
        'uses' => 'EmailController@update',
        'middleware' => 'can:pearlskin.emails.edit'
    ]);
    $router->delete('emails/{email}', [
        'as' => 'admin.pearlskin.email.destroy',
        'uses' => 'EmailController@destroy',
        'middleware' => 'can:pearlskin.emails.destroy'
    ]);

    // PriceList routes

    $router->bind('priceList', function ($id) {
        return app(Repositories\PriceListRepository::class)->find($id);
    });
    $router->get('price-lists', [
        'as' => 'admin.pearlskin.priceLists.index',
        'uses' => 'PriceListController@index',
        'middleware' => 'can:pearlskin.priceLists.index'
    ]);
    $router->get('price-lists/create', [
        'as' => 'admin.pearlskin.priceLists.create',
        'uses' => 'PriceListController@create',
        'middleware' => 'can:pearlskin.priceLists.create'
    ]);
    $router->post('price-lists', [
        'as' => 'admin.pearlskin.priceLists.store',
        'uses' => 'PriceListController@store',
        'middleware' => 'can:pearlskin.priceLists.create'
    ]);
    $router->get('price-lists/{priceList}/edit', [
        'as' => 'admin.pearlskin.priceLists.edit',
        'uses' => 'PriceListController@edit',
        'middleware' => 'can:pearlskin.priceLists.edit'
    ]);
    $router->put('price-lists/{priceList}', [
        'as' => 'admin.pearlskin.priceLists.update',
        'uses' => 'PriceListController@update',
        'middleware' => 'can:pearlskin.priceLists.edit'
    ]);
    $router->delete('price-lists/{priceList}', [
        'as' => 'admin.pearlskin.priceLists.destroy',
        'uses' => 'PriceListController@destroy',
        'middleware' => 'can:pearlskin.priceLists.destroy'
    ]);

    // PriceListCategories routes

    $router->bind('priceListCategory', function ($id) {
        return app(Repositories\PriceListCategoryRepository::class)->find($id);
    });
    $router->get('price-lists-categories', [
        'as' => 'admin.pearlskin.priceListsCategories.index',
        'uses' => 'PriceListCategoryController@index',
        'middleware' => 'can:pearlskin.priceLists.index'
    ]);
    $router->get('price-lists-categories/create', [
        'as' => 'admin.pearlskin.priceListsCategories.create',
        'uses' => 'PriceListCategoryController@create',
        'middleware' => 'can:pearlskin.priceListsCategories.create'
    ]);
    $router->post('price-lists-categories', [
        'as' => 'admin.pearlskin.priceListsCategories.store',
        'uses' => 'PriceListCategoryController@store',
        'middleware' => 'can:pearlskin.priceListsCategories.create'
    ]);
    $router->put('priceLists/{priceList}', [
        'as' => 'admin.pearlskin.priceListsCategories.update',
        'uses' => 'PriceListCategoryController@update',
        'middleware' => 'can:pearlskin.priceListsCategories.edit'
    ]);
    $router->delete('emails/{priceList}', [
        'as' => 'admin.pearlskin.priceListsCategories.destroy',
        'uses' => 'PriceListCategoryController@destroy',
        'middleware' => 'can:pearlskin.priceListsCategories.destroy'
    ]);

});
