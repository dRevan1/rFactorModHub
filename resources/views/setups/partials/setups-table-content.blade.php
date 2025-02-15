@foreach ($setups as $setup)
<tr>
    <td>{{ $setup->name }}</td>
    <td>{{ $setup->vehicle }}</td>
    <td>{{ $setup->track }}</td>
    <td>{{ $setup->author }}</td>
    <td>{{ $setup->likes }}</td>
    <td>{{ $setup->downloads }}</td>
    <td>
        <button class="btn btn-search download-setup"><i class="bi bi-download"></i></button>
        @auth
        @if (request()->user()->name === $setup->author)
            <button class="btn btn-search edit-setup" data-name="{{ $setup->name }}"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-create delete-setup" data-name="{{ $setup->name }}"><i class="bi bi-trash3"></i></button>
        @endif
        @endauth
    </td>                      
</tr>
@endforeach