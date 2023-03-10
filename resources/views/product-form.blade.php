<x-app-layout>
    <div class="flex flex-col justify-center items-center productlist p-2">
        <!-- if to catch errors and report to user -->
        @if ($errors->any())
            <div class="bg-red-600 border-solid rounded-md border-2 border-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-lg text-gray-100">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- main form for new product -->
        <form method="POST" action="/products" class="" enctype="multipart/form-data">
            @csrf
            <div class="p-2 m-2 rounded-lg shadow-lg bg-gray-50 border-2 border-blue-900 max-w-md">
                <div class = "p-2 m-2">
                    <label for="producttype">Product Type:</label>
                    <select id="producttype" name="producttype">
                        @foreach($producttypes as $producttype)
                            <option value="{{$producttype['id']}}">{{$producttype['type']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="font-bold text-sm mb-2">
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="title" name="title" type="text" placeholder="title">
                </div>
                <p class="text-gray-700 text-sm">
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="artist" name="artist" type="text" placeholder="artist/author/console">
                </p>
                <p class="text-gray-500 text-base mt-2">
                    <input type="number"  step='0.01' value='0.00' class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="price" name="price" type="text" placeholder="price">
                </p>
                <div class="form-group">
                    <label>Image File</label>
                    <input id="file" name="file" type="file" />
                </div>

                <div class="flex items-center justify-end mt-4 top-auto">
                    <button type="submit" class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">
                        Add New
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
