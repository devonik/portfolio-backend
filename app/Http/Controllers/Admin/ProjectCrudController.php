<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use App\Models\Icon;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProjectCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProjectCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Project');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/project');
        $this->crud->setEntityNameStrings('project', 'projects');


    }

    protected function setupListOperation()
    {
        $this->crud->addColumn(['name' => 'title', 'type' => 'text', 'label' => 'Title']);
        $this->crud->addColumn(['name' => 'priority', 'type' => 'number', 'label' => 'Priority']);
    }

    protected function setupCreateOperation()
    {
        $icons_column_definition = [    // Select2Multiple = n-n relationship (with pivot table)
            'label'     => "Icons",
            'type'      => 'select2_multiple',
            'name'      => 'icons', // the method that defines the relationship in your Model
            'entity'    => 'icons', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model'     => "App\Models\Icon", // foreign key model
            'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?
            // 'select_all' => true, // show Select All and Clear buttons?

            // optional
            //'options'   => (function ($query) {
            //    return $query->orderBy('name', 'ASC')->where('depth', 1)->get();
            //}), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ];
        $image_column_definition = [
            'label' => "Image",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 2, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ];
        $text_column_definition = [   // WYSIWYG Editor
            'name' => 'text',
            'label' => 'Text',
            'type' => 'wysiwyg'
        ];
        //Multiple links
        $links_column_definition = [   // Table
            'name'            => 'link',
            'label'           => 'Links',
            'type'            => 'table',
            'entity_singular' => 'link', // used on the "Add X" button
            'columns'         => [
                'title'  => 'Title',
                'href'  => 'Href'
            ],
            'max' => 5, // maximum rows allowed in the table
            'min' => 0, // minimum rows allowed in the table
        ];
        $this->crud->setValidation(ProjectRequest::class);
        $this->crud->addField(['name' => 'title', 'type' => 'text', 'label' => 'Title']);
        $this->crud->addField(['name' => 'subtitle', 'type' => 'text', 'label' => 'Subtitle']);
        $this->crud->addField($image_column_definition);
        $this->crud->addField($icons_column_definition);
        $this->crud->addField($text_column_definition);
        $this->crud->addField($links_column_definition);
        $this->crud->addField(['name' => 'priority', 'type' => 'number', 'label' => 'Priority']);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
