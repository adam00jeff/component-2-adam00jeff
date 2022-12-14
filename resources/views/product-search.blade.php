<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample Product details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>artist</th>
                <th>title</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $product)
            <tr>
                <td>{{$product->artist}}</td>
                <td>{{$product->title}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>