@extends('adminlte::page')

@section('title', __('Permissions available for the role') . ': ' . $role->name )

@section('content_header')
    {{ Breadcrumbs::render('RolePermissionAvailable', $role) }}
    <h1> {{ __('Permissions available for the role') }}:  <strong>{{$role->name}}</strong>
@stop

@section('content')
    <div class="card">

        <div class="div card-header px-4">
            @include('admin.includes.search', [
                'route' => route('roles.permissions.available', $role->id)
            ])
        </div>

        <div class="div card-body table-responsive">
                
            @include('admin.includes.alerts')

            <table class="table table-condensed table-dark table-striped table-hover table-borderless align-middle">
                <tbody>
                    <form action="{{ route('roles.permissions.attach', $role->id)}}" method="post">
                        @csrf

                        <tr class="row mx-0">
                            @foreach ($permissions as $permission)
                                <td class="align-middle">
                                    <div class="form-group col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                        <div class="custom-control custom-switch custom-switch-on-success">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="custom-control-input" id="{{ $permission->id }}">
                                            <label class="custom-control-label" for="{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="align-middle">
                                @if (count($permissions) > 0)
                                    @include('admin.includes.button_save', [
                                        'btnIcon' => 'link',
                                        'btnSave' => __('Link'),
                                    ])
                                @else
                                    @include('admin.includes.alerts', ['msg' => __('messages.no_options_available') ])
                                @endif
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->onEachSide(5)->links() !!}
            @else
                {!! $permissions->onEachSide(5)->links() !!}
            @endif
        </div>
    </div>
@stop