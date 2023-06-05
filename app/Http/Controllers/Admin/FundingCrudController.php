<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FundingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FundingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FundingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Funding::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/funding');
        CRUD::setEntityNameStrings('funding', 'fundings');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('campaign_id');
        CRUD::column('user_id');
        CRUD::column('fund_nominal')->type('number')->prefix('Rp.');
        CRUD::column('price')->type('number')->prefix('Rp.');
        CRUD::column('status')->type('enum')->options([
            'on_going' => 'On Going',
            'on_sell' => 'On Sell',
            'unclaimed' => 'UNCLAIMED',
            'failed' => 'FAILED',
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            // 'name' => 'required|min:2',
        ]);

        CRUD::field('campaign_id');
        CRUD::field('user_id');
        CRUD::field('fund_nominal')->type('number')->prefix('Rp.');
        CRUD::field('price')->type('number')->prefix('Rp.');
        CRUD::field('status');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        // $this->setupCreateOperation();

        CRUD::field('campaign_id')->attributes(['readonly' => 'readonly']);
        CRUD::field('user_id');
        CRUD::field('fund_nominal')->type('number')->prefix('Rp.')->attributes(['readonly' => 'readonly']);
        CRUD::field('price')->type('number')->prefix('Rp.')->attributes(['step' => '1000']);;
        CRUD::field('status')->type('enum')->options([
            'on_going' => 'On Going',
            'on_sell' => 'On Sell',
            'unclaimed' => 'UNCLAIMED',
            'failed' => 'FAILED',
        ]);
    }
}
