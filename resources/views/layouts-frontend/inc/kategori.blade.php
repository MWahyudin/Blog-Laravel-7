<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="section-title">
            <h2 class="title">Olahraga</h2>
        </div>
    </div>
    @foreach($olahraga as $item)
        <!-- post -->
        <div class="col-md-4">
            <div class="post post-sm">
                <a class="post-img" href=""><img src="{{ asset($item->gambar) }}" alt=""></a>
                <div class="post-body">
                    <div class="post-category">
                        <a href="category.html">{{ $item->tags[0]->name }}</a>
                    </div>
                    <h3 class="post-title title-sm"><a href="">{{ $item->judul }}</a></h3>
                    <ul class="post-meta">
                        <li><a href="author.html">{{ $item->users->name }}</a></li>
                        <li>{{ $item->created_at }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /post -->
    @endforeach
</div>
<!-- /row -->
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="section-title">
            <h2 class="title">Politik</h2>
        </div>
    </div>
    <!-- post -->
    @foreach($politik as $item)
    <div class="col-md-4">
        <div class="post post-sm">
            <a class="post-img" href=""><img src="{{ asset($item->gambar) }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">{{ $item->tags[0]->name }}</a>
                </div>
                <h3 class="post-title title-sm"><a href="">{{ $item->judul }}</a></h3>
                <ul class="post-meta">
                    <li><a href="author.html">{{ $item->users->name }}</a></li>
                    <li>{{ $item->created_at }}</li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- /row -->

<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="section-title">
            <h2 class="title">Teknologi</h2>
        </div>
    </div>
    <!-- post -->
   @foreach ($teknologi as $item)
   <div class="col-md-4">
    <div class="post post-sm">
        <a class="post-img" href=""><img src="{{ asset($item->gambar) }}" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="category.html">{{ $item->tags[0]->name }}</a>
            </div>
            <h3 class="post-title title-sm"><a href="">{{ $item->judul }}</a></h3>
            <ul class="post-meta">
                <li><a href="author.html">{{ $item->users->name }}</a></li>
                <li>{{ $item->created_at }}</li>
            </ul>
        </div>
    </div>
</div>
   @endforeach
    <!-- /post -->
</div>
<!-- /row -->
