<div class="p-6">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <style>
        .modal-backdrop {
          z-index: -1;
        }
    </style>
    <h2 class="table-title">Deleted News Articles</h2>
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <!-- <x-jet-button wire:click="createNews">
            {{ __('Create News') }}
        </x-jet-button>
        <x-jet-danger-button wire:click="deletednews">
            {{ __('Deleted News') }}
        </x-jet-danger-button> -->
    </div>


    <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Article Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Article Sub-Title</th>
                                <!-- <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Article Content</th> -->
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Creation</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">News Link</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <!-- <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Featured In Newspage</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Top News</th> -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($articleDataController == 'Super Admin')                                    
                            <!-- this is super admin -->
                                @if($deletedarticleDatas->count())
                                    @foreach($deletedarticleDatas as $item)
                                         <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->articles_id }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->article_title }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->article_subtitle }}
                                            </td>
<!--                                             <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->article_content }}
                                            </td> -->
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <a href="{{ url($item->article_slug) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                                                   {{ $item->article_slug }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <x-jet-button wire:click="restore({{ $item->articles_id }})">
                                                    {{__('Restore Article')}}
                                                </x-jet-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endif
                        </tbody>
                    </table>
                </div>
                {{$deletedarticleDatas->links()}}
            </div>
        </div>
    </div>

<!-- FINAL DIV -->
</div>
