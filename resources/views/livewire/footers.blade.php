<div class="p-6" style="background: #0d0c0d;">
    <div class="grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-1" style=" color: white;">
        <div class="grid grid-rows-4 m-5">
            <div class="m-5">
                <img style="width: 50%" src="{{asset('image/svg/pup.svg')}}">
            </div>
            <div class="">
                <h2 class="mb-2">Pages</h2>
                @foreach($displayPagesOnFooter as $footerPages)
                    <div class="footer-links p-3 m-5">
                        <a href="{{$footerPages->slug}}">
                            <p>{{$footerPages->label}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="m-5">
            <h2 class="mb-2">Academic Organization</h2>
            @foreach($displayAcademicOrganizationOnFooter as $footerAcademic)
                <div class="footer-links p-3 m-5">
                    <a href="{{$footerAcademic->organization_slug}}">
                        <p>{{$footerAcademic->organization_name}}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="m-5">
            <h2 class="mb-2">Non-Academic Organization</h2>
            @foreach($displayNonAcademicOrganizationOnFooter as $footerNonAcademic)
                <div class="footer-links p-3 m-5">
                    <a href="{{$footerNonAcademic->organization_slug}}">
                        <p>{{$footerNonAcademic->organization_name}}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="m-5">
            <h2 class="mb-2">Visit Us:</h2>
            @foreach($displaySOISPagesOnFooter as $footerSOIS)
                <div class="footer-links p-3 m-5">
                    <a href="{{$footerSOIS->external_link}}">
                        <p>{{$footerSOIS->link_name}}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
