<table>
    <tbody>
    @foreach($fotos as $foto)
        <tr>
            <td>{{ $foto->name }}</td>
            <td>{{  \Illuminate\Support\Facades\Storage::url($foto->archive) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
