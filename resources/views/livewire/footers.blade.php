<div class="grid grid-cols-12 pt-6 pb-6 p-6" style="background: #0d0c0d;">
    <div class="col-span-12 xl:col-span-4 lg:col-span-4 md:col-span-4 sm:col-span-4">
        <div class="grid grid-rows-2">
            <div class="flex flex-col items-center justify-center">
                <img style="width: 50%" src="{{asset('image/svg/pup.svg')}}">
                <h2 id="footer-title" class="text-white mb-5">SOIS</h2>
            </div>
            <div>
                <h2 id="footer-title" class="text-white mb-5">Pages</h2>
                    <div class="footer-links text-white mb-2">
                        <a href="/">
                            <p >Homepage</p>
                        </a>
                    </div>
                    <div class="footer-links text-white mb-2">
                        <a href="/news">
                            <p >News</p>
                        </a>
                    </div>    
            </div>
        </div>
    </div>
    <div class="col-span-12 xl:col-span-3 lg:col-span-3 md:col-span-3 sm:col-span-3">
        <div>
            <h2 id="footer-title" class="text-white mb-5">Academic Organization</h2>
        </div>
        @foreach($displayAcademicOrganizationOnFooter as $footerAcademic)
            <div class="footer-links text-white mb-2">
                <a href="{{$footerAcademic->organization_slug}}">
                    <p >{{$footerAcademic->organization_name}}</p>
                </a>
            </div>
        @endforeach
    </div>
    <div class="col-span-12 xl:col-span-3 lg:col-span-3 md:col-span-3 sm:col-span-3">
        <div>
            <h2 id="footer-title" class="text-white mb-5">Non-Academic Organization</h2>
        </div>
        @foreach($displayNonAcademicOrganizationOnFooter as $footerNonAcademic)
            <div class="footer-links text-white mb-2">
                <a href="{{$footerNonAcademic->organization_slug}}">
                    <p >{{$footerNonAcademic->organization_name}}</p>
                </a>
            </div>
        @endforeach
    </div>
    <div class="col-span-12 xl:col-span-2 lg:col-span-2 md:col-span-2 sm:col-span-2">
        <div>
            <h2 id="footer-title" class="text-white mb-5">Visit Us:</h2>
        </div>
        @foreach($displaySOISPagesOnFooter as $footerSOIS)
            <div class="footer-links text-white mb-2">
                <a href="{{$footerSOIS->external_link}}">
                    <p >{{$footerSOIS->link_name}}</p>
                </a>
                </div>
        @endforeach
    </div>
</div>
