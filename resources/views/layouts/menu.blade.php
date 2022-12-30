<nav class = "flex justify-center">
    <div class = "flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <a href="{{route('home')}}" class=" p-5 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
        Home
        </a>
    </div>
    <div class = "flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <a href="{{route('index')}}" class="p-5 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
            Products
        </a>
    </div>


    @can('edit-product')
    <div class = "flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <a href="{{route('create')}}" class="p-5 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
            Add Product
        </a>
    </div>

    @endcan

    <div class = "flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
<label for="producttype" class="font-semibold p-1 m-4 text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Search:</label>
<input class="flex w-full h-small bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 m-1 search"
                           id="search" name="Search" type="text" placeholder="Search">
</div>

</nav>
