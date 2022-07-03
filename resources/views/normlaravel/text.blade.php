<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SOIS: @yield('title')</title>
        @extends('layouts.headlines')
</head>
<body>
    @livewire('admin-nav-bars')



<div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Article Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Article Sub-Title</th>
                                <!-- <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Article Content</th> -->
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Creation</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">News Link</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Featured In Newspage</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Top News</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                @if($articleDatas->count())
                                    @foreach($articleDatas as $item)
                                         <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->tags_name }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->tags_description }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>








@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

<div class="max-w-lg rounded overflow-hidden shadow-lg">
	<form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
	@csrf
		<div class="px-6 py-4">
			<div class="form-group">
				<label for="tags_name">tags_name</label>
				<input type="text" id="tags_name" name="tags_name" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="tags_description">tags_description</label>
				<input type="text" id="tags_description" name="tags_description" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="tags_type">tags_type</label>
				<input type="number" id="tags_type" name="tags_type" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="user_id">user_id</label>
				<input type="number" id="user_id" name="user_id" class="form-control" required="">
			</div>
  		</div>
  		<div class="px-6 pt-4 pb-2">
			<button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" type="submit" class="btn btn-primary">Submit</button>
  		</div>
	</form>
</div>


</body>
</html>