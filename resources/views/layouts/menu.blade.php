{{-- <li class="{{ Request::is('events*') ? 'active' : '' }}">
    <a href="{!! route('events.index') !!}"><i class="fa fa-edit"></i><span>Events</span></a>
</li> --}}

@if(!empty(session('permissions')))
<?php $permissions  = session('permissions') ?>
    @foreach($permissions as $permission)
    @if($permission->can_visible == 1)
    <li class="{{ Request::is($permission->menu->route_name.'*') ? 'active' : '' }}">
        <a href="{!! route( $permission->menu->route_name.'.index') !!}"><i class="{{ $permission->menu->icon }}"></i><span>{{ $permission->menu->name }}</span></a>
    </li>
    @endif
    @endforeach 
@endif

<li class="{{ Request::is('profiles*') ? 'active' : '' }}">
    <a href="{!! route('profiles.index') !!}"><i class="fa fa-edit"></i><span>Profiles</span></a>
</li>

