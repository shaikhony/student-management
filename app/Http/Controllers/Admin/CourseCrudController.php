<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CourseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Course::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/course');
        CRUD::setEntityNameStrings('كورس', 'كورسات');
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
        $this->crud->query->with(['teacher', 'subject']);

        CRUD::addColumn([
            'name' => 'name',
            'type' => 'text',
            'label' => 'الاسم'
        ]);

        CRUD::addColumn([
            'name' => 'status',
            'type' => 'enum',
            'label' => 'الحالة'
        ]);

        CRUD::addColumn([
            'name' => 'subject_type',
            'type' => 'text',
            'label' => 'نوع المادة'
        ]);


        CRUD::addColumn([
            'name' => 'num_lessons',
            'type' => 'number',
            'label' => 'عدد الدروس'
        ]);

        CRUD::addColumn([
            'name' => 'start_date',
            'type' => 'date',
            'label' => 'تاريخ البدء'
        ]);

        CRUD::addColumn([
            'name' => 'end_date',
            'type' => 'date',
            'label' => 'تاريخ الانتهاء'
        ]);

        CRUD::addColumn([
            'name' => 'max_student',
            'type' => 'number',
            'label' => 'أقصى عدد طلاب'
        ]);

        CRUD::addColumn([
            'name' => 'min_student',
            'type' => 'number',
            'label' => 'أقل عدد طلاب'
        ]);

        CRUD::addColumn([
            'name' => 'subject_id', // استخدم subject_id هنا
            'type' => 'select', // استخدم 'relationship' هنا
            'label' => 'المادة',
            'entity' => 'subject',
            'model' => 'App\Models\Subject',
            'attribute' => 'name', // هنا يجب أن يكون اسم الحقل الذي تريد إظهاره
        ]);

        CRUD::addColumn([
            'name' => 'teacher_id', // استخدم subject_id هنا
            'type' => 'select', // استخدم 'relationship' هنا
            'label' => 'المعلم',
            'entity' => 'teacher',
            'model' => 'App\Models\Teacher',
            'attribute' => 'name', // هنا يجب أن يكون اسم الحقل الذي تريد إظهاره
        ]);

        CRUD::addColumn([
            'name' => 'duration',
            'type' => 'number',
            'label' => 'مدة الكورس'
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
        CRUD::setValidation(CourseRequest::class);
        // CRUD::setFromDb(); 

        CRUD::field('name')
            ->type('text')
            ->label('الاسم');

        CRUD::field('status')
            ->type('enum')
            ->label('الحالة');

        CRUD::field('subject_type')
            ->type('text')
            ->label('نوع المادة');

        CRUD::field('num_lessons')
            ->type('number')
            ->label('عدد الدروس');

        CRUD::field('start_date')
            ->type('date')
            ->label('تاريخ البدء');

        CRUD::field('end_date')
            ->type('date')
            ->label('تاريخ الانتهاء');

        CRUD::field('max_student')
            ->type('number')
            ->label('أقصى عدد طلاب');

        CRUD::field('min_student')
            ->type('number')
            ->label('أقل عدد طلاب');

        CRUD::field('duration')
            ->type('number')
            ->label('مدة الكورس');

        CRUD::field('teacher_id')
            ->type('select')
            ->label('المعلم');

        CRUD::field('subject_id')
            ->type('select')
            ->label('المادة');
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(CourseRequest::class);
        // CRUD::setFromDb(); 

        CRUD::field('name')
            ->type('text')
            ->label('الاسم');

        CRUD::field('status')
            ->type('enum')
            ->label('الحالة');

        CRUD::field('subject_type')
            ->type('text')
            ->label('نوع المادة');

        CRUD::field('num_lessons')
            ->type('number')
            ->label('عدد الدروس');

        CRUD::field('start_date')
            ->type('date')
            ->label('تاريخ البدء');

        CRUD::field('end_date')
            ->type('date')
            ->label('تاريخ الانتهاء');

        CRUD::field('max_student')
            ->type('number')
            ->label('أقصى عدد طلاب');

        CRUD::field('min_student')
            ->type('number')
            ->label('أقل عدد طلاب');

        CRUD::field('duration')
            ->type('number')
            ->label('مدة الكورس');

        CRUD::field('teacher_id')
            ->type('select')
            ->label('المعلم');

        CRUD::field('subject_id')
            ->type('select')
            ->label('المادة');
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
