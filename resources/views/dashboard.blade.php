<x-app-layout>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ __("Dashboard") }}
		</h2>
	</x-slot>

	<section class="c-gallery__posts">
		@foreach ($posts as $post)
			<x-post-item :post="$post" />
		@endforeach
	</section>
	<br><br>
	<a class="c-button c-button__primary" href="{{ route("post.create") }}"> Create new</a>
</x-app-layout>
