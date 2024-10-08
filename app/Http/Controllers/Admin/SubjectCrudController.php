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
        CRUD::setEntityNameStrings('subject', 'subjects');
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
            'name' => 'duration',
            'type'=> 'number',
            'label' => 'مدة الدورة'
        ]);

        CRUD::addColumn([
            'name' => 'start_date',
            'type'=> 'date',
            'label' => 'تاريخ البدء'
        ]);

        CRUD::addColumn([
            'name' => 'end_date',
            'type'=> 'date',
            'label' => 'تاريخ الإنتهاء'
        ]);

        CRUD::addColumn([
            'name' => 'subject_type',
            'type'=> 'text',
            'label' => 'نوع الدورة'
        ]);

        CRUD::addColumn([
            'name' => 'teacher_id',
            'type'=> 'integer',
            'label' => 'اسم المعلم'
        ]);

        CRUD::addColumn([
            'name' => 'status',
            'type'=> 'enum',
            'label' => 'حالة الدورة'
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
                CRUD::field('subject_number')
                ->type('number')
                ->label('رقم المادة');

            // اسم المادة
            CRUD::field('name')
                ->type('text')
                ->label('الاسم'); 

            // مدة المادة
            CRUD::field('duration')
                ->type('number')
                ->label('المدة'); 

            // تاريخ البدء
            CRUD::field('start_date')
                ->type('date')
                ->label('تاريخ البدء'); 

            // تاريخ النهاية
            CRUD::field('end_date')
                ->type('date')
                ->label('تاريخ النهاية');

            // نوع المادة
            CRUD::field('subject_type')
                ->type('text')
                ->label('نوع المادة')
                ;

            // المعلم
            CRUD::field('teacher_id')
                ->type('select')
                ->label('المعلم');
                

            // حالة المادة
            CRUD::field('status')
                ->type('enum')
                ->label('الحالة');
                
        
    

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

        
        CRUD::field('subject_number')
                ->type('number')
                ->label('رقم المادة');

            // اسم المادة
            CRUD::field('name')
                ->type('text')
                ->label('الاسم'); 

            // مدة المادة
            CRUD::field('duration')
                ->type('number')
                ->label('المدة'); 

            // تاريخ البدء
            CRUD::field('start_date')
                ->type('date')
                ->label('تاريخ البدء'); 

            // تاريخ النهاية
            CRUD::field('end_date')
                ->type('date')
                ->label('تاريخ النهاية');

            // نوع المادة
            CRUD::field('subject_type')
                ->type('text')
                ->label('نوع المادة')
                ;

            // المعلم
            CRUD::field('teacher_id')
                ->type('select')
                ->label('المعلم');
                

            // حالة المادة
            CRUD::field('status')
                ->type('enum')
                ->label('الحالة');
    }
}
