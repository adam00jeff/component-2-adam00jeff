<nav class = "flex justify-center">
    <div class = "flex m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <a href="{{route('home')}}" class="text-gray-700 p-5 font-semibold">
        Home
        </a>
    </div>
    <div class = "flex m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <a href="{{route('index')}}" class="text-gray-700 p-5 font-semibold">
            Products
        </a>
    </div>


    @can('edit-product')
    <div class = "flex m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <a href="{{route('create')}}" class="text-gray-700 p-5 font-semibold">
            Add Product
        </a>
    </div>

    @endcan

    <div class = "flex m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
<label for="producttype" class="m-4">Search:</label>
<input class="flex w-full h-small bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 m-1 search"
                           id="search" name="Search" type="text" placeholder="Search">
</div>

</nav>
