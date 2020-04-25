<div class="col-md-4">
    <!-- social widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Social Media</h2>
        </div>
        <div class="social-widget">
            <ul>
                <li>
                    <a href="#" class="social-facebook">
                        <i class="fa fa-facebook"></i>
                        <span>21.2K<br>Followers</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-twitter">
                        <i class="fa fa-twitter"></i>
                        <span>10.2K<br>Followers</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-google-plus">
                        <i class="fa fa-google-plus"></i>
                        <span>5K<br>Followers</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /social widget -->

    <!-- category widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Categories</h2>
        </div>
        <div class="category-widget">
            <ul>
                <li><a href="#">Lifestyle <span>451</span></a></li>
                <li><a href="#">Fashion <span>230</span></a></li>
                <li><a href="#">Technology <span>40</span></a></li>
                <li><a href="#">Travel <span>38</span></a></li>
                <li><a href="#">Health <span>24</span></a></li>
            </ul>
        </div>
    </div>
    <!-- /category widget -->

    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Popular Posts</h2>
        </div>
        <!-- post -->
        <div class="post post-widget">
            <a class="post-img" href="{{ route('blogpost') }}"><img src="{{ asset('frontend/img/widget-3.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">Lifestyle</a>
                </div>
                <h3 class="post-title"><a href="{{ route('blogpost') }}">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
            </div>
        </div>
        <!-- /post -->

        <!-- post -->
        <div class="post post-widget">
            <a class="post-img" href="{{ route('blogpost') }}"><img src="{{ asset('frontend/img/widget-2.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">Technology</a>
                    <a href="category.html">Lifestyle</a>
                </div>
                <h3 class="post-title"><a href="{{ route('blogpost') }}">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
            </div>
        </div>
        <!-- /post -->

        <!-- post -->
        <div class="post post-widget">
            <a class="post-img" href="{{ route('blogpost') }}"><img src="{{ asset('frontend/img/widget-4.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">Health</a>
                </div>
                <h3 class="post-title"><a href="{{ route('blogpost') }}">Postea senserit id eos, vivendo periculis ei qui</a></h3>
            </div>
        </div>
        <!-- /post -->

        <!-- post -->
        <div class="post post-widget">
            <a class="post-img" href="{{ route('blogpost') }}"><img src="{{ asset('frontend/img/widget-5.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">Health</a>
                    <a href="category.html">Lifestyle</a>
                </div>
                <h3 class="post-title"><a href="{{ route('blogpost') }}">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
            </div>
        </div>
        <!-- /post -->
    </div>
    <!-- /post widget -->
</div>