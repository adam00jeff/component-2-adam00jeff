<x-app-layout>
    <div class ="flex items-center justify-between mt-4 top-auto m-6 p-2">
        @if(session('success'))
            <div class="flex justify-center font-bold text-lg self-center p-3 alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    @foreach($users as $user)

<div>
     <h3 class = "text-blue-700 mb-4 text-lg font-bold">User ID: {{$user['id']}}</h3>
    <h3 class = "text-blue-700 mb-4 text-lg font-bold">User: {{$user['name']}}</h3>
    <h3 class = "font-bold mb-2 text-gray-800">Email: {{ $user['email'] }}</h3>
            <div class="flex items-center justify-between mt-4 top-auto">
                <button value="{{$user['id']}}" type="button" class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline delete-user">Remove</button>
            </div>
</div>
            <br>
    @endforeach
    </div>
</x-app-layout>
