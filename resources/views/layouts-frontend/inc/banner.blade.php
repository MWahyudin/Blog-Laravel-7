<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div id="hot-post" class="row hot-post">
            <div class="col-md-8 hot-post-left">
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href=""><img src="{{ asset($banner_or->gambar) }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">{{$banner_or->kategori->name}}</a>
                        </div>
                        <h3 class="post-title title-lg"><a href="">{{$banner_or->judul}}</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">{{$banner_or->users->name}}</a></li>
                            <li>{{$banner_or->created_at}}</li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <div class="col-md-4 hot-post-right">
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href=""><img src="{{ asset($banner_pl->gambar) }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">{{$banner_pl->kategori->name}}</a>
                        </div>
                        <h3 class="post-title"><a href="">{{$banner_or->judul}}/a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">{{$banner_pl->users->name}}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href=""><img src="{{ asset($banner_tk->gambar) }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">{{$banner_tk->kategori->name}}</a>
                        </div>
                        <h3 class="post-title"><a href="">{{$banner_tk->judul}}</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">{{$banner_or->users->name}}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->