
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
            <td>
                @if ($a->a == 1 )
                    O
                @elseif($a->a == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->w == 1 )
                    O
                @elseif($a->w == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->b == 1 )
                    O
                @elseif($a->b == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->c == 1 )
                    O
                @elseif($a->c == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->d == 1 )
                    O
                @elseif($a->d == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->e == 1 )
                    O
                @elseif($a->e == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->f == 1 )
                    O
                @elseif($a->f == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->g == 1 )
                    O
                @elseif($a->g == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->h == 1 )
                    O
                @elseif($a->h == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->i == 1 )
                    O
                @elseif($a->i == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->j == 1 )
                    O
                @elseif($a->j == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->k == 1 )
                    O
                @elseif($a->k == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->l == 1 )
                    O
                @elseif($a->l == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->m == 1 )
                    O
                @elseif($a->m == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->n == 1 )
                    O
                @elseif($a->n == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->o == 1 )
                    O
                @elseif($a->o == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->p == 1 )
                    O
                @elseif($a->p == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->q == 1 )
                    O
                @elseif($a->q == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->r == 1 )
                    O
                @elseif($a->r == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->s == 1 )
                    O
                @elseif($a->s == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->t == 1 )
                    O
                @elseif($a->t == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->u == 1 )
                    O
                @elseif($a->u == 2)
                    X
                @else
                    -
                @endif
            </td>
            <td>
                @if ($a->v == 1 )
                    O
                @elseif($a->v == 2)
                    X
                @else
                    -
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
