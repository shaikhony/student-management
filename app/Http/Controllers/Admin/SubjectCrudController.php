<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubjectRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SubjectCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SubjectCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Subject::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/subject');
        CRUD::setEntityNameStrings('المادة', 'المواد');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); 

        CRUD::addColumn([
            'name' => 'name',
            'type'=> 'text',
            'label' => 'الاسم'
        ]);

        CRUD::addColumn([
            'name' => 'level',
            'type'=> 'enum',
            'label' => 'المستوى'
        ]);

        CRUD::addColumn([
            'name' => 'stage',
            'type'=> 'text',
            'label' => 'المرحلة'
        ]);


    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SubjectRequest::class);
        // CRUD::setFromDb(); 

            // اسم المادة
            CRUD::field('name')
                ->type('text')
                ->label('الاسم'); 

            
            CRUD::field('level')
                ->type('enum')
                ->label('المستوى');
                
                CRUD::field('stage')
                ->type('text')
                ->label('المرحلة');
        
    

    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(SubjectRequest::class);

        
        CRUD::field('name')
                ->type('text')
                ->label('الاسم'); 

            
            CRUD::field('level')
                ->type('enum')
                ->label('المستوى');
                
                CRUD::field('stage')
                ->type('text')
                ->label('المرحلة');
    }



    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
