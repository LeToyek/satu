<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PartnerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PartnerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Partner::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mitra');
        CRUD::setEntityNameStrings('mitra', 'mitra');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('user_id');
        CRUD::column('verified_at');
        CRUD::column('name');
        CRUD::column('address');
        CRUD::column('found_at');
        CRUD::column('sector');
        CRUD::column('monthly_income')->type('number')->prefix('Rp.');
        CRUD::column('grade')->type('enum')->options(['a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D', 'e' => 'E']);

        CRUD::addButtonFromModelFunction('line', 'verify', 'verifyButton', 'end');

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

        CRUD::field('user_id')->type('select')->options(function ($query) {
            // only show users with role 'partner'
            return $query->where('role', 'partner')->get();
        });
        CRUD::field('name');
        CRUD::field('address');
        CRUD::field('found_at');
        CRUD::field('sector');
        CRUD::field('monthly_income')->type('number')->prefix('Rp.')->attributes(['step' => '1000']);
        CRUD::field('grade')->type('enum')->options(['a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D', 'e' => 'E']);

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
        $this->setupCreateOperation();
    }

    // custom function to verify partner
    public function verify(Partner $partner)
    {
        $partner->verify();

        return redirect()->back();
    }

    public function unverify(Partner $partner)
    {
        $partner->unverify();

        return redirect()->back();
    }
}
