<div id="post-header" class="page-header">
	<div class="page-header-bg" style="background-image: url('http://127.0.0.1:8000/frontend/img/header-1.jpg'); background-position: 0% 0%;" data-stellar-background-ratio="0.5"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="post-category">
					<a href="category.html">{{ $posts->tags[0]->name}}</a>
				</div>
				<h1>{{ $posts->judul}}</h1>
				<ul class="post-meta">
					<li><a href="author.html">{{$posts->users->name}}</a></li>
					<li>{{ $posts->created_at->diffforHumans() }}</li>
					<li><i class="fa fa-comments"></i> 3</li>
					<li><i class="fa fa-eye"></i> 807</li>
				</ul>
			</div>
		</div>
	</div>
</div>