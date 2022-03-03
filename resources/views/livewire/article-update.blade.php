<div class="p-5">
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

    <div class="flex flex-col flex-wrap">
        <div>
            <h2>Update News</h2>
        </div>
        @foreach($displayArticleData as $art)
        <div class="mt-4">
            <x-jet-label for="article_title" value="{{ __('Article Title') }} : {{$art->article_title}}" />
            <x-jet-input wire:model="article_title" id="article_title" class="block mt-1 w-full" type="text" />
        </div>
        <div class="mt-4">
            <x-jet-label for="article_subtitle" value="{{ __('Article Sub-Title') }} : {{$art->article_subtitle}}" />
            <x-jet-input wire:model="article_subtitle" id="article_subtitle" class="block mt-1 w-full" type="text" />
        </div>
        <div class="mt-4">
            <x-jet-label for="article_content" value="{{ __('Article Content') }}" />
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="body-content" wire:ignore>
                            <textarea type="text" input="{{$art->article_content}}" id="summernote" class="form-control summernote">{{$art->article_content}}</textarea>
                        </div>
                    </div>
                </div>
            
        </div>
        <div class="mt-4">
            <x-jet-label for="type" value="{{ __('Type') }}" />
            <select wire:model="type" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @foreach($displaySelectedArticleType as $selectedARtType)
                    <option default hidden value="{{$selectedARtType->article_types_id}}">{{$selectedARtType->article_type}}</option>
                @endforeach
                @foreach($displayArticleType as $articleType)
                    <option value="{{$articleType->article_types_id}}">{{$articleType->article_type}}</option>
                @endforeach
            </select>
        </div>
        @endforeach
        <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
            {{ __('Update News') }}
        </x-jet-secondary-button>
    </div>





































<!--========================================
=            Summernote Section            =
=========================================-->

<script>
    $(document).ready(function() {
        $('.summernote').summernote(
        {
        focus: true,
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
          onChange: function(contents, $editable) {
          @this.set('article_content', contents);
        }
        }
        });
    });
</script>

<!--====  End of Summernote Section  ====-->



</div>
