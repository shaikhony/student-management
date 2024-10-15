<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TeacherRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TeacherCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TeacherCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Teacher::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/teacher');
        CRUD::setEntityNameStrings('المعلم', 'المعلمين');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // set columns from db columns.
        CRUD::addColumn([
            'name' => 'name',
            'type'=> 'text',
            'label' => 'الاسم'
        ]);

        CRUD::addColumn([
            'name' => 'spec_id', // استخدم subject_id هنا
            'type' => 'select', // استخدم 'relationship' هنا
            'label' => 'التخصص',
            'entity' => 'spec',
            'model' => 'App\Models\Spec',
            'attribute' => 'spec_name', // هنا يجب أن يكون اسم الحقل الذي تريد إظهاره
        ]);

        CRUD::addColumn([
            'name' => 'note',
            'type'=> 'text',
            'label' => 'ملاحظة'
        ]);

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
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
        CRUD::setValidation(TeacherRequest::class);
        
        CRUD::field('name')->type('text')->label('الاسم');
        
        CRUD::field('spec_id')
        ->type('select')  // استخدم 'relationship' هنا لعرض العلاقة
        ->label('التخصص')
        ->entity('spec')     // اسم العلاقة التي تعرفها في النموذج
        ->model('App\Models\Spec')  // نموذج البلد
        ->attribute('spec_name');

        CRUD::field('note')->type('text')->label('ملاحظة');


        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
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
        CRUD::setValidation(TeacherRequest::class);

        CRUD::field('name')->type('text')->label('الاسم');

        CRUD::field('spec_id')
        ->type('select')  // استخدم 'relationship' هنا لعرض العلاقة
        ->label('التخصص')
        ->entity('spec')     // اسم العلاقة التي تعرفها في النموذج
        ->model('App\Models\Spec')  // نموذج البلد
        ->attribute('spec_name');

        CRUD::field('note')->type('text')->label('ملاحظة');
    }


    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
