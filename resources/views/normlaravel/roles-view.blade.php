@extends('layouts.headlines')

@section('page-title','SOIS|Role View')

@livewire('admin-nav-bars')



<div class="p-6">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Roles</h2>
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
    </div>

    <div class="flex flex-row">
        <div class="w-full">
            <div class="flex flex-col items-center">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    @foreach($role_data as $role)
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                        <td>
                                            <p>
                                                {{$role->role_id}}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Roles</th>
                                        <td>
                                            <p>
                                                {{$role->role}}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Roles Description</th>
                                        <td>
                                            <p>
                                                {{$role->description}}
                                            </p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full">
            <div class="flex flex-col items-center w-full">
                <div class="w-full -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class=" shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" style="height: 70vh; overflow: auto;">
                            <table class=" divide-y divide-gray-200 ">
                                <thead>
                                    @foreach($perms as $permData)
                                        @foreach($permData->permissions as $userperms)
                                            <tr>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    <p>
                                                        Permission Name 
                                                        
                                                    </p>
                                                </th>
                                                <td>
                                                    <p>
                                                        {{$userperms->name}}
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

 
@extends('layouts.closing-tag')

