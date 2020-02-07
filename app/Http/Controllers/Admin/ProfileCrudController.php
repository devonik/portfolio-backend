<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProjectRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProfileCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProfileCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Profile');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/profile');
        $this->crud->setEntityNameStrings('profile', 'profiles');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $avatar_image_column_definition = [
            'label' => "Avatar",
            'name' => "avatar_image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // Portrait = 0.5
        ];
        $hero_image_column_definition = [
            'label' => "Hero image",
            'name' => "hero_image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 2, // Landscape = 2
        ];
        $text_column_definition = [   // WYSIWYG Editor
            'name' => 'text',
            'label' => 'Text',
            'type' => 'wysiwyg'
        ];
        $icons_column_definition = [    // Select2Multiple = n-n relationship (with pivot table)
            'label'     => "My favorite tech stack - Icons",
            'type'      => 'select2_multiple',
            'name'      => 'icons', // the method that defines the relationship in your Model
            'entity'    => 'icons', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model'     => "App\Models\Icon", // foreign key model
            'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?
        ];
        $this->crud->setValidation(ProfileRequest::class);
        $this->crud->addField($avatar_image_column_definition);
        $this->crud->addField(['name' => 'title', 'type' => 'text', 'label' => 'Title']);
        $this->crud->addField(['name' => 'subtitle', 'type' => 'text', 'label' => 'Subtitle']);
        $this->crud->addField($hero_image_column_definition);
        $this->crud->addField($text_column_definition);
        $this->crud->addField($icons_column_definition);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
