
<table class="table-bordered cell-border" width="100%" id="tblData">
    <thead style="font-weight: bold;">
        <tr>
            <td>{{ $fperiodes }}</td>
            <td>Balaraja</td>
            <td>Bandar Jaya</td>
            <td>Bekasi</td>
            <td>Bintaro</td>
            <td>Cakung</td>
            <td>Cilegon</td>
            <td>Cimindi</td>
            <td>Cinere</td>
            <td>Cipondoh</td>
            <td>Ciputat</td>
            <td>Dewi Sartika</td>
            <td>Gatot Subroto</td>
            <td>Hayam Wuruk</td>
            <td>Jatinegara</td>
            <td>Jatiwaringin</td>
            <td>Kebayoran Lama</td>
            <td>Latumenten</td>
            <td>Mampang</td>
            <td>Pasar Minggu</td>
            <td>Pecenongan</td>
            <td>Radin Inten</td>
            <td>Serang</td>
            <td>Tangerang</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($resultdata as $a)
            <tr>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->a }}</td>
                <td>{{ $a->w }}</td>
                <td>{{ $a->b }}</td>
                <td>{{ $a->c }}</td>
                <td>{{ $a->d }}</td>
                <td>{{ $a->e }}</td>
                <td>{{ $a->f }}</td>
                <td>{{ $a->g }}</td>
                <td>{{ $a->h }}</td>
                <td>{{ $a->i }}</td>
                <td>{{ $a->j }}</td>
                <td>{{ $a->k }}</td>
                <td>{{ $a->l }}</td>
                <td>{{ $a->m }}</td>
                <td>{{ $a->n }}</td>
                <td>{{ $a->o }}</td>
                <td>{{ $a->p }}</td>
                <td>{{ $a->q }}</td>
                <td>{{ $a->r }}</td>
                <td>{{ $a->s }}</td>
                <td>{{ $a->t }}</td>
                <td>{{ $a->u }}</td>
                <td>{{ $a->v }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
