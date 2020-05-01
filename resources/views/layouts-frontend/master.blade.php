@include('layouts-frontend.inc.header')
{{-- Banner Index --}}
@if(Request::is('blog'))
    @include('layouts-frontend.inc.banner')
@endif

{{-- Banner header Post --}}
@if(Request::is('blog-post/*'))
    @include('layouts-frontend.inc.banner-post')
@endif
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                {{-- Blog post share --}}
                @if(Request::is('blog-post/*'))
                    @include('layouts-frontend.inc.post-share')
                @endif
            <div class="section-row">
                {{-- Konten post --}}
                {{-- @if(Request::is('blog-post/*'))
                    @yield('konten')
                @endif
                @if(Request::is('blog-kategori'))
                @yield('konten')
            @endif
        --}}
        @yield('konten')

                {{-- Recent Post --}}
                @if(Request::is('blog'))
                    @include('layouts-frontend.inc.recent-post')
                @endif

                {{-- Kategori Post --}}
                @if(Request::is('blog'))
                    @include('layouts-frontend.inc.kategori')
                @endif

            </div>
            </div>
            {{-- Widget --}}
          
           @include('layouts-frontend.inc.widget')
         
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<!-- /SECTION -->
@include('layouts-frontend.inc.footer')
