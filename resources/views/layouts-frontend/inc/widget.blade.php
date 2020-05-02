<div class="col-md-4">
    <!-- category widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Kategori</h2>
        </div>
        <div class="category-widget">
            <ul>
                {{-- {{ dd($kategori->count()) }} --}}
                @foreach($kategori_widget as $item)
                    <li><a href="{{ route('kategori', $item->slug)}}">{{ $item->name }}<span>{{$item->posts->count()}}</span></a></li>
                @endforeach
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
        @foreach($latesh_posts as $post)
            <div class="post post-widget">
                <a class="post-img" href=""><img src="{{ asset($post->gambar) }}" alt=""></a>
                <div class="post-body">
                    <div class="post-category">
                        <a href="category.html">{{ $post->name }}</a>
                    </div>
                    <h3 class="post-title"><a href="">{{ $post->judul }}</a></h3>
                </div>
            </div>
        @endforeach
        <!-- /post -->
    </div>
    <!-- /post widget -->
</div>
