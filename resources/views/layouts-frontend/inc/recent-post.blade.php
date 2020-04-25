<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="section-title">
            <h2 class="title">Recent posts</h2>
        </div>
    </div>
    @foreach ($latesh_posts as $post)
    <!-- post -->
    <div class="col-md-6">
        <div class="post">
            <a class="post-img" href="{{ route('blogpost', $post->slug) }}"><img src="{{ $post->gambar }}" alt="" height="160px" width="130px"></a>
            <div class="post-body">
                @foreach ($tags as $tag)
                <?php $tag->id ?>
                @foreach ($post->tags as $value)
                @if($tag->id == $value->id)
                <div class="post-category">
                    <a href="category.html">{{$tag->name}}</a>
                </div>
                @endif
                
                @endforeach
                
                @endforeach
                <h3 class="post-title"><a href="{{ route('blogpost', $post->slug) }}">{{$post->judul}}</a></h3>
                <ul class="post-meta">
                    <li><a href="author.html">{{$post->users->name}}</a></li>
                    <li>{{ $post->created_at->diffforHumans() }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /post -->
    @endforeach

</div>
<!-- /row -->