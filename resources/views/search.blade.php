<x-app-layout>


@if($products->isNotEmpty())
    @foreach ($products as $product)
        <div class="post-list">
            <p>{{ $product->title }}</p>
            <img src="{{ $product->image }}">
        </div>
    @endforeach
@else
    <div>
        <h2>No posts found</h2>
    </div>
@endif
</x-app-layout>
