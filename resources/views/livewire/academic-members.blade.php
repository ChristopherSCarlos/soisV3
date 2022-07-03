<div class="p-6">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Academic Membership</h2>
@livewireScripts
    <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <livewire:AcademicMembers 
                    exportable
                    hideable
                    />
                </div>
            </div>
        </div>
    </div>

    {{$displayAcademicMembers->links()}}
@livewireScripts


































</div>
