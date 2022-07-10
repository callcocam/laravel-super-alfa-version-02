<table>
    <tbody>
    @foreach($bcs as $bc)
        <tr>
            <td>{{ $bc->id }}</td>
             <td>{{ $bc->name }}</td>
             <td>{{ $bc->nivel }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
