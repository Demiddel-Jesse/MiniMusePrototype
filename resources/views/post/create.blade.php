<x-app-layout>
	<form action="{{ route("post.save") }}" method="POST">
		@csrf
		<section class="c-post">
			<div class="c-post__images">
				<label>
					Images
					<input id="image" name="image" type="file">
				</label>
			</div>
			<div class="c-post__text">
				<label>
					Title
					<input name="title" type="text">
				</label>
				<div class="c-post__profile">
				</div>
				<label>
					Description
					<input name="description" type="text">
				</label>
				<div class="c-post__numbers"></div>
				<p></p>
				@foreach ($tagTypes as $tagType)
				@endforeach
				<button class="c-button c-button__primary" type="submit">Publish</button>
			</div>
		</section>
	</form>
</x-app-layout>
