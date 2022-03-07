<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <title>SOIS: @yield('title')</title>
        <script src="https://kit.fontawesome.com/17005ae465.js" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100;300;400&family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>

        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Pacifico&family=Rock+Salt&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ephesis&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Genos:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('css/slick.css') }}"> -->

        <!-- FONTAWESOME -->
        <script src="https://kit.fontawesome.com/17005ae465.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />


        <!-- slick -->

        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!-- <script type="text/javascript" src="slick/slick.min.js"></script> -->
        <script type="text/javascript" src="{{ URL::asset('slick/slick/slick.min.js') }}"></script>



            <!-- JAVACRIPT -->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link rel="stylesheet" type="text/css" href="slick/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick/slick-theme.css"/>

        <script type="text/javascript" src="{{ URL::asset('js/javas.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/slick.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jq.js') }}"></script>


        @trixassets
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script><title>hrllo</title>
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