<x-app-layout>
    <div id="productlist" class=" flex flex-col justify-center items-center p-2">
        @if ($errors->any())
            <div class="bg-red-600 border-solid rounded-md border-2 border-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-lg text-gray-100">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/products/{{$product['id']}}">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="p-2 m-2 rounded-lg shadow-lg bg-gray-50 border-2 border-blue-900 max-w-md">
                <div class="p-2 m-2">
                    <input id="id" name="id" hidden val="{{$product['id']}}">
                    <label for="producttype">Product Type:</label>
                    <select id="producttype" name="producttype">
                        @foreach($producttypes as $producttype)
                            @if($producttype['id']==$product['product_type_id'])
                                <option value="{{$producttype['id']}}">{{$producttype['type']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="flex-row font-bold text-sm mb-2">
                    <label for="title">Title:</label>
                    <input
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                        id="title" name="title" type="text" value="{{$product['title']}}">
                </div>
                <p class="font-bold text-sm mb-2">
                    <label for="artist">Artist:</label>
                    <input
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                        id="artist" name="artist" type="text" value="{{$product['artist']}}">
                </p>
                <p class="font-bold text-sm mb-2">
                    <label for="price">Price:</label>
                    <input type="number" step='0.01' id="price" name="price" value="{{$product['price']/100}}"
                           class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                    >
                </p>

                <div class="flex items-center justify-end mt-4 top-auto">

                    <div class="flex items-center justify-between mt-4 top-auto">
                        <button value="{{$product['id']}}" type="button"
                                class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline delete-product">
                            Remove
                        </button>

                        <button type="submit"
                                class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>
