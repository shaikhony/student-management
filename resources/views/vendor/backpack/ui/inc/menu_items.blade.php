{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title=" الطلاب" icon="la la-user-graduate" :link="backpack_url('student')" />
<x-backpack::menu-item title=" المعلمين" icon="la la-chalkboard-teacher" :link="backpack_url('teacher')" />
<x-backpack::menu-item title=" المواد" icon="la la-book" :link="backpack_url('subject')" />
<x-backpack::menu-item title=" الكورسات" icon="la la-laptop-code" :link="backpack_url('course')" />
