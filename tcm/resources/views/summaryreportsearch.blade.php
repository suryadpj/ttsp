@extends('adminlte::page')

@section('title', 'TCM - Data Summary Report')

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
<form role="form" id="formdt" method='post' enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="periode" value="{{ $fperiode }}">
<input type="hidden" name="kantor" value="{{ $fkantor }}">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body table-responsive p-0">
                    <table class="table-bordered cell-border" width="100%" id="tblData">
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
                                    $evaluation2 = "<span class='badge badge-success'>O</span>";
                                    $evaluationshow2 = 1;
                                }
                                else {
                                    $evaluation2 = "<span class='badge badge-danger'>X</span>";
                                    $evaluationshow2 = 0;
                                }
                                $cat1 =($evaluation1+$evaluationshow2+$resultkpi->result11+$resultkpi->result12+$resultkpi->result13+$resultkpi->result14+$resultkpi->result15+$resultkpi->result16+$resultkpi->result17+$resultkpi->result19+$resultkpi->result49)/12;
                                if($cat1*100 >= 85)
                                {
                                    $catr1 = "<span class='badge badge-success'>Well Implemented</span>";
                                }elseif($cat1*100 >= 70)
                                {
                                    $catr1 = "<span class='badge badge-warning'><span class='badge badge-warning'>Medium Implemented</span></span>";
                                }elseif($cat1*100 < 70)
                                {
                                    $catr1 = "<span class='badge badge-danger'><span class='badge badge-danger'>Low Implemented</span></span>";
                                }
                                if($resultcheck->grade1 >= 85)
                                {
                                    $catrs1 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catrs1bg = "green";
                                }elseif($resultcheck->grade1 >= 70)
                                {
                                    $catrs1 = "<span class='badge badge-warning'><span class='badge badge-warning'>Medium Implemented</span></span>";
                                    $catrs1bg = "yellow";
                                }elseif($resultcheck->grade1 < 70)
                                {
                                    $catrs1 = "<span class='badge badge-danger'><span class='badge badge-danger'>Low Implemented</span></span>";
                                    $catrs1bg = "red";
                                }

                            @endphp
                            <tr>
                                <td rowspan="18">A.PSP Sales</td>
                                <td rowspan="8"></td>
                                <td rowspan="8"></td>
                                <td rowspan="8"></td>
                                <td align="center" rowspan="18">{!! $catrs1 !!}</td>
                                <td align="center">1</td>
                                <td colspan="2">Net promoter Score (NPS) Sales</td>
                                <td align="center">{{ $resultkpi->kpi1 }}%</td>
                                <td align="center">{{ $resultkpi->target1 }}%</td>
                                <td align="center">@if($resultkpi->result1 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                                <td align="center" rowspan="18">{!! $catr1 !!}</td>
                                @if(auth()->user()->can('summary_report_input'))
                                    <td rowspan="18"><textarea height="500" name="issue1">{{ $summary->issue1 ?? '' }}</textarea></td>
                                    <td rowspan="18"><textarea name="action1">{{ $summary->action1 ?? '' }}</textarea></td>
                                @else
                                    <td rowspan="18">{{ $summary->issue1 ?? '' }}</td>
                                    <td rowspan="18">{{ $summary->action1 ?? '' }}</td>
                                @endif
                            </tr>
                            <tr>
                                <td align="left" rowspan="7">2</td>
                                <td rowspan="7">Gross Profit/Unit/Ratio (vehicle/TCO/F&I Commission)</td>
                                <td>a. GP Total Sales (per unit)(mio)</td>
                                <td align="center">{{ $resultkpi->kpi2 }}</td>
                                <td align="center">-</td>
                                <td align="center" rowspan="7">{!! $evaluation2 !!}</td>
                            </tr>
                            <tr>
                                <td>b. GP Total Sales Ratio</td>
                                <td align="center">{{ $resultkpi->kpi3 }}%</td>
                                <td align="center">{{ $resultkpi->target3 }}%</td>
                            </tr>
                            <tr>
                                <td>c. GP Vehicle (per unit)(mio)</td>
                                <td align="center">{{ $resultkpi->kpi4 }}</td>
                                <td align="center">-</td>
                            </tr>
                            <tr>
                                <td>d. GP Vehicle Ratio</td>
                                <td align="center">{{ $resultkpi->kpi5 }}%</td>
                                <td align="center">{{ $resultkpi->target5 }}%</td>
                            </tr>
                            <tr>
                                <td>e. GP TCO (per unit)(mio)</td>
                                <td align="center">{{ $resultkpi->kpi6 }}</td>
                                <td align="center">-</td>
                            </tr>
                            <tr>
                                <td>f. GP TCO Ratio</td>
                                <td align="center">{{ $resultkpi->kpi7 }}%</td>
                                <td align="center">{{ $resultkpi->target7 }}%</td>
                            </tr>
                            <tr>
                                <td>g. F&I Commision (per unit)(mio)</td>
                                <td align="center">{{ $resultkpi->kpi8 }}</td>
                                <td align="center">-</td>
                            </tr>
                            <tr>
                             <td rowspan=6>A.1. Sales Person Offering Process</td>
                             <td rowspan=6>14</td>
                             <td rowspan=6>{{ $resultcheck->result1 }}%</td>
                             <td align="center">3</td>
                             <td colspan=2>M-Quote utilization ratio</td>
                             <td align="center">{{ $resultkpi->kpi15 }}%</td>
                             <td align="center">{{ $resultkpi->target15 }}%</td>
                             <td align="center">@if($resultkpi->result15 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            <tr>
                             <td>4</td>
                             <td colspan=2>Total Revenue</td>
                             <td align="center">{{ $resultkpi->kpi11 }}</td>
                             <td align="center">{{ $resultkpi->target11 }}</td>
                             <td align="center">@if($resultkpi->result11 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            <tr>
                             <td>5</td>
                             <td colspan=2>Toyota Insurance Share</td>
                             <td align="center">{{ $resultkpi->kpi12 }}%</td>
                             <td align="center">{{ $resultkpi->target12 }}%</td>
                             <td align="center">@if($resultkpi->result12 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            <tr>
                             <td>6</td>
                             <td colspan=2>Credit Ratio</td>
                             <td align="center">{{ $resultkpi->kpi13 }}%</td>
                             <td align="center">{{ $resultkpi->target13 }}%</td>
                             <td align="center">@if($resultkpi->result13 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            <tr>
                             <td>7</td>
                             <td colspan=2>Market Share Credit Portion (MSCP)</td>
                             <td align="center">{{ $resultkpi->kpi14 }}%</td>
                             <td align="center">{{ $resultkpi->target14 }}%</td>
                             <td align="center">@if($resultkpi->result14 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            <tr>
                             <td>8</td>
                             <td colspan=2>Trade In Ratio</td>
                             <td align="center">{{ $resultkpi->kpi49 }}%</td>
                             <td align="center">{{ $resultkpi->target49 }}%</td>
                             <td align="center">@if($resultkpi->result49 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            <tr>
                             <td rowspan=4>A.2. Advance Demand &amp; Supply
                             Management</td>
                             <td rowspan=4 >4</td>
                             <td rowspan=4>{{ $resultcheck->result2 }}%</td>
                             <td align="center">9</td>
                             <td colspan=2 >AO Report
                             Establishment</td>
                             <td align="center">{{ $resultkpi->kpi17 }}</td>
                             <td align="center">{{ $resultkpi->target17 }}</td>
                             <td align="center">@if($resultkpi->result17 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            <tr>
                             <td align="center">10</td>
                             <td colspan=2>Monthly SPK Achievement (vs Target Rundown)</td>
                             <td align="center">{{ $resultkpi->kpi16 }}%</td>
                             <td align="center">{{ $resultkpi->target16 }}%</td>
                             <td align="center">@if($resultkpi->result16 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            <tr>
                             <td>11</td>
                             <td colspan=2>Outstanding Matching to target Ratio (on AO25
                             Achievement)</td>
                             <td align="center">{{ $resultkpi->kpi18 }}%</td>
                             <td align="center">{{ $resultkpi->target18 }}%</td>
                             <td align="center"></td>
                            </tr>
                            <tr>
                             <td >12</td>
                             <td colspan=2>Monthly Sales Target Achievement (Target
                             Operation)</td>
                             <td align="center">{{ $resultkpi->kpi19 }}%</td>
                             <td align="center">{{ $resultkpi->target19 }}%</td>
                             <td align="center">@if($resultkpi->result19 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            @php
                                $evaluation13 = $resultkpi->result25;
                                if($resultkpi->result20+$resultkpi->result21+$resultkpi->result22 >= 2)
                                {
                                    $evaluation14 = "<span class='badge badge-success'>O</span>";
                                    $evaluationshow14 = 1;
                                }
                                else {
                                    $evaluation14 = "<span class='badge badge-danger'>X</span>";
                                    $evaluationshow14 = 0;
                                }
                                $cat2 =($evaluation13+$evaluationshow14)/2;
                                if($cat2*100 >= 85)
                                {
                                    $catr2 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catr2bg = "green";
                                }elseif($cat2*100 >= 70)
                                {
                                    $catr2 = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $catr2bg = "yellow";
                                }elseif($cat2*100 < 70)
                                {
                                    $catr2 = "<span class='badge badge-danger'>low Implemented</span>";
                                    $catr2bg = "red";
                                }
                                if($resultcheck->grade2 >= 85)
                                {
                                    $catrs2 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catrs2bg = "green";
                                }elseif($resultcheck->grade2 >= 70)
                                {
                                    $catrs2 = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $catrs2bg = "yellow";
                                }elseif($resultcheck->grade2 < 70)
                                {
                                    $catrs2 = "<span class='badge badge-danger'>low Implemented</span>";
                                    $catrs2bg = "red";
                                }

                            @endphp
                            <tr >
                             <td rowspan=6 >B. DELIVERY EXPLANATION</td>
                             <td >B.1.
                             Delivery Explaination (DEC) by Salesperson</td>
                             <td>16</td>
                             <td >{{ $resultcheck->result3 }}%</td>
                             <td align="center" rowspan=6>{!! $catrs2 !!}</td>
                             <td align="center">13</td>
                             <td colspan=2>T-Intouch Activation Rate</td>
                             <td align="center">{{ $resultkpi->kpi25 }}%</td>
                             <td align="center">{{ $resultkpi->target25 }}%</td>
                             <td align="center">@if($resultkpi->result25 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                             <td align="center" rowspan=6 >{!! $catr2 !!}</td>
                             @if(auth()->user()->can('summary_report_input'))
                                <td rowspan=6 ><textarea name="issue2">{{ $summary->issue2  ?? ''}}</textarea></td>
                                <td rowspan=6><textarea name="action2">{{ $summary->action2 ?? '' }}</textarea></td>
                             @else
                                 <td rowspan="6">{{ $summary->issue2 ?? '' }}</td>
                                 <td rowspan="6">{{ $summary->action2 ?? '' }}</td>
                             @endif
                            </tr>
                            <tr>
                             <td rowspan=5>B.2. Post
                             Delivery Follow Up (PDFU) by CRC</td>
                             <td rowspan=5 >3</td>
                             <td rowspan=5 >{{ $resultcheck->result4 }}%</td>
                             <td rowspan=3 >14</td>
                             <td rowspan=3 >Awareness Rate:</td>
                             <td>a. Awareness Rate: T-Care</td>
                             <td align="center">{{ $resultkpi->kpi20 }}%</td>
                             <td align="center">{{ $resultkpi->target20 }}%</td>
                             <td align="center" rowspan=3 >{!! $evaluation14 !!}</td>
                            </tr>
                            <tr>
                             <td>b. Awareness Rate: T-intouh</td>
                             <td align="center">{{ $resultkpi->kpi21 }}%</td>
                             <td align="center">{{ $resultkpi->target21 }}%</td>
                            </tr>
                            <tr>
                             <td>c. Awareness Rate: Insurance</td>
                             <td align="center">{{ $resultkpi->kpi22 }}%</td>
                             <td align="center">{{ $resultkpi->target22 }}%</td>
                            </tr>
                            <tr>
                             <td rowspan=2>15</td>
                             <td rowspan=2>Survey Customer Interest:</td>
                             <td>a. Survey Customer Interest: T-Care</td>
                             <td align="center">{{ $resultkpi->kpi23 }}%</td>
                             <td align="center">{{ $resultkpi->target23 }}%</td>
                             <td rowspan=2>&nbsp;</td>
                            </tr>
                            <tr>
                             <td>b. Survey Customer Interest: T-Intouch</td>
                             <td align="center">{{ $resultkpi->kpi24 }}%</td>
                             <td align="center">{{ $resultkpi->target24 }}%</td>
                            </tr>
                            @php
                                if($resultkpi->result26+$resultkpi->result27 >= 2)
                                {
                                    $evaluation16 = "<span class='badge badge-success'>O</span>";
                                    $evaluationshow16 = 1;
                                }
                                else {
                                    $evaluation16 = "<span class='badge badge-danger'>X</span>";
                                    $evaluationshow16 = 0;
                                }
                                if($resultkpi->result33+$resultkpi->result35+$resultkpi->result37+$resultkpi->result39 >= 3)
                                {
                                    $evaluation17 = "<span class='badge badge-success'>O</span>";
                                    $evaluationshow17 = 1;
                                }
                                else {
                                    $evaluation17 = "<span class='badge badge-danger'>X</span>";
                                    $evaluationshow17 = 0;
                                }
                                if($resultkpi->result28+$resultkpi->result29+$resultkpi->result31 >= 2)
                                {
                                    $evaluation18 = "<span class='badge badge-success'>O</span>";
                                    $evaluationshow18 = 1;
                                }
                                else {
                                    $evaluation18 = "<span class='badge badge-danger'>X</span>";
                                    $evaluationshow18 = 0;
                                }
                                if($resultkpi->result44+$resultkpi->result45+$resultkpi->result46 >= 2)
                                {
                                    $evaluation19 = "<span class='badge badge-success'>O</span>";
                                    $evaluationshow19 = 1;
                                }
                                else {
                                    $evaluation19 = "<span class='badge badge-danger'>X</span>";
                                    $evaluationshow19 = 0;
                                }
                                $cat3 =($evaluationshow16+$evaluationshow17+$evaluationshow18+$resultkpi->result42+$resultkpi->result43+$evaluationshow19)/6;
                                if($cat3*100 >= 85)
                                {
                                    $catr3 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catr3bg = "green";
                                }elseif($cat3*100 >= 70)
                                {
                                    $catr3 = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $catr3bg = "yellow";
                                }elseif($cat3*100 < 70)
                                {
                                    $catr3 = "<span class='badge badge-danger'>low Implemented</span>";
                                    $catr3bg = "red";
                                }
                                if($resultcheck->grade3 >= 85)
                                {
                                    $catrs3 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catrs3bg = "green";
                                }elseif($resultcheck->grade3 >= 70)
                                {
                                    $catrs3 = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $catrs3bg = "yellow";
                                }elseif($resultcheck->grade3 < 70)
                                {
                                    $catrs3 = "<span class='badge badge-danger'>low Implemented</span>";
                                    $catrs3bg = "red";
                                }

                            @endphp
                            <tr>
                             <td rowspan=22>C. PSP SERVICE
                             GR</td>
                             <td rowspan=15>&nbsp;</td>
                             <td rowspan=15>&nbsp;</td>
                             <td rowspan=15>&nbsp;</td>
                             <td align="center" rowspan=22>{!! $catrs3 !!}</td>
                             <td rowspan=2 align="center">16</td>
                             <td rowspan=2>Net Promoter
                             Score (NPS) Aftersales</td>
                             <td >a. Net
                             Promoter Score (NPS) Aftersales GR</td>
                             <td align="center">{{ $resultkpi->kpi26 }}%</td>
                             <td align="center">{{ $resultkpi->target26 }}%</td>
                             <td align="center" rowspan=2>{!! $evaluation16 !!}</td>
                             <td align="center" rowspan=22>{!! $catr3 !!}</td>
                             @if(auth()->user()->can('summary_report_input'))
                                <td rowspan=22><textarea name="issue3">{{ $summary->issue3  ?? ''}}</textarea></td>
                                <td rowspan=22><textarea name="action3">{{ $summary->action3 ?? '' }}</textarea></td>
                             @else
                                 <td rowspan="22">{{ $summary->issue3 ?? '' }}</td>
                                 <td rowspan="22">{{ $summary->action3 ?? '' }}</td>
                             @endif
                            </tr>
                            <tr>
                             <td>b. Net Promoter Score (NPS) Aftersales BP</td>
                             <td align="center">{{ $resultkpi->kpi27 }}%</td>
                             <td align="center">{{ $resultkpi->target27 }}%</td>
                            </tr>
                            <tr>
                             <td rowspan=8>17</td>
                             <td rowspan=8>Gross Profit/Unit/Ratio (service, parts)</td>
                             <td >a. GP GR Service per unit(mio)</td>
                             <td align="center">{{ $resultkpi->kpi32 }}</td>
                             <td align="center">-</td>
                             <td align="center" rowspan=8>{!! $evaluation17 !!}</td>
                            </tr>
                            <tr>
                             <td>b. GP GR Service Ratio</td>
                             <td align="center">{{ $resultkpi->kpi33 }}%</td>
                             <td align="center">{{ $resultkpi->target33 }}%</td>
                            </tr>
                            <tr>
                             <td>c. GP GR Parts per unit(mio)</td>
                             <td align="center">{{ $resultkpi->kpi34 }}</td>
                             <td align="center">-</td>
                            </tr>
                            <tr>
                             <td>d. GP GR Parts Ratio</td>
                             <td align="center">{{ $resultkpi->kpi35 }}%</td>
                             <td align="center">{{ $resultkpi->target35 }}%</td>
                            </tr>
                            <tr>
                             <td>e. GP BP Service per unit  (mio)</td>
                             <td align="center">{{ $resultkpi->kpi36 }}</td>
                             <td align="center">-</td>
                            </tr>
                            <tr>
                             <td>f. GP BP Service Ratio</td>
                             <td align="center">{{ $resultkpi->kpi37 }}%</td>
                             <td align="center">{{ $resultkpi->target37 }}%</td>
                            </tr>
                            <tr>
                             <td>g. GP BP Parts per unit  (mio)</td>
                             <td align="center">{{ $resultkpi->kpi38 }}</td>
                             <td align="center">-</td>
                            </tr>
                            <tr>
                             <td>h. GP BP Parts Ratio</td>
                             <td align="center">{{ $resultkpi->kpi39 }}%</td>
                             <td align="center">{{ $resultkpi->target39 }}%</td>
                            </tr>
                            <tr>
                             <td rowspan=4>18</td>
                             <td rowspan=4>Service Ratio (1st - 7th Service)</td>
                             <td>a. 1st Service T-care Lite Rate (LCGC)</td>
                             <td align="center">{{ $resultkpi->kpi28 }}%</td>
                             <td align="center">{{ $resultkpi->target28 }}%</td>
                             <td align="center" rowspan="4">{!! $evaluation18 !!}</td>
                            </tr>
                            <tr>
                             <td>b. 1st Service T-care Rate (non LCGC)</td>
                             <td align="center">{{ $resultkpi->kpi29 }}%</td>
                             <td align="center">{{ $resultkpi->target29 }}%</td>
                            </tr>
                            <tr>
                             <td>c. PM Rate T-Care Lite 2nd Service (LCGC)</td>
                             <td align="center">{{ $resultkpi->kpi30 }}%</td>
                             <td align="center">{{ $resultkpi->target30 }}%</td>
                            </tr>
                            <tr>
                             <td>d. PM Rate T-Care 2nd-3rd Service (Non LCGC)</td>
                             <td align="center">{{ $resultkpi->kpi31 }}%</td>
                             <td align="center">{{ $resultkpi->target31 }}%</td>
                            </tr>
                            <tr>
                             <td>19</td>
                             <td colspan=2>Service Lead Time</td>
                             <td align="center">{{ $resultkpi->kpi42 }}</td>
                             <td align="center">02:30:00</td>
                             <td align="center">@if($resultkpi->result42 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
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
                             <td align="center">{{ $resultkpi->kpi44 }}%</td>
                             <td align="center">{{ $resultkpi->target44 }}%</td>
                             <td align="center" rowspan=3>{!! $evaluation19 !!}</td>
                            </tr>
                            <tr>
                             <td>b. Car Care</td>
                             <td align="center">{{ $resultkpi->kpi45 }}%</td>
                             <td align="center">{{ $resultkpi->target45 }}%</td>
                            </tr>
                            <tr>
                             <td>c. Tire</td>
                             <td align="center">{{ $resultkpi->kpi46 }}%</td>
                             <td align="center">{{ $resultkpi->target46 }}%</td>
                            </tr>
                            <tr>
                             <td>21</td>
                             <td colspan=2>Up Selling ratio(TMO)</td>
                             <td align="center">{{ $resultkpi->kpi43 }}%</td>
                             <td align="center">{{ $resultkpi->target43 }}%</td>
                             <td align="center">@if($resultkpi->result43 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            <tr>
                             <td >C.3. Production Process</td>
                             <td >7</td>
                             <td align="center" >{{ $resultcheck->result7 }}%</td>
                             <td >&nbsp;</td>
                             <t align="center" colspan=2>&nbsp;</t>
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
                                    $catr4 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catr4bg = "green";
                                }elseif($cat4*100 >= 70)
                                {
                                    $catr4 = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $catr4bg = "yellow";
                                }elseif($cat4*100 < 70)
                                {
                                    $catr4 = "<span class='badge badge-danger'>low Implemented</span>";
                                    $catr4bg = "red";
                                }
                                if($resultcheck->grade4 >= 85)
                                {
                                    $catrs4 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catrs4bg = "green";
                                }elseif($resultcheck->grade4 >= 70)
                                {
                                    $catrs4 = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $catrs4bg = "yellow";
                                }elseif($resultcheck->grade4 < 70)
                                {
                                    $catrs4 = "<span class='badge badge-danger'>low Implemented</span>";
                                    $catrs4bg = "red";
                                }

                            @endphp
                            <tr>
                             <td rowspan=5>D. PSP SERVICE BP</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td align="center" rowspan=5 >{!! $catrs4 !!}</td>
                             <td>22</td>
                             <td colspan="2">Ontime Delivery Ratio (OTD)</td>
                             <td align="center">{{ $resultkpi->kpi47 }}%</td>
                             <td align="center">{{ $resultkpi->target47 }}%</td>
                             <td align="center">@if($resultkpi->result47 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                             <td align="center" rowspan=5>{!! $catr4 !!}</td>
                             @if(auth()->user()->can('summary_report_input'))
                             <td rowspan=5><textarea name="issue4">{{ $summary->issue4  ?? ''}}</textarea></td>
                             <td rowspan=5><textarea name="action4">{{ $summary->action4 ?? '' }}</textarea></td>
                             @else
                                 <td rowspan="5">{{ $summary->issue4 ?? '' }}</td>
                                 <td rowspan="5">{{ $summary->action4 ?? '' }}</td>
                             @endif
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
                             <td align="center">-</td>
                             <td align="center">-</td>
                             <td align="center" rowspan=2>-</td>
                            </tr>
                            <tr>
                             <td>b. Tire</td>
                             <td align="center">-</td>
                             <td align="center">-</td>
                            </tr>
                            <tr>
                             <td >D.3. Post Service Follow Up (PSFU)</td>
                             <td>4</td>
                             <td>{{ $resultcheck->result11 }}%</td>
                             <td>23</td>
                             <td colspan="2">Return Job (RTJ)</td>
                             <td align="center">{{ $resultkpi->kpi48 }}%</td>
                             <td align="center">{{ $resultkpi->target48 }}%</td>
                             <td align="center">@if($resultkpi->result48 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            @php
                                if($resultcheck->grade5 >= 85)
                                {
                                    $catrs5 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catrs5bg = "green";
                                }elseif($resultcheck->grade5 >= 70)
                                {
                                    $catrs5 = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $catrs5bg = "yellow";
                                }elseif($resultcheck->grade5 < 70)
                                {
                                    $catrs5 = "<span class='badge badge-danger'>low Implemented</span>";
                                    $catrs5bg = "red";
                                }

                            @endphp
                            <tr>
                             <td rowspan=3>E. CUSTOMER DATABASE</td>
                             <td rowspan=2>E.1. Cleansing, Validity, &amp; Struktur Data</td>
                             <td rowspan=2>6</td>
                             <td rowspan=2>{{ $resultcheck->result12 }}%</td>
                             <td align="center" rowspan=3>{!! $catrs5 !!}</td>
                             <td >&nbsp;</td>
                             <td colspan=2>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td rowspan=3>&nbsp;</td>
                             @if(auth()->user()->can('summary_report_input'))
                             <td rowspan=3 ><textarea name="issue5">{{ $summary->issue5  ?? ''}}</textarea></td>
                             <td rowspan=3><textarea name="action5">{{ $summary->action5 ?? '' }}</textarea></td>
                             @else
                                 <td rowspan="3">{{ $summary->issue5 ?? '' }}</td>
                                 <td rowspan="3">{{ $summary->action5 ?? '' }}</td>
                             @endif
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
                                    $catrs6 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catrs6bg = "green";
                                }elseif($resultcheck->grade6 >= 70)
                                {
                                    $catrs6 = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $catrs6bg = "yellow";
                                }elseif($resultcheck->grade6 < 70)
                                {
                                    $catrs6 = "<span class='badge badge-danger'>low Implemented</span>";
                                    $catrs6bg = "red";
                                }

                            @endphp
                            <tr>
                             <td rowspan=3>F. TRADE IN</td>
                             <td>F.1. Trade In
                             Capability</td>
                             <td>2</td>
                             <td >{{ $resultcheck->result14 }}%</td>
                             <td align="center" rowspan=3>{!! $catrs6 !!}</td>
                             <td >&nbsp;</td>
                             <td colspan=2>Trade In Ratio</td>
                             <td align="center">{{ $resultkpi->kpi49 }}%</td>
                             <td align="center">{{ $resultkpi->target49 }}%</td>
                             <td align="center">@if($resultkpi->result49 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                             <td align="center">@if($resultkpi->result49 == 1) <span class='badge badge-success'>Well Implemented</span> @else <span class='badge badge-danger'>Low implemented</span> @endif</td>
                             @if(auth()->user()->can('summary_report_input'))
                             <td rowspan=3><textarea name="issue6">{{ $summary->issue6  ?? ''}}</textarea></td>
                             <td rowspan=3><textarea name="action6">{{ $summary->action6 ?? '' }}</textarea></td>
                             @else
                                 <td rowspan="3">{{ $summary->issue6 ?? '' }}</td>
                                 <td rowspan="3">{{ $summary->action6 ?? '' }}</td>
                             @endif
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
                                    $evaluation25 = "<span class='badge badge-success'>O</span>";
                                    $evaluationshow25 = 1;
                                }
                                else {
                                    $evaluation25 = "<span class='badge badge-danger'>X</span>";
                                    $evaluationshow25 = 0;
                                }
                                $cat7 =($evaluationshow25+$resultkpi->result52)/3;
                                if($cat7*100 >= 85)
                                {
                                    $catr7 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catr7bg = "green";
                                }elseif($cat7*100 >= 70)
                                {
                                    $catr7 = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $catr7bg = "yellow";
                                }elseif($cat7*100 < 70)
                                {
                                    $catr7 = "<span class='badge badge-danger'>low Implemented</span>";
                                    $catr7bg = "red";
                                }
                                if($resultcheck->grade7 >= 85)
                                {
                                    $catrs7 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catrs7bg = "green";
                                }elseif($resultcheck->grade7 >= 70)
                                {
                                    $catrs7 = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $catrs7bg = "yellow";
                                }elseif($resultcheck->grade7 < 70)
                                {
                                    $catrs7 = "<span class='badge badge-danger'>low Implemented</span>";
                                    $catrs7bg = "red";
                                }

                            @endphp
                            <tr>
                             <td rowspan=5>G. MANPOWER</td>
                             <td rowspan=4>G.1. Manpower Productivity</td>
                             <td rowspan=4>3</td>
                             <td rowspan=4>{{ $resultcheck->result17 }}%</td>
                             <td align="center" rowspan=5>{!! $catrs7 !!}</td>
                             <td>&nbsp;</td>
                             <td colspan=2>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td align="center">{!! $catr7 !!}</td>
                             @if(auth()->user()->can('summary_report_input'))
                             <td rowspan=5><textarea name="issue7">{{ $summary->issue7  ?? ''}}</textarea></td>
                             <td rowspan=5><textarea name="action7">{{ $summary->action7 ?? '' }}</textarea></td>
                             @else
                                 <td rowspan="5">{{ $summary->issue7 ?? '' }}</td>
                                 <td rowspan="5">{{ $summary->action7 ?? '' }}</td>
                             @endif
                            </tr>
                            <tr>
                             <td>22</td>
                             <td colspan=2>Salesperson Turn Over Ratio</td>
                             <td align="center">{{ $resultkpi->kpi52 }}%</td>
                             <td align="center">{{ $resultkpi->target52 }}%</td>
                             <td align="center">@if($resultkpi->result52 == 1) <span class='badge badge-success'>O</span> @else <span class='badge badge-danger'>X</span> @endif</td>
                            </tr>
                            <tr>
                             <td rowspan=2>23</td>
                             <td rowspan=2>Staff Productivity</td>
                             <td>a. Sales (Unit/salesperson)</td>
                             <td align="center">{{ $resultkpi->kpi50 }}%</td>
                             <td align="center">{{ $resultkpi->target50 }}%</td>
                             <td align="center" rowspan=2>{!! $evaluation25 !!}</td>
                            </tr>
                            <tr>
                             <td>b. Aftersales (Overall productivity)</td>
                             <td align="center">{{ $resultkpi->kpi51 }}%</td>
                             <td align="center">{{ $resultkpi->target51 }}%</td>
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
                                    $finalcats = "<span class='badge badge-success'>Well Implemented</span>";
                                    $finalcatsbg = "green";
                                }elseif($finalcat*100 >= 70)
                                {
                                    $finalcats = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $finalcatsbg = "yellow";
                                }elseif($finalcat*100 < 70)
                                {
                                    $finalcats = "<span class='badge badge-danger'>low Implemented</span>";
                                    $finalcatsbg = "red";
                                }

                                if($resultcheck->result >= 85)
                                {
                                    $catrs8 = "<span class='badge badge-success'>Well Implemented</span>";
                                    $catrs8bg = "green";
                                }elseif($resultcheck->result >= 70)
                                {
                                    $catrs8 = "<span class='badge badge-warning'>Medium Implemented</span>";
                                    $catrs8bg = "yellow";
                                }elseif($resultcheck->result < 70)
                                {
                                    $catrs8 = "<span class='badge badge-danger'>low Implemented</span>";
                                    $catrs8bg = "red";
                                }
                            @endphp
                            <tr>
                             <td colspan=4>Final Grade</td>
                             <td align="center">{!! $catrs8 !!}</td>
                             <td colspan=6>Final Grade</td>
                             <td align="center">{!! $finalcats !!}</td>
                            </tr>
                        </tbody>
                    </table>
                    <span id="form_result_save"></span>
                    <div align="right">
                        <!-- <button type="button" name="create_barang" id="create_barang" class="btn btn-info btn-sm">Tambah Nama Barang</button> -->
                        {{-- <a href='formkpi/create' name="create_record" id="create_record" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</a> --}}
                    </div>
                    <br>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" id="action_button" class="btn btn-primary">Simpan Data</button>
                <a class="btn btn-success" href="summaryreportexcel?periode={{ $fperiode }}&kantor={{ $fkantor }}">Export to Excel</a>
            </div>
        </div>
    </div>
</div>
</form>
@stop


@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@stop

@section('js')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script type="text/javascript">function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}
$(document).ready(function(){
        $('#formdt').on('submit', function(event){
            event.preventDefault();
            console.log('submitkpimanual')
            $.ajax({
                url:"{{ route('summaryreport.store') }}",
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache:false,
                processData: false,
                dataType:"json",
                beforeSend:function(){
                    $('#action_button').html('<i disable class="fa fa-spinner fa-spin"></i>').attr('disabled', true);
                },
                success:function(data)
                {
                    var html = '';
                    if(data.errors)
                    {
                        html = '';
                        for(var count = 0; count < data.errors.length; count++)
                        {
                            html += data.errors[count] + '<br>';
                        }
                        swal.fire({
                            icon: 'warning',
                            title: 'Data gagal disimpan',
                            html: html
                        })
                        $('#action_button').html('<i class="fa fa-paper-plane"></i> Send').attr('disabled', false);
                    }
                    if(data.ektension)
                    {
                        swal.fire({
                            icon: 'warning',
                            title: 'Data gagal disimpan',
                            text: 'Ekstensi file yang diizinkan hanya PDF, JPG, PNG, DOCX'
                        })
                        $('#action_button').html('<i class="fa fa-paper-plane"></i> Send').attr('disabled', false);
                    }
                    if(data.duplicate)
                    {
                        swal.fire({
                            icon: 'warning',
                            title: 'Data gagal disimpan',
                            text: data.duplicate
                        })
                        $('#action_button').html('<i class="fa fa-paper-plane"></i> Send').attr('disabled', false);
                    }
                    if(data.success)
                    {
                        // $('#formdt')[0].reset();
                        // $('.select3').val(null).trigger('change');
                        // $('.select3').select2();
                        $('#action_button').html('<i class="fa fa-paper-plane"></i> Send').attr('disabled', false);
                        swal.fire({
                            icon: 'success',
                            title: 'Data berhasil disimpan. Terima kasih',
                            text: data.success
                        })

                        $.ajax({
                            url:"badgedraft",
                            dataType:"json",
                            success:function(html)
                            {
                                $('#badgedraft').html(html.data)
                            if(html.data == 0)
                            {
                                $('#badgedrafticon').hide();
                            }
                            else
                            {
                                $('#badgedrafticon').show();
                            }
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    swal.fire({
                        icon: 'error',
                        title: 'Data gagal disimpan',
                        text: errorMessage
                    });
                    console.log(xhr);
                    $('#action_button').html('Save changes').attr('disabled', false);
                }
            })
        });
});
</script>
@stop

@section('footer')
Tunas Toyota Head Office &copy; 2023
@stop
