<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class=nav-item><a class=nav-link href="{{ backpack_url('elfinder') }}"><i class="nav-icon fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('project') }}'><i class='nav-icon fa fa-question'></i> Projects</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('icon') }}'><i class='nav-icon fa fa-question'></i> Icons</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('career') }}'><i class='nav-icon fa fa-question'></i> Careers</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('profile') }}'><i class='nav-icon fa fa-question'></i> Profiles</a></li>