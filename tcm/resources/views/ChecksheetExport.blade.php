<table width="100%" border=1>
    <tr>
        <th>Outlet Activities</th>
        <th>Result</th>
    </tr>
    @foreach ($resultdata as $a)
        <tr>
            <td>{{ $a->nama }}</td>
            @if($a->nilai == 1)
                Sudah Dilakukan
            @elseif($a->nilai == 2)
                Tidak Dilakukan
            @endif
        </tr>
    @endforeach
</table>
