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
@endif<li class="{{ Request::is('reportAdmins*') ? 'active' : '' }}">
    <a href="{!! route('reportAdmins.index') !!}"><i class="fa fa-edit"></i><span>Report Admins</span></a>
</li>

<li class="{{ Request::is('reportSellers*') ? 'active' : '' }}">
    <a href="{!! route('reportSellers.index') !!}"><i class="fa fa-edit"></i><span>Report Sellers</span></a>
</li>

