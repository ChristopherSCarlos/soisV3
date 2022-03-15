@extends('layouts.headlines')

@section('page-title','Update User')

@livewire('admin-nav-bars')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<div class="py-12">
  <div class="max-w-11xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
      <div class="grid grid-cols-12">
          <div class="col-span-12">
              <h2>Create News</h2>
          </div>
          <div class="col-span-1">
          <x-jet-secondary-button class="m-2">
              {{ __('Go Back') }}
          </x-jet-secondary-button>
          </div>
            </div>
            <div class="grid grid-cols-12">
                <div class="col-span-6" style="">
                    <div>
                        <table style="width:100%">
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">Organization</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">Role</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">SOIS Key</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">Permissions</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-span-6" style="">
                    <div>
                        <table style="width:100%">
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @foreach($displayUserOrganizationData as $viewOrganization)
                                        @if($viewOrganization->organization_name != null)
                                            {{ $viewOrganization->organization_name }}
                                        @else
                                            <p>Data Unavailable</p>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @foreach($displayUserRoleData as $viewRole)
                                        @if($viewRole->role != null)
                                            {{ $viewRole->role }}
                                        @else
                                            <p>Data Unavailable</p>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @if($displayUserGateData->count() > 0)
                                        <p>{{ $UserGateKey }}</p>
                                    @else
                                        <p>Data Unavailable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    <div style="overflow: auto; height: 20rem; ">
                                        @foreach($displayUserPermsData as $perms)
                                            <div class="pl-5 pr-5 pt-2">
                                                <p>{{$perms->name}}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

    <!-- Sync Role To User -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SyncRole">
        @foreach($displayUserRoleData as $viewRole)
            @if($viewRole->role != null)
                <p>Change Role</p>
            @else
                <p>Add Role</p>
            @endif
        @endforeach
    </button>
    <!-- Sync Organization to User -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SyncOrganization">
        {{$displayUserOrganizationDataMessage}}
    </button>


<!--=====================================================
=            Sync Role Modal Section comment            =
======================================================-->
    <div class="modal fade" id="SyncRole" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @csrf
                {{ csrf_field() }}
                @foreach($displayUserSelectedData as $user)
                    <form name="add-role" id="add-role" method="post" action="{{ route('users/addRoleToUser', $user->user_id ) }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Change {{$user->first_name}}'s role </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="flex flex-col p-5">
                                <div class="max-w-lg rounded overflow-hidden shadow-lg">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-4">
                                        <select name="role_id" id="role_id" class="form-control">
                                            <option value="" selected>Choose role</option>
                                            @foreach($rolesList as $role)
                                                <option value="{{ $role->role_id }}">{{ $role->role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 btn btn-primary" type="button submit">Submit</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>


<!--====  End of Sync Role Modal Section comment  ====-->

<!--=======================================================
=            Sync Organization Section comment            =
========================================================-->
    <div class="modal fade" id="SyncOrganization" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @csrf
                {{ csrf_field() }}
                @foreach($displayUserSelectedData as $user)
                    <form name="add-organization" id="add-organization" method="post" action="{{ route('users/addOrganizationToUser', $user->user_id ) }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Change {{$user->first_name}}'s Organization </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="flex flex-col p-5">
                                <div class="max-w-lg rounded overflow-hidden shadow-lg">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-4">
                                        <select name="organization_id" id="organization_id" class="form-control">
                                            <option value="" hidden selected>Choose Organization</option>
                                            @foreach($OrgsList as $organization)
                                                <option value="{{ $organization->organization_id }}">{{ $organization->organization_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 btn btn-primary" type="button submit">Submit</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

<!--====  End of Sync Organization Section comment  ====-->




        </div>
    </div>
</div>
@extends('layouts.closing-tag')
