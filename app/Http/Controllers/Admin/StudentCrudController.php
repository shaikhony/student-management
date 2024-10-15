<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StudentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class StudentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StudentCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Student::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/student');
        CRUD::setEntityNameStrings(' الطالب ' , ' الطلاب');
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
            'type' => 'text',
            'label' => 'الاسم'
        ]);

        CRUD::addColumn([
            'name' => 'age',
            'type' => 'number',
            'label' => 'العمر'
        ]);

        CRUD::addColumn([
            'name' => 'country_id', // استخدم subject_id هنا
            'type' => 'select', // استخدم 'relationship' هنا
            'label' => 'البلد',
            'entity' => 'country',
            'model' => 'App\Models\Country',
            'attribute' => 'country_name', // هنا يجب أن يكون اسم الحقل الذي تريد إظهاره
        ]);

        CRUD::addColumn([
            'name' => 'phone_number',
            'type' => 'text',
            'label' => 'رقم الهاتف'
        ]);

        CRUD::addColumn([
            'name' => 'status',
            'type' => 'enum',
            'label' => 'حالة الطالب'
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
        CRUD::setValidation(StudentRequest::class);
        // CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('name')->type('text')->label('الاسم');
        CRUD::field('age')->type('number')->label('العمر');

        CRUD::field('country_id')
        ->type('select')  // استخدم 'relationship' هنا لعرض العلاقة
        ->label('البلد')
        ->entity('country')     // اسم العلاقة التي تعرفها في النموذج
        ->model('App\Models\Country')  // نموذج البلد
        ->attribute('country_name');

        CRUD::field('phone_number')->type('text')->label('رقم الهاتف');
        CRUD::field('status')->type('enum')->label('حالة الطالب');
<<<<<<< HEAD

        
=======
>>>>>>> fdb457f04c705179b5068aa61fc464eef97cfae3
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(StudentRequest::class);

        $this->setupCreateOperation();

        CRUD::field('name')->type('text')->label('الاسم');
        CRUD::field('age')->type('number')->label('العمر');

        CRUD::field('country_id')
        ->type('select')  // استخدم 'relationship' هنا لعرض العلاقة
        ->label('البلد')
        ->entity('country')     // اسم العلاقة التي تعرفها في النموذج
        ->model('App\Models\Country')  // نموذج البلد
        ->attribute('country_name');

        
        CRUD::field('phone_number')->type('text')->label('رقم الهاتف');
        CRUD::field('status')->type('enum')->label('حالة الطالب');
<<<<<<< HEAD

        // إضافة حقل SelectMany لتحديد الكورسات التي يمكن للطالب التسجيل ب // التعامل مع الجدول الوسيط
=======
>>>>>>> fdb457f04c705179b5068aa61fc464eef97cfae3
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
        // عرض الكورسات المسجلة في صفحة المعاينة
        CRUD::addColumn([
            'name' => 'country_id', // استخدم subject_id هنا
            'type' => 'relationship', // استخدم 'relationship' هنا
            'label' => 'البلد',
            'entity' => 'country',
            'model' => 'App\Models\Country',
            'attribute' => 'country_name', // هنا يجب أن يكون اسم الحقل الذي تريد إظهاره
        ]);
    }
}
