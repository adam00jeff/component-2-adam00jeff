<x-app-layout>
    <div class="grid grid-cols-5">
        @if(session('success'))
            <div class="">
                {{ session('success') }}
            </div>
        @endif
        @foreach($users as $user)
            <div class=" p-2 block m-2 rounded-lg shadow-lg bg-gray-50 border-2 border-blue-900 max-w-xl">
                <h3 class="text-blue-700 mb-4 text-lg font-bold">User ID: {{$user['id']}}</h3>
                <h3 class="text-blue-700 mb-4 text-lg font-bold">User: {{$user['name']}}</h3>
                <h3 class="font-bold mb-2 text-gray-800">Email: {{ $user['email'] }}</h3>
                <div class="flex items-center justify-between mt-4 top-auto">
                    <button value="{{$user['id']}}" type="button"
                            class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline delete-user">
                        Remove
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    <div id="pagination">
        {{ $users->links() }}
    </div>
</x-app-layout>
