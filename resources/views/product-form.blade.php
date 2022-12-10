<x-app-layout>


    <h2> Add new CD product</h2>
    <form action="/products" method="post">
        @csrf

        <label for="artist">Artist</label>
        <input type="text" id="artist" name="artist">
        <br />

        <label for="title">Title</label>
        <input type="text" id="title" name="title">
        <br />

        <label for="price">Price</label>
        <input type="text" id="price" name="price">
        <br />

        <input type="submit" value="Submit">

    </form>

</x-app-layout>
