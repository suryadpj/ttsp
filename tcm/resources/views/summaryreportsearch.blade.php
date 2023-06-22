@extends('adminlte::page')

@section('title', 'TCM - Data KPI')

@section('content_header')
    <h3>Summary TCM Evaluation</h3>
@stop


@section('content')
<form action="summaryreportsearch" method="get">
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                @if (old('success'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ old('success') }}</li>
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input  type="month" class="form-control datea" value="{{ $fperiode }}" name="search_periode" id="search_periode" placeholder="Periode">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                        <select class="form-control select2" name="search_kantor" id="search_kantor"  style="width: 100%;">
                            <option value=''>Pilih Kantor</option>
                            @foreach($kantor as $p)
                                <option value="{{ $p->id }}" @if($fkantor == $p->id) selected @endif>{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <button type="submit" id="filter_button" class="btn btn-primary percent"><i class="fas fa-search"></i></button>
                            <button type="button" id="reset_filter_button" class="btn percent"><i class="fas fa-undo"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body table-responsive p-0">
                    <table id="example1" class="table table-bordered cell-border" width="1200px">
                        <thead style="font-weight: bold;">
                            <tr>
                                <td rowspan="2">Activity TCM</td>
                                <td colspan="4">Checksheet TCM</td>
                                <td colspan="7">Parameter Result</td>
                                <td rowspan="2">Issue</td>
                                <td rowspan="2">Action Plan</td>
                            </tr>
                            <tr>
                                <td>Item to be Genba</td>
                                <td>Item Check</td>
                                <td>Done</td>
                                <td>Category</td>
                                <td colspan="3"></td>
                                <td>Actual</td>
                                <td>Target</td>
                                <td>Evaluation</td>
                                <td>Category</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $evaluation1 = $resultkpi->result1;
                                if($resultkpi->result3+$resultkpi->result5+$resultkpi->result7 >= 2)
                                {
                                    $evaluation2 = "O";
                                    $evaluationshow2 = 1;
                                }
                                else {
                                    $evaluation2 = "X";
                                    $evaluationshow2 = 0;
                                }
                                $cat1 =($evaluation1+$evaluationshow2+$resultkpi->result11+$resultkpi->result12+$resultkpi->result13+$resultkpi->result14+$resultkpi->result15+$resultkpi->result16+$resultkpi->result17+$resultkpi->result19+$resultkpi->result49)/12;
                                if($cat1*100 >= 85)
                                {
                                    $catr1 = "Well Implemented";
                                    $catr1bg = "green";
                                }elseif($cat1*100 >= 70)
                                {
                                    $catr1 = "Medium Implemented";
                                    $catr1bg = "yellow";
                                }elseif($cat1*100 < 70)
                                {
                                    $catr1 = "low Implemented";
                                    $catr1bg = "red";
                                }
                                if($resultcheck->grade1 >= 85)
                                {
                                    $catrs1 = "Well Implemented";
                                    $catrs1bg = "green";
                                }elseif($resultcheck->grade1 >= 70)
                                {
                                    $catrs1 = "Medium Implemented";
                                    $catrs1bg = "yellow";
                                }elseif($resultcheck->grade1 < 70)
                                {
                                    $catrs1 = "low Implemented";
                                    $catrs1bg = "red";
                                }

                            @endphp
                            <tr>
                                <td rowspan="18">A.PSP Sales</td>
                                <td rowspan="8"></td>
                                <td rowspan="8"></td>
                                <td rowspan="8"></td>
                                <td rowspan="18" bgcolor="{{ $catrs1bg }}">{{ $catrs1 }}</td>
                                <td align="center">1</td>
                                <td colspan="2">Net promoter Score (NPS) Sales</td>
                                <td>{{ $resultkpi->kpi1 }}%</td>
                                <td>{{ $resultkpi->target1 }}%</td>
                                <td>@if($resultkpi->result1 == 1) O @else X @endif</td>
                                <td rowspan="18" bgcolor="{{ $catr1bg }}">{{ $catr1 }}</td>
                                <td rowspan="18"><textarea height="500" name="issue1"></textarea></td>
                                <td rowspan="18"><textarea name="action1"></textarea></td>
                            </tr>
                            <tr>
                                <td align="left" rowspan="7">2</td>
                                <td rowspan="7">Gross Profit/Unit/Ratio (vehicle/TCO/F&I Commission)</td>
                                <td>a. GP Total Sales (per unit)(mio)</td>
                                <td>{{ $resultkpi->kpi2 }}%</td>
                                <td>-</td>
                                <td rowspan="7">{{ $evaluation2 }}</td>
                            </tr>
                            <tr>
                                <td>b. GP Total Sales Ratio</td>
                                <td>{{ $resultkpi->kpi3 }}%</td>
                                <td>{{ $resultkpi->target3 }}%</td>
                            </tr>
                            <tr>
                                <td>c. GP Vehicle (per unit)(mio)</td>
                                <td>{{ $resultkpi->kpi4 }}%</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>d. GP Vehicle Ratio</td>
                                <td>{{ $resultkpi->kpi5 }}%</td>
                                <td>{{ $resultkpi->target5 }}%</td>
                            </tr>
                            <tr>
                                <td>e. GP TCO (per unit)(mio)</td>
                                <td>{{ $resultkpi->kpi6 }}%</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>f. GP TCO Ratio</td>
                                <td>{{ $resultkpi->kpi7 }}%</td>
                                <td>{{ $resultkpi->target7 }}%</td>
                            </tr>
                            <tr>
                                <td>g. F&I Commision (per unit)(mio)</td>
                                <td>{{ $resultkpi->kpi8 }}%</td>
                                <td>-</td>
                            </tr>
                            <tr>
                             <td rowspan=6>A.1. Sales Person Offering Process</td>
                             <td rowspan=6>14</td>
                             <td rowspan=6>{{ $resultcheck->result1 }}%</td>
                             <td align="center">3</td>
                             <td colspan=2>M-Quote utilization ratio</td>
                             <td>{{ $resultkpi->kpi15 }}%</td>
                             <td>{{ $resultkpi->target15 }}%</td>
                             <td>@if($resultkpi->result15 == 1) O @else X @endif</td>
                            </tr>
                            <tr>
                             <td>4</td>
                             <td colspan=2>TCO Installation Ratio</td>
                             <td>{{ $resultkpi->kpi11 }}%</td>
                             <td>{{ $resultkpi->target11 }}%</td>
                             <td>@if($resultkpi->result11 == 1) O @else X @endif</td>
                            </tr>
                            <tr>
                             <td>5</td>
                             <td colspan=2>Toyota Insurance Share</td>
                             <td>{{ $resultkpi->kpi12 }}%</td>
                             <td>{{ $resultkpi->target12 }}%</td>
                             <td>@if($resultkpi->result12 == 1) O @else X @endif</td>
                            </tr>
                            <tr>
                             <td>6</td>
                             <td colspan=2>Credit Ratio</td>
                             <td>{{ $resultkpi->kpi13 }}%</td>
                             <td>{{ $resultkpi->target13 }}%</td>
                             <td>@if($resultkpi->result13 == 1) O @else X @endif</td>
                            </tr>
                            <tr>
                             <td>7</td>
                             <td colspan=2>Market Share Credit Portion (MSCP)</td>
                             <td>{{ $resultkpi->kpi14 }}%</td>
                             <td>{{ $resultkpi->target14 }}%</td>
                             <td>@if($resultkpi->result14 == 1) O @else X @endif</td>
                            </tr>
                            <tr>
                             <td>8</td>
                             <td colspan=2>Trade In Ratio</td>
                             <td>{{ $resultkpi->kpi49 }}%</td>
                             <td>{{ $resultkpi->target49 }}%</td>
                             <td>@if($resultkpi->result49 == 1) O @else X @endif</td>
                            </tr>
                            <tr>
                             <td rowspan=4>A.2. Advance Demand &amp; Supply
                             Management</td>
                             <td rowspan=4 >4</td>
                             <td rowspan=4>{{ $resultcheck->result2 }}%</td>
                             <td align="center">9</td>
                             <td colspan=2 >AO Report
                             Establishment</td>
                             <td>{{ $resultkpi->kpi17 }}%</td>
                             <td>{{ $resultkpi->target17 }}%</td>
                             <td>@if($resultkpi->result17 == 1) O @else X @endif</td>
                            </tr>
                            <tr>
                             <td align="center">10</td>
                             <td colspan=2>Monthly SPK Achievement (vs Target Rundown)</td>
                             <td>{{ $resultkpi->kpi16 }}%</td>
                             <td>{{ $resultkpi->target16 }}%</td>
                             <td>@if($resultkpi->result16 == 1) O @else X @endif</td>
                            </tr>
                            <tr>
                             <td>11</td>
                             <td colspan=2>Outstanding Matching to target Ratio (on AO25
                             Achievement)</td>
                             <td>{{ $resultkpi->kpi18 }}%</td>
                             <td>{{ $resultkpi->target18 }}%</td>
                             <td></td>
                            </tr>
                            <tr>
                             <td >12</td>
                             <td colspan=2>Monthly Sales Target Achievement (Target
                             Operation)</td>
                             <td>{{ $resultkpi->kpi19 }}%</td>
                             <td>{{ $resultkpi->target19 }}%</td>
                             <td>@if($resultkpi->result19 == 1) O @else X @endif</td>
                            </tr>
                            @php
                                $evaluation13 = $resultkpi->result25;
                                if($resultkpi->result20+$resultkpi->result21+$resultkpi->result22 >= 2)
                                {
                                    $evaluation14 = "O";
                                    $evaluationshow14 = 1;
                                }
                                else {
                                    $evaluation14 = "X";
                                    $evaluationshow14 = 0;
                                }
                                $cat2 =($evaluation13+$evaluationshow14)/2;
                                if($cat2*100 >= 85)
                                {
                                    $catr2 = "Well Implemented";
                                    $catr2bg = "green";
                                }elseif($cat2*100 >= 70)
                                {
                                    $catr2 = "Medium Implemented";
                                    $catr2bg = "yellow";
                                }elseif($cat2*100 < 70)
                                {
                                    $catr2 = "low Implemented";
                                    $catr2bg = "red";
                                }
                                if($resultcheck->grade2 >= 85)
                                {
                                    $catrs2 = "Well Implemented";
                                    $catrs2bg = "green";
                                }elseif($resultcheck->grade2 >= 70)
                                {
                                    $catrs2 = "Medium Implemented";
                                    $catrs2bg = "yellow";
                                }elseif($resultcheck->grade2 < 70)
                                {
                                    $catrs2 = "low Implemented";
                                    $catrs2bg = "red";
                                }

                            @endphp
                            <tr >
                             <td rowspan=6 >B. DELIVERY EXPLANATION</td>
                             <td >B.1.
                             Delivery Explaination (DEC) by Salesperson</td>
                             <td>16</td>
                             <td >{{ $resultcheck->result3 }}%</td>
                             <td rowspan=6 bgcolor="{{ $catrs2bg }}">{{ $catrs2 }}</td>
                             <td align="center">13</td>
                             <td colspan=2>T-Intouch Activation Rate</td>
                             <td>{{ $resultkpi->kpi25 }}%</td>
                             <td>{{ $resultkpi->target25 }}%</td>
                             <td>@if($resultkpi->result25 == 1) O @else X @endif</td>
                             <td rowspan=6 bgcolor="{{ $catr2bg }}">{{ $catr2 }}</td>
                             <td rowspan=6 ><textarea name="issue2"></textarea></td>
                             <td rowspan=6><textarea name="action2"></textarea></td>
                            </tr>
                            <tr>
                             <td rowspan=5>B.2. Post
                             Delivery Follow Up (PDFU) by CRC</td>
                             <td rowspan=5 >3</td>
                             <td rowspan=5 >{{ $resultcheck->result4 }}</td>
                             <td rowspan=3 >14</td>
                             <td rowspan=3 >Awareness Rate:</td>
                             <td>a. Awareness Rate: T-Care</td>
                             <td>{{ $resultkpi->kpi20 }}%</td>
                             <td>{{ $resultkpi->target20 }}%</td>
                             <td rowspan=3 >{{ $evaluation14 }}</td>
                            </tr>
                            <tr>
                             <td>b. Awareness Rate: T-intouh</td>
                             <td>{{ $resultkpi->kpi21 }}%</td>
                             <td>{{ $resultkpi->target21 }}%</td>
                            </tr>
                            <tr>
                             <td>c. Awareness Rate: Insurance</td>
                             <td>{{ $resultkpi->kpi22 }}%</td>
                             <td>{{ $resultkpi->target22 }}%</td>
                            </tr>
                            <tr>
                             <td rowspan=2>15</td>
                             <td rowspan=2>Survey Customer Interest:</td>
                             <td>a. Survey Customer Interest: T-Care</td>
                             <td>{{ $resultkpi->kpi23 }}%</td>
                             <td>{{ $resultkpi->target23 }}%</td>
                             <td rowspan=2>&nbsp;</td>
                            </tr>
                            <tr>
                             <td>b. Survey Customer Interest: T-Intouch</td>
                             <td>{{ $resultkpi->kpi24 }}%</td>
                             <td>{{ $resultkpi->target24 }}%</td>
                            </tr>
                            @php
                                if($resultkpi->result26+$resultkpi->result27 >= 2)
                                {
                                    $evaluation16 = "O";
                                    $evaluationshow16 = 1;
                                }
                                else {
                                    $evaluation16 = "X";
                                    $evaluationshow16 = 0;
                                }
                                if($resultkpi->result33+$resultkpi->result35+$resultkpi->result37+$resultkpi->result39 >= 3)
                                {
                                    $evaluation17 = "O";
                                    $evaluationshow17 = 1;
                                }
                                else {
                                    $evaluation17 = "X";
                                    $evaluationshow17 = 0;
                                }
                                if($resultkpi->result28+$resultkpi->result29+$resultkpi->result31 >= 2)
                                {
                                    $evaluation18 = "O";
                                    $evaluationshow18 = 1;
                                }
                                else {
                                    $evaluation18 = "X";
                                    $evaluationshow18 = 0;
                                }
                                if($resultkpi->result44+$resultkpi->result45+$resultkpi->result46 >= 2)
                                {
                                    $evaluation19 = "O";
                                    $evaluationshow19 = 1;
                                }
                                else {
                                    $evaluation19 = "X";
                                    $evaluationshow19 = 0;
                                }
                                $cat3 =($evaluationshow16+$evaluationshow17+$evaluationshow18+$resultkpi->result42+$resultkpi->result43+$evaluationshow19)/6;
                                if($cat3*100 >= 85)
                                {
                                    $catr3 = "Well Implemented";
                                    $catr3bg = "green";
                                }elseif($cat3*100 >= 70)
                                {
                                    $catr3 = "Medium Implemented";
                                    $catr3bg = "yellow";
                                }elseif($cat3*100 < 70)
                                {
                                    $catr3 = "low Implemented";
                                    $catr3bg = "red";
                                }
                                if($resultcheck->grade3 >= 85)
                                {
                                    $catrs3 = "Well Implemented";
                                    $catrs3bg = "green";
                                }elseif($resultcheck->grade3 >= 70)
                                {
                                    $catrs3 = "Medium Implemented";
                                    $catrs3bg = "yellow";
                                }elseif($resultcheck->grade3 < 70)
                                {
                                    $catrs3 = "low Implemented";
                                    $catrs3bg = "red";
                                }

                            @endphp
                            <tr>
                             <td rowspan=22>C. PSP SERVICE
                             GR</td>
                             <td rowspan=15>&nbsp;</td>
                             <td rowspan=15>&nbsp;</td>
                             <td rowspan=15>&nbsp;</td>
                             <td rowspan=22 bgcolor="{{ $catrs3bg }}">{{ $catrs3 }}</td>
                             <td rowspan=2 align="center">16</td>
                             <td rowspan=2>Net Promoter
                             Score (NPS) Aftersales</td>
                             <td >a. Net
                             Promoter Score (NPS) Aftersales GR</td>
                             <td>{{ $resultkpi->kpi26 }}%</td>
                             <td>{{ $resultkpi->target26 }}%</td>
                             <td rowspan=2>{{ $evaluation16 }}</td>
                             <td rowspan=22 bgcolor="{{ $catr3bg }}">{{ $catr3 }}</td>
                             <td rowspan=22><textarea name="issue3"></textarea></td>
                             <td rowspan=22><textarea name="action3"></textarea></td>
                            </tr>
                            <tr>
                             <td>b. Net Promoter Score (NPS) Aftersales BP</td>
                             <td>{{ $resultkpi->kpi27 }}%</td>
                             <td>{{ $resultkpi->target27 }}%</td>
                            </tr>
                            <tr>
                             <td rowspan=8>17</td>
                             <td rowspan=8>Gross Profit/Unit/Ratio (service, parts)</td>
                             <td >a. GP GR Service per unit(mio)</td>
                             <td>{{ $resultkpi->kpi32 }}%</td>
                             <td>-</td>
                             <td rowspan=8>{{ $evaluation17 }}</td>
                            </tr>
                            <tr>
                             <td>b. GP GR Service Ratio</td>
                             <td>{{ $resultkpi->kpi33 }}%</td>
                             <td>{{ $resultkpi->target33 }}%</td>
                            </tr>
                            <tr>
                             <td>c. GP GR Parts per unit(mio)</td>
                             <td>{{ $resultkpi->kpi34 }}%</td>
                             <td>-</td>
                            </tr>
                            <tr>
                             <td>d. GP GR Parts Ratio</td>
                             <td>{{ $resultkpi->kpi35 }}%</td>
                             <td>{{ $resultkpi->target35 }}%</td>
                            </tr>
                            <tr>
                             <td>e. GP BP Service per unit  (mio)</td>
                             <td>{{ $resultkpi->kpi36 }}%</td>
                             <td>-</td>
                            </tr>
                            <tr>
                             <td>f. GP BP Service Ratio</td>
                             <td>{{ $resultkpi->kpi37 }}%</td>
                             <td>{{ $resultkpi->target37 }}%</td>
                            </tr>
                            <tr>
                             <td>g. GP BP Parts per unit  (mio)</td>
                             <td>{{ $resultkpi->kpi38 }}%</td>
                             <td>-</td>
                            </tr>
                            <tr>
                             <td>h. GP BP Parts Ratio</td>
                             <td>{{ $resultkpi->kpi39 }}%</td>
                             <td>{{ $resultkpi->target39 }}%</td>
                            </tr>
                            <tr>
                             <td rowspan=4>18</td>
                             <td rowspan=4>Service Ratio (1st - 7th Service)</td>
                             <td>a. 1st Service T-care Lite Rate (LCGC)</td>
                             <td>{{ $resultkpi->kpi28 }}%</td>
                             <td>{{ $resultkpi->target28 }}%</td>
                             <td rowspan="4">{{ $evaluation18 }}</td>
                            </tr>
                            <tr>
                             <td>b. 1st Service T-care Rate (non LCGC)</td>
                             <td>{{ $resultkpi->kpi29 }}%</td>
                             <td>{{ $resultkpi->target29 }}%</td>
                            </tr>
                            <tr>
                             <td>c. PM Rate T-Care Lite 2nd Service (LCGC)</td>
                             <td>{{ $resultkpi->kpi30 }}%</td>
                             <td>{{ $resultkpi->target30 }}%</td>
                            </tr>
                            <tr>
                             <td>d. PM Rate T-Care 2nd-3rd Service (Non LCGC)</td>
                             <td>{{ $resultkpi->kpi31 }}%</td>
                             <td>{{ $resultkpi->target31 }}%</td>
                            </tr>
                            <tr>
                             <td>19</td>
                             <td colspan=2>Service Lead Time</td>
                             <td>{{ $resultkpi->kpi42 }}%</td>
                             <td>{{ $resultkpi->target42 }}%</td>
                             <td>@if($resultkpi->result42 == 1) O @else X @endif</td>
                            </tr>
                            <tr>
                             <td>C.1. Reminder Activity by MRA</td>
                             <td>6</td>
                             <td>{{ $resultcheck->result5 }}%</td>
                             <td>&nbsp;</td>
                             <td colspan=2>&nbsp;</td>
                             <td >&nbsp;</td>
                             <td >&nbsp;</td>
                             <td >&nbsp;</td>
                            </tr>
                            <tr>
                             <td rowspan=4>C.2. Reception [R] And Delivery [D] Process</td>
                             <td rowspan=4>26</td>
                             <td rowspan=4>{{ $resultcheck->result6 }}%</td>
                             <td rowspan=3>20</td>
                             <td rowspan=3>Cross Selling ratio (include BP)</td>
                             <td >a. Battery</td>
                             <td>{{ $resultkpi->kpi44 }}%</td>
                             <td>{{ $resultkpi->target44 }}%</td>
                             <td rowspan=3>{{ $evaluation19 }}</td>
                            </tr>
                            <tr>
                             <td>b. Car Care</td>
                             <td>{{ $resultkpi->kpi45 }}%</td>
                             <td>{{ $resultkpi->target45 }}%</td>
                            </tr>
                            <tr>
                             <td>c. Tire</td>
                             <td>{{ $resultkpi->kpi46 }}%</td>
                             <td>{{ $resultkpi->target46 }}%</td>
                            </tr>
                            <tr>
                             <td>21</td>
                             <td colspan=2>Up Selling ratio(TMO)</td>
                             <td>{{ $resultkpi->kpi43 }}%</td>
                             <td>{{ $resultkpi->target43 }}%</td>
                             <td>@if($resultkpi->result43 == 1) O @else X @endif</td>
                            </tr>
                            <tr>
                             <td >C.3. Production Process</td>
                             <td >7</td>
                             <td >{{ $resultcheck->result7 }}%</td>
                             <td >&nbsp;</td>
                             <td colspan=2>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td></td>
                             <td></td>
                            </tr>
                            <tr>
                             <td>C.4. Post Service Follow Up (PSFU)</td>
                             <td >6</td>
                             <td >{{ $resultcheck->result8 }}%</td>
                             <td >&nbsp;</td>
                             <td colspan=2>&nbsp;</td>
                             <td >&nbsp;</td>
                             <td >&nbsp;</td>
                             <td >&nbsp;</td>
                            </tr>
                            @php
                                $cat4 =($resultkpi->result47+$resultkpi->result48)/2;
                                if($cat4*100 >= 85)
                                {
                                    $catr4 = "Well Implemented";
                                    $catr4bg = "green";
                                }elseif($cat4*100 >= 70)
                                {
                                    $catr4 = "Medium Implemented";
                                    $catr4bg = "yellow";
                                }elseif($cat4*100 < 70)
                                {
                                    $catr4 = "low Implemented";
                                    $catr4bg = "red";
                                }
                                if($resultcheck->grade4 >= 85)
                                {
                                    $catrs4 = "Well Implemented";
                                    $catrs4bg = "green";
                                }elseif($resultcheck->grade4 >= 70)
                                {
                                    $catrs4 = "Medium Implemented";
                                    $catrs4bg = "yellow";
                                }elseif($resultcheck->grade4 < 70)
                                {
                                    $catrs4 = "low Implemented";
                                    $catrs4bg = "red";
                                }

                            @endphp
                            <tr>
                             <td rowspan=5>D. PSP SERVICE BP</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td rowspan=5 bgcolor="{{ $catrs4bg }}">{{ $catrs4 }}</td>
                             <td>22</td>
                             <td colspan="2">Ontime Delivery Ratio (OTD)</td>
                             <td>{{ $resultkpi->kpi47 }}%</td>
                             <td>{{ $resultkpi->target47 }}%</td>
                             <td>@if($resultkpi->result47 == 1) O @else X @endif</td>
                             <td rowspan=5 bgcolor="{{ $catr4bg }}">{{ $catr4 }}</td>
                             <td rowspan=5><textarea name="issue4"></textarea></td>
                             <td rowspan=5><textarea name="action4"></textarea></td>
                            </tr>
                            <tr>
                             <td >D.1. Reminder Process</td>
                             <td>3</td>
                             <td>{{ $resultcheck->result9 }}%</td>
                             <td>&nbsp;</td>
                             <td colspan="2">&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                            </tr>
                            <tr>
                             <td rowspan="2">D.2. Reception [R] And Delivery [D] After Service Process</td>
                             <td rowspan="2">11</td>
                             <td rowspan="2">{{ $resultcheck->result10 }}%</td>
                             <td rowspan="2">&nbsp;</td>
                             <td rowspan="2">Cross Selling ratio (include BP)</td>
                             <td>a. Battery</td>
                             <td>-</td>
                             <td>-</td>
                             <td rowspan=2>-</td>
                            </tr>
                            <tr>
                             <td>b. Tire</td>
                             <td>-</td>
                             <td>-</td>
                            </tr>
                            <tr>
                             <td >D.3. Post Service Follow Up (PSFU)</td>
                             <td>4</td>
                             <td>{{ $resultcheck->result11 }}%</td>
                             <td>23</td>
                             <td colspan="2">Return Job (RTJ)</td>
                             <td>{{ $resultkpi->kpi48 }}%</td>
                             <td>{{ $resultkpi->target48 }}%</td>
                             <td>@if($resultkpi->result48 == 1) O @else X @endif</td>
                            </tr>
                            @php
                                if($resultcheck->grade5 >= 85)
                                {
                                    $catrs5 = "Well Implemented";
                                    $catrs5bg = "green";
                                }elseif($resultcheck->grade5 >= 70)
                                {
                                    $catrs5 = "Medium Implemented";
                                    $catrs5bg = "yellow";
                                }elseif($resultcheck->grade5 < 70)
                                {
                                    $catrs5 = "low Implemented";
                                    $catrs5bg = "red";
                                }

                            @endphp
                            <tr>
                             <td rowspan=3>E. CUSTOMER DATABASE</td>
                             <td rowspan=2>E.1. Cleansing, Validity, &amp; Struktur Data</td>
                             <td rowspan=2>6</td>
                             <td rowspan=2>{{ $resultcheck->result12 }}%</td>
                             <td rowspan=3 bgcolor="{{ $catrs5bg }}">{{ $catrs5 }}</td>
                             <td >&nbsp;</td>
                             <td colspan=2>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td rowspan=3>&nbsp;</td>
                             <td rowspan=3 ><textarea name="issue5"></textarea></td>
                             <td rowspan=3><textarea name="issue6"></textarea></td>
                            </tr>
                            <tr>
                             <td>&nbsp;</td>
                             <td colspan=2>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                            </tr>
                            <tr>
                             <td>E.2. Database Utilization</td>
                             <td>6</td>
                             <td>{{ $resultcheck->result13 }}%</td>
                             <td>&nbsp;</td>
                             <td colspan=2>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                            </tr>
                            @php
                                if($resultcheck->grade6 >= 85)
                                {
                                    $catrs6 = "Well Implemented";
                                    $catrs6bg = "green";
                                }elseif($resultcheck->grade6 >= 70)
                                {
                                    $catrs6 = "Medium Implemented";
                                    $catrs6bg = "yellow";
                                }elseif($resultcheck->grade6 < 70)
                                {
                                    $catrs6 = "low Implemented";
                                    $catrs6bg = "red";
                                }

                            @endphp
                            <tr>
                             <td rowspan=3>F. TRADE IN</td>
                             <td>F.1. Trade In
                             Capability</td>
                             <td>2</td>
                             <td >{{ $resultcheck->result14 }}%</td>
                             <td rowspan=3 bgcolor="{{ $catrs6bg }}">{{ $catrs6 }}</td>
                             <td >&nbsp;</td>
                             <td colspan=2>Trade In Ratio</td>
                             <td>{{ $resultkpi->kpi49 }}%</td>
                             <td>{{ $resultkpi->target49 }}%</td>
                             <td>@if($resultkpi->result49 == 1) O @else X @endif</td>
                             <td @if($resultkpi->result49 == 1) bgcolor="green" @else bgcolor="red" @endif>@if($resultkpi->result49 == 1) Well Implemented @else Low implemented @endif</td>
                             <td rowspan=3><textarea></textarea></td>
                             <td rowspan=3><textarea></textarea></td>
                            </tr>
                            <tr>
                             <td >F.2. Trade In Operation</td>
                             <td>3</td>
                             <td >{{ $resultcheck->result15 }}%</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                            </tr>
                            <tr>
                             <td>F.3. Trade In Facility</td>
                             <td>2</td>
                             <td>{{ $resultcheck->result16 }}%</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                            </tr>
                            @php
                                if($resultkpi->result50+$resultkpi->result51 >= 2)
                                {
                                    $evaluation25 = "O";
                                    $evaluationshow25 = 1;
                                }
                                else {
                                    $evaluation25 = "X";
                                    $evaluationshow25 = 0;
                                }
                                $cat7 =($evaluationshow25+$resultkpi->result52)/3;
                                if($cat7*100 >= 85)
                                {
                                    $catr7 = "Well Implemented";
                                    $catr7bg = "green";
                                }elseif($cat7*100 >= 70)
                                {
                                    $catr7 = "Medium Implemented";
                                    $catr7bg = "yellow";
                                }elseif($cat7*100 < 70)
                                {
                                    $catr7 = "low Implemented";
                                    $catr7bg = "red";
                                }
                                if($resultcheck->grade7 >= 85)
                                {
                                    $catrs7 = "Well Implemented";
                                    $catrs7bg = "green";
                                }elseif($resultcheck->grade7 >= 70)
                                {
                                    $catrs7 = "Medium Implemented";
                                    $catrs7bg = "yellow";
                                }elseif($resultcheck->grade7 < 70)
                                {
                                    $catrs7 = "low Implemented";
                                    $catrs7bg = "red";
                                }

                            @endphp
                            <tr>
                             <td rowspan=5>G. MANPOWER</td>
                             <td rowspan=4>G.1. Manpower Productivity</td>
                             <td rowspan=4>3</td>
                             <td rowspan=4>{{ $resultcheck->result17 }}%</td>
                             <td rowspan=5 bgcolor="{{ $catrs7bg }}">{{ $catrs7 }}</td>
                             <td>&nbsp;</td>
                             <td colspan=2>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td rowspan=5 bgcolor="{{ $catr7bg }}">{{ $catr7 }}</td>
                             <td rowspan=5><textarea></textarea></td>
                             <td rowspan=5><textarea></textarea></td>
                            </tr>
                            <tr>
                             <td>22</td>
                             <td colspan=2>Salesperson Turn Over Ratio</td>
                             <td>{{ $resultkpi->kpi52 }}%</td>
                             <td>{{ $resultkpi->target52 }}%</td>
                             <td>@if($resultkpi->result52 == 1) O @else X @endif</td>
                            </tr>
                            <tr>
                             <td rowspan=2>23</td>
                             <td rowspan=2>Staff Productivity</td>
                             <td>a. Sales (Unit/salesperson)</td>
                             <td>{{ $resultkpi->kpi50 }}%</td>
                             <td>{{ $resultkpi->target50 }}%</td>
                             <td rowspan=2>{{ $evaluation25 }}</td>
                            </tr>
                            <tr>
                             <td>b. Aftersales (Overall productivity)</td>
                             <td>{{ $resultkpi->kpi51 }}%</td>
                             <td>{{ $resultkpi->target51 }}%</td>
                            </tr>
                            <tr>
                             <td>G.2. Training Manpower Activity</td>
                             <td>3</td>
                             <td>{{ $resultcheck->result18 }}%</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                            </tr>
                            @php
                                $finalcat = ($evaluation1+$evaluationshow2+$resultkpi->result11+$resultkpi->result12+$resultkpi->result13+$resultkpi->result14+$resultkpi->result15+$resultkpi->result16+$resultkpi->result17+$resultkpi->result19+$resultkpi->result49+$evaluation13+$evaluationshow14+$evaluationshow16+$evaluationshow17+$evaluationshow18+$resultkpi->result42+$resultkpi->result43+$evaluationshow19+$resultkpi->result47+$resultkpi->result48+$resultkpi->result49+$evaluationshow25+$resultkpi->result52)/24;

                                if($finalcat*100 >= 85)
                                {
                                    $finalcats = "Well Implemented";
                                    $finalcatsbg = "green";
                                }elseif($finalcat*100 >= 70)
                                {
                                    $finalcats = "Medium Implemented";
                                    $finalcatsbg = "yellow";
                                }elseif($finalcat*100 < 70)
                                {
                                    $finalcats = "low Implemented";
                                    $finalcatsbg = "red";
                                }

                                if($resultcheck->result >= 85)
                                {
                                    $catrs8 = "Well Implemented";
                                    $catrs8bg = "green";
                                }elseif($resultcheck->result >= 70)
                                {
                                    $catrs8 = "Medium Implemented";
                                    $catrs8bg = "yellow";
                                }elseif($resultcheck->result < 70)
                                {
                                    $catrs8 = "low Implemented";
                                    $catrs8bg = "red";
                                }
                            @endphp
                            <tr>
                             <td colspan=4>Final Grade</td>
                             <td bgcolor="{{ $catrs8bg }}">{{ $catrs8 }}</td>
                             <td colspan=6>Final Grade</td>
                             <td bgcolor="{{ $finalcatsbg }}">{{ $finalcat }}</td>
                             <td><textarea></textarea></td>
                             <td><textarea></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                    <span id="form_result_save"></span>
                    <div align="right">
                        <!-- <button type="button" name="create_barang" id="create_barang" class="btn btn-info btn-sm">Tambah Nama Barang</button> -->
                        {{-- <a href='formkpi/create' name="create_record" id="create_record" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</a> --}}
                    </div>
                    <br>

                    {{-- <table id="user_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th rowspan="2">Aktivitas</th>
                                <th colspan="4">Checksheet TCM</th>
                                <th colspan="5">Parameter Result</th>
                                <th rowspan="2">Issue</th>
                                <th rowspan="2">Action Plan</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Item to be Genba</th>
                                <th>Item Check</th>
                                <th>Done</th>
                                <th>Category</th>
                                <th></th>
                                <th>Actual</th>
                                <th>Target</th>
                                <th>Evaluation</th>
                                <th>Category</th>
                            </tr>
                            <tr>
                                <td rowspan="14">A. PSP Sales</td>
                                <td rowspan="8">-</td>
                                <td rowspan="8">-</td>
                                <td rowspan="8">-</td>
                                <td rowspan="18">Low Implemented</td>
                                <td>1</td>
                                <td>Net Promoter Score (NPS) Sales</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>O</td>
                                <td rowspan="18">Low Implemen</td>
                                <td rowspan="18"><textarea></textarea></td>
                                <td rowspan="18"><textarea></textarea></td>
                            </tr>
                        </thead>
                    </table> --}}
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" id="simpan" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </div>
</div>
@stop


@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>,table, th, td {
  border: 1px solid black;
}
</style>
@stop

@section('js')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
    var oTable = $('#user_table').DataTable({
        processing: true,
        lengthMenu : [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: '<"html5buttons">Brtipl',
        "order": [[ 1, "desc" ]],
        buttons : [
                    {extend: 'pdf', title:'Data KPI', },
                    {extend: 'excel', title: 'Data KPI', },
                    {extend:'print',title: 'Data KPI'},
        ],
    });


    $('#sample_form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
            $.ajax({
                beforeSend:function(){
                    $('#filter_button').html('<i disable class="fa fa-spinner fa-spin"></i>').attr('disabled', true);
                },
                success:function(){
                        $('#filter_button').html('<i class="fas fa-search"></i>').attr('disabled', false);
                    }
                });
    });
    $('#reset_filter_button').click(function(){
        $('#sample_form')[0].reset();
        $('.select2').val(null).trigger('change');
        oTable.draw();
        $.ajax({
            beforeSend:function(){
                $('#reset_filter_button').html('<i class="fas fa-undo"></i>').attr('disabled', true);
            },
            success:function(){
                    $('#reset_filter_button').html('<i class="fas fa-undo"></i>').attr('disabled', false);
                }
            });
    });

    //data catatan
    $('#create_record').click(function(){
        $('#sample_form2')[0].reset();
        $('.select2').val(null).trigger('change');
        $('.select2').select2();
        $('#lampiran').html('');
        // $('#cari').val(null).trigger('change');
        // $('#area').val(null).trigger('change');
        $('.modal-title').text("Data Cost Baru");
        $('#action_button').val("Add");
        $('#action').val("Add");
        $('#modal_catatan').modal('show');
    });

    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var idd = $(this).data('id');
        Swal.fire({
            title: "Apakah anda yakin akan menghapus KPI ini ?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var id = $(this).attr('id');
                $.ajax({
                    type: "DELETE",
                    url: "formkpi/"+id,
                    dataType: 'JSON',
                    data:{
                        'id': id,
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function (data) {
                        oTable.draw();
                        Swal.fire('Data berhasil dihapus', '', 'success')
                        console.log(id);
                        document.getElementById("lampiran" + id).remove();
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        })
    });
            $('#simpan').click(function(){
                console.log('sukses')
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Data berhasil disimpan',
                })
            });

});
</script>
@stop

@section('footer')
this
@stop
