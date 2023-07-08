<table width="100%" border=1>
    <tr>
        <th>Outlet Activities</th>
        <th>Result</th>
    </tr>
    @foreach ($resultdata as $a)
        <tr>
            <td>{{ $a->nama }}</td>
            <td>{{ $a->nilai }}</td>
        </tr>
    @endforeach
</table>
