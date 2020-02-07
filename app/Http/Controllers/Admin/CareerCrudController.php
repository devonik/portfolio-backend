<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CareerRequest;
use App\Http\Requests\ProjectRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CareerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CareerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Career');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/career');
        $this->crud->setEntityNameStrings('career', 'careers');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $icons_column_definition = [    // Select2Multiple = n-n relationship (with pivot table)
            'label'     => "Icon",
            'type'      => 'select2',
            'name'      => 'icon_id', // the method that defines the relationship in your Model
            'entity'    => 'icon', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model'     => "App\Models\Icon", // foreign key model
        ];

        $text_column_definition = [   // WYSIWYG Editor
            'name' => 'text',
            'label' => 'Text',
            'type' => 'wysiwyg'
        ];
        $this->crud->setValidation(CareerRequest::class);
        $this->crud->addField(['name' => 'title', 'type' => 'text', 'label' => 'Title']);
        $this->crud->addField(['name' => 'start_year', 'type' => 'number', 'label' => 'Start year']);
        $this->crud->addField($icons_column_definition);
        $this->crud->addField($text_column_definition);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
