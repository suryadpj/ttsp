@extends('adminlte::page')

@section('title', 'TCM - Data KPI')

@section('content_header')
    <h3>Summary TCM Evaluation</h3>
@stop


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <form id="sample_form">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input  type="month" class="form-control datea" name="search_periode" id="search_periode" placeholder="Periode">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                        <select class="form-control select2" name="search_kantor" id="search_kantor"  style="width: 100%;">
                            <option value=''>Pilih Kantor</option>
                            @foreach($kantor as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
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
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body table-responsive p-0">
                    <table id="example1" class="table table-bordered cell-border">
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
                            <tr>
                                <td rowspan="18">A.PSP Sales</td>
                                <td rowspan="8"></td>
                                <td rowspan="8"></td>
                                <td rowspan="8"></td>
                                <td rowspan="18"></td>
                                <td align="left">1</td>
                                <td colspan="2">Net promoter Score (NPS) Sales</td>
                                <td>100%</td>
                                <td>100%</td>
                                <td rowspan="8">O</td>
                                <td rowspan="18" bgcolor="red">Low Implemented</td>
                                <td rowspan="18"><textarea height="500"></textarea></td>
                                <td rowspan="18"><textarea></textarea></td>
                            </tr>
                            <tr>
                                <td align="left" rowspan="7">2</td>
                                <td rowspan="7">Gross Profit/Unit/Ratio (vehicle/TCO/F&I Commission)</td>
                                <td>a. GP Total Sales (per unit)(mio)</td>
                                <td>100%</td>
                                <td>100%</td>
                            </tr>
                            <tr>
                                <td>b. GP Total Sales Ratio</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>c. GP Vehicle (per unit)(mio)</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>d. GP Vehicle Ratio</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>e. GP TCO (per unit)(mio)</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>f. GP TCO Ratio</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>g. F&I Commision (per unit)(mio)</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                             <td rowspan=6>A.1. Sales Person Offering Process</td>
                             <td rowspan=6>16</td>
                             <td rowspan=6>0%</td>
                             <td>3</td>
                             <td colspan=2>M-Quote utilization ratio</td>
                             <td>72%</td>
                             <td>50%</td>
                             <td>O</td>
                            </tr>
                            <tr>
                             <td>4</td>
                             <td colspan=2>TCO Installation Ratio</td>
                             <td>-</td>
                             <td>40%</td>
                             <td>X</td>
                            </tr>
                            <tr>
                             <td>5</td>
                             <td colspan=2>Toyota Insurance Share</td>
                             <td>12%</td>
                             <td>10%</td>
                             <td>O</td>
                            </tr>
                            <tr>
                             <td>6</td>
                             <td colspan=2>Credit Ratio</td>
                             <td>77%</td>
                             <td>0%</td>
                             <td>O</td>
                            </tr>
                            <tr>
                             <td>7</td>
                             <td colspan=2>Market Share Credit Portion (MSCP)</td>
                             <td>33%</td>
                             <td>50%</td>
                             <td>X</td>
                            </tr>
                            <tr>
                             <td>8</td>
                             <td colspan=2>Trade In Ratio</td>
                             <td>0%</td>
                             <td>8%</td>
                             <td>&nbsp;</td>
                            </tr>
                            <tr>
                             <td rowspan=4>A.2. Advance Demand &amp; Supply
                             Management</td>
                             <td rowspan=4 >4</td>
                             <td rowspan=4>0%</td>
                             <td >9</td>
                             <td colspan=2 >AO Report
                             Establishment</td>
                             <td >-</td>
                             <td >-</td>
                             <td >0%</td>
                            </tr>
                            <tr>
                             <td>10</td>
                             <td colspan=2>Monthly SPK Achievement (vs Target Rundown)</td>
                             <td>-</td>
                             <td>-</td>
                             <td>&nbsp;</td>
                            </tr>
                            <tr>
                             <td>11</td>
                             <td colspan=2>Outstanding Matching to target Ratio (on AO25
                             Achievement)</td>
                             <td>-</td>
                             <td>0%</td>
                             <td>0%</td>
                            </tr>
                            <tr>
                             <td >12</td>
                             <td colspan=2>Monthly Sales Target Achievement (Target
                             Operation)</td>
                             <td >-</td>
                             <td >-</td>
                             <td >&nbsp;</td>
                            </tr>
                            <tr >
                             <td rowspan=6 >B. DELIVERY EXPLANATION</td>
                             <td >B.1.
                             Delivery Explaination (DEC) by Salesperson</td>
                             <td>17</td>
                             <td >0%</td>
                             <td rowspan=6>&nbsp;</td>
                             <td >13</td>
                             <td colspan=2>T-Intouch Activation Rate</td>
                             <td >0%</td>
                             <td >36%</td>
                             <td >&nbsp;</td>
                             <td rowspan=6 class=xl20921655 style='background:red;
                             mso-pattern:black none'>Low Implemented</td>
                             <td rowspan=6 ><textarea></textarea></td>
                             <td rowspan=6><textarea></textarea></td>
                            </tr>
                            <tr>
                             <td rowspan=5>B.2. Post
                             Delivery Follow Up (PDFU) by CRC</td>
                             <td rowspan=5 >3</td>
                             <td rowspan=5 >0%</td>
                             <td rowspan=3 >14</td>
                             <td rowspan=3 >Awareness
                             Rate:</td>
                             <td>a. Awareness Rate: T-Care</td>
                             <td>100%</td>
                             <td>100%</td>
                             <td rowspan=3>X</td>
                            </tr>
                            <tr>
                             <td>b. Awareness Rate: T-intouh</td>
                             <td>0%</td>
                             <td>100%</td>
                            </tr>
                            <tr>
                             <td>c. Awareness Rate: Insurance</td>
                             <td>0%</td>
                             <td>100%</td>
                            </tr>
                            <tr>
                             <td rowspan=2>15</td>
                             <td rowspan=2>Survey Customer Interest:</td>
                             <td>a. Survey Customer Interest: T-Care</td>
                             <td>0%</td>
                             <td>100%</td>
                             <td rowspan=2>&nbsp;</td>
                            </tr>
                            <tr>
                             <td>b. Survey Customer Interest: T-Intouch</td>
                             <td>0%</td>
                             <td>100%</td>
                            </tr>
                            <tr>
                             <td rowspan=22>C. PSP SERVICE
                             GR</td>
                             <td rowspan=15>&nbsp;</td>
                             <td rowspan=15>&nbsp;</td>
                             <td rowspan=15>&nbsp;</td>
                             <td rowspan=22>&nbsp;</td>
                             <td rowspan=2>16</td>
                             <td rowspan=2>Net Promoter
                             Score (NPS) Aftersales</td>
                             <td >a. Net
                             Promoter Score (NPS) Aftersales GR</td>
                             <td >100%</td>
                             <td >80%</td>
                             <td rowspan=2>O</td>
                             <td rowspan=22>Medium Implemented</td>
                             <td rowspan=22><textarea></textarea></td>
                             <td rowspan=22><textarea></textarea></td>
                            </tr>
                            <tr>
                             <td height=20>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                            </tr>
                            <tr>
                             <td rowspan=8 height=160 class=xl24021655 width=43 style='border-bottom:.5pt solid black;
                             height:120.0pt;width:32pt'>17</td>
                             <td rowspan=8 class=xl22621655 width=110 style='border-bottom:.5pt solid black;
                             width:83pt'>Gross Profit/Unit/Ratio (service, parts)</td>
                             <td class=xl8521655 width=278 style='border-left:none;width:209pt'>a. GP GR
                             Service per unit(mio)</td>
                             <td class=xl13421655 style='border-left:none'>-</td>
                             <td class=xl17621655 style='border-left:none'>-</td>
                             <td rowspan=8 class=xl22821655 style='border-bottom:.5pt solid black;
                             border-top:none;font-size:10.0pt;color:white;font-weight:400;text-decoration:
                             none;text-underline-style:none;text-line-through:none;font-family:"Segoe UI", sans-serif;
                             border-top:.5pt solid windowtext;border-right:.5pt solid windowtext;
                             border-bottom:none;border-left:.5pt solid windowtext;background:#00B050;
                             mso-pattern:black none'>O</td>
                            </tr>
                            <tr>
                             <td>b. GP GR Service Ratio</td>
                             <td>0 </td>
                             <td>25%</td>
                            </tr>
                            <tr>
                             <td>c. GP GR Parts per unit(mio)</td>
                             <td>-</td>
                             <td>-</td>
                            </tr>
                            <tr>
                             <td>d. GP GR Parts Ratio</td>
                             <td>0 </td>
                             <td>21%</td>
                            </tr>
                            <tr>
                             <td height=20 class=xl16321655 width=278 style='height:15.0pt;border-top:
                             none;border-left:none;width:209pt'>&nbsp;</td>
                             <td class=xl16521655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                            </tr>
                            <tr>
                             <td height=20 class=xl16321655 width=278 style='height:15.0pt;border-top:
                             none;border-left:none;width:209pt'>&nbsp;</td>
                             <td class=xl16521655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                            </tr>
                            <tr>
                             <td height=20 class=xl16321655 width=278 style='height:15.0pt;border-top:
                             none;border-left:none;width:209pt'>&nbsp;</td>
                             <td class=xl16521655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                            </tr>
                            <tr>
                             <td height=20 class=xl17521655 width=278 style='height:15.0pt;border-top:
                             none;border-left:none;width:209pt'>&nbsp;</td>
                             <td class=xl16821655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl16921655 style='border-top:none;border-left:none'>&nbsp;</td>
                            </tr>
                            <tr>
                             <td rowspan=4 height=99 class=xl24021655 width=43 style='border-bottom:.5pt solid black;
                             height:74.45pt;border-top:none;width:32pt'>18</td>
                             <td rowspan=4 class=xl22621655 width=110 style='border-bottom:.5pt solid black;
                             border-top:none;width:83pt'>Service Ratio (1st - 7th Service)</td>
                             <td class=xl8521655 width=278 style='border-top:none;border-left:none;
                             width:209pt'>a. 1st Service T-care Lite Rate (LCGC)</td>
                             <td class=xl13421655 style='border-top:none;border-left:none'>1 </td>
                             <td class=xl8121655 style='border-top:none;border-left:none'>75%</td>
                             <td rowspan=4 class=xl22821655 style='border-bottom:.5pt solid black;
                             border-top:none;font-size:10.0pt;color:white;font-weight:400;text-decoration:
                             none;text-underline-style:none;text-line-through:none;font-family:"Segoe UI", sans-serif;
                             border-top:.5pt solid windowtext;border-right:.5pt solid windowtext;
                             border-bottom:none;border-left:.5pt solid windowtext;background:#00B050;
                             mso-pattern:black none'>O</td>
                            </tr>
                            <tr>
                             <td>b. 1st Service T-care Rate (non LCGC)</td>
                             <td>1 </td>
                             <td>75%</td>
                            </tr>
                            <tr height=21 style='mso-height-source:userset;height:15.95pt'>
                             <td height=21 class=xl7721655 width=278 style='height:15.95pt;border-top:
                             none;border-left:none;width:209pt'>c. PM Rate T-Care Lite 2nd Service (LCGC)</td>
                             <td class=xl16621655 style='border-top:none;border-left:none'>-</td>
                             <td class=xl16721655 style='border-top:none;border-left:none'>-</td>
                            </tr>
                            <tr height=38 style='height:28.5pt'>
                             <td height=38 class=xl10621655 width=278 style='height:28.5pt;border-top:
                             none;border-left:none;width:209pt'>d. PM Rate T-Care 2nd-3rd Service (Non
                             LCGC)</td>
                             <td class=xl13721655 style='border-top:none;border-left:none'>1 </td>
                             <td class=xl8021655 style='border-top:none;border-left:none'>75%</td>
                            </tr>
                            <tr>
                             <td height=20 class=xl11821655 width=43 style='height:15.0pt;border-left:
                             none;width:32pt'>19</td>
                             <td colspan=2 class=xl24221655>Service Lead Time</td>
                             <td class=xl15121655 style='border-left:none'>0.10 </td>
                             <td class=xl13021655 style='border-left:none'>2.5 </td>
                             <td class=xl11921655 style='border-left:none;font-size:10.0pt;color:white;
                             font-weight:400;text-decoration:none;text-underline-style:none;text-line-through:
                             none;font-family:"Segoe UI", sans-serif;border-top:none;border-right:.5pt solid windowtext;
                             border-bottom:none;border-left:.5pt solid windowtext;background:#00B050;
                             mso-pattern:black none'>O</td>
                            </tr>
                            <tr>
                             <td height=20 class=xl9321655 width=217 style='height:15.0pt;width:163pt'>C.1.
                             Reminder Activity by MRA</td>
                             <td class=xl8421655 width=104 style='border-top:none;width:78pt'>6</td>
                             <td class=xl15421655 width=95 style='border-top:none;border-left:none;
                             width:71pt'>0%</td>
                             <td class=xl12021655 width=43 style='border-top:none;border-left:none;
                             width:32pt'>&nbsp;</td>
                             <td colspan=2 class=xl24321655 width=388 style='width:292pt'>&nbsp;</td>
                             <td class=xl10721655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl10721655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl12121655 style='border-left:none'>&nbsp;</td>
                            </tr>
                            <tr>
                             <td rowspan=4 height=80 class=xl23821655 width=217 style='height:60.0pt;
                             width:163pt'>C.2. Reception [R] And Delivery [D] Process</td>
                             <td rowspan=4 class=xl22221655 width=104 style='border-top:none;width:78pt'>26</td>
                             <td rowspan=4 class=xl29921655 width=95 style='border-top:none;width:71pt'>0%</td>
                             <td rowspan=3 class=xl11621655 width=43 style='border-bottom:.5pt solid black;
                             width:32pt'>20</td>
                             <td rowspan=3 class=xl22621655 width=110 style='border-bottom:.5pt solid black;
                             width:83pt'>Cross Selling ratio (include BP)</td>
                             <td class=xl8521655 width=278 style='border-left:none;width:209pt'>a. Battery</td>
                             <td class=xl8121655 style='border-left:none'>2300%</td>
                             <td class=xl8121655 style='border-left:none'>1700%</td>
                             <td rowspan=3 class=xl22821655 style='border-bottom:.5pt solid black;
                             font-size:10.0pt;color:white;font-weight:400;text-decoration:none;text-underline-style:
                             none;text-line-through:none;font-family:"Segoe UI", sans-serif;border-top:
                             .5pt solid windowtext;border-right:.5pt solid windowtext;border-bottom:none;
                             border-left:.5pt solid windowtext;background:red;mso-pattern:black none'>X</td>
                            </tr>
                            <tr>
                             <td>b. Car Care</td>
                             <td>0%</td>
                             <td>0%</td>
                            </tr>
                            <tr>
                             <td height=20 class=xl10621655 width=278 style='height:15.0pt;border-top:
                             none;border-left:none;width:209pt'>c. Tire</td>
                             <td class=xl8021655 style='border-top:none;border-left:none'>0%</td>
                             <td class=xl8021655 style='border-top:none;border-left:none'>300%</td>
                            </tr>
                            <tr>
                             <td height=20 class=xl12221655 width=43 style='height:15.0pt;width:32pt'>21</td>
                             <td colspan=2 class=xl23021655 style='border-left:none'>Up Selling ratio(TMO)</td>
                             <td class=xl7921655 style='border-left:none'>24%</td>
                             <td class=xl7921655 style='border-left:none'>0%</td>
                             <td class=xl7921655 style='border-left:none;font-size:10.0pt;color:white;
                             font-weight:400;text-decoration:none;text-underline-style:none;text-line-through:
                             none;font-family:"Segoe UI", sans-serif;border-top:none;border-right:.5pt solid windowtext;
                             border-bottom:.5pt dotted windowtext;border-left:.5pt solid windowtext;
                             background:#00B050;mso-pattern:black none'>O</td>
                            </tr>
                            <tr>
                             <td height=20 class=xl9321655 width=217 style='height:15.0pt;width:163pt'>C.3.
                             Production Process</td>
                             <td class=xl8421655 width=104 style='width:78pt'>7</td>
                             <td class=xl15421655 width=95 style='border-left:none;width:71pt'>0%</td>
                             <td class=xl12321655 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
                             <td colspan=2 class=xl24421655 width=388 style='border-left:none;width:292pt'>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td></td>
                             <td></td>
                            </tr>
                            <tr>
                             <td height=21 class=xl9421655 width=217 style='height:15.75pt;border-top:
                             none;width:163pt'>C.4. Post Service Follow Up (PSFU)</td>
                             <td class=xl8621655 width=104 style='border-left:none;width:78pt'>6</td>
                             <td class=xl15521655 width=95 style='border-left:none;width:71pt'>0%</td>
                             <td class=xl12421655 width=43 style='border-left:none;width:32pt'>&nbsp;</td>
                             <td colspan=2 class=xl24521655 width=388 style='border-left:none;width:292pt'>&nbsp;</td>
                             <td class=xl10021655 style='border-left:none'>&nbsp;</td>
                             <td class=xl10021655 style='border-left:none'>&nbsp;</td>
                             <td class=xl12521655 style='border-left:none'>&nbsp;</td>
                            </tr>
                            <tr>
                             <td rowspan=6 height=121 class=xl29321655 width=195 style='border-bottom:
                             1.0pt solid black;height:90.75pt;width:146pt'>D. PSP SERVICE BP</td>
                             <td class=xl15721655 width=217 style='border-left:none;width:163pt'>&nbsp;</td>
                             <td class=xl15921655 width=104 style='width:78pt'>&nbsp;</td>
                             <td class=xl16121655 width=95 style='border-left:none;width:71pt'>&nbsp;</td>
                             <td rowspan=6 class=xl29421655 width=132 style='border-bottom:1.0pt solid black;
                             width:99pt'>&nbsp;</td>
                             <td class=xl17421655 width=43 style='width:32pt'>&nbsp;</td>
                             <td colspan=2 class=xl29721655>&nbsp;</td>
                             <td class=xl12921655 style='border-left:none'>&nbsp;</td>
                             <td class=xl12921655 style='border-left:none'>&nbsp;</td>
                             <td class=xl12921655 style='border-left:none'>&nbsp;</td>
                             <td rowspan=6 class=xl29421655 width=129 style='border-bottom:1.0pt solid black;
                             width:97pt'>&nbsp;</td>
                             <td rowspan=6 class=xl27721655 width=178 style='border-bottom:1.0pt solid black;
                             width:134pt'><textarea></textarea></td>
                             <td rowspan=6 class=xl27721655 width=178 style='border-bottom:1.0pt solid black;
                             width:134pt'><textarea></textarea></td>
                            </tr>
                            <tr>
                             <td height=20 class=xl15821655 width=217 style='height:15.0pt;border-top:
                             none;border-left:none;width:163pt'>&nbsp;</td>
                             <td class=xl16021655 width=104 style='border-top:none;width:78pt'>&nbsp;</td>
                             <td class=xl16221655 width=95 style='border-top:none;border-left:none;
                             width:71pt'>&nbsp;</td>
                             <td class=xl12721655 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
                             <td colspan=2 class=xl24621655 width=388 style='width:292pt'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                            </tr>
                            <tr>
                             <td rowspan=3 height=60 class=xl15821655 width=217 style='height:45.0pt;
                             border-top:none;width:163pt'>&nbsp;</td>
                             <td rowspan=3 class=xl16021655 width=104 style='border-top:none;width:78pt'>&nbsp;</td>
                             <td rowspan=3 class=xl16221655 width=95 style='border-top:none;width:71pt'>&nbsp;</td>
                             <td rowspan=3 class=xl12721655 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
                             <td rowspan=3 class=xl24621655 width=110 style='border-top:none;width:83pt'>&nbsp;</td>
                             <td class=xl16321655 width=278 style='border-top:none;border-left:none;
                             width:209pt'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td rowspan=3 class=xl28621655 style='border-bottom:.5pt dotted black;
                             border-top:none'>&nbsp;</td>
                            </tr>
                            <tr>
                             <td height=20 class=xl16321655 width=278 style='height:15.0pt;border-top:
                             none;border-left:none;width:209pt'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                            </tr>
                            <tr>
                             <td height=20 class=xl16321655 width=278 style='height:15.0pt;border-top:
                             none;border-left:none;width:209pt'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                            </tr>
                            <tr>
                             <td height=21 class=xl17121655 width=217 style='height:15.75pt;border-top:
                             none;border-left:none;width:163pt'>&nbsp;</td>
                             <td class=xl17221655 width=104 style='border-top:none;width:78pt'>&nbsp;</td>
                             <td class=xl17321655 width=95 style='border-top:none;border-left:none;
                             width:71pt'>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td colspan=2 class=xl28921655>&nbsp;</td>
                             <td class=xl17021655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl17021655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl17021655 style='border-top:none;border-left:none'>&nbsp;</td>
                            </tr>
                            <tr height=27 style='mso-height-source:userset;height:20.45pt'>
                             <td rowspan=3 height=81 class=xl29021655 width=195 style='height:61.35pt;
                             width:146pt'>E. CUSTOMER DATABASE</td>
                             <td rowspan=2 class=xl9221655 width=217 style='border-top:none;width:163pt'>E.1.
                             Cleansing, Validity, &amp; Struktur Data</td>
                             <td rowspan=2 class=xl9021655 width=104 style='width:78pt'>6</td>
                             <td rowspan=2 class=xl15321655 width=95 style='width:71pt'>0%</td>
                             <td rowspan=3>&nbsp;</td>
                             <td class=xl10121655 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
                             <td colspan=2 class=xl26221655 width=388 style='width:292pt'>&nbsp;</td>
                             <td class=xl12921655 style='border-left:none'>&nbsp;</td>
                             <td class=xl12921655 style='border-left:none'>&nbsp;</td>
                             <td class=xl12921655 style='border-left:none'>&nbsp;</td>
                             <td rowspan=3 class=xl26321655 width=129 style='width:97pt'>&nbsp;</td>
                             <td rowspan=3 ><textarea></textarea></td>
                             <td rowspan=3><textarea></textarea></td>
                            </tr>
                            <tr height=27 style='mso-height-source:userset;height:20.45pt'>
                             <td height=27 class=xl12721655 width=43 style='height:20.45pt;border-top:
                             none;width:32pt'>&nbsp;</td>
                             <td colspan=2 class=xl16321655 width=388 style='width:292pt'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                             <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                            </tr>
                            <tr height=27 style='mso-height-source:userset;height:20.45pt'>
                             <td height=27 class=xl14121655 width=217 style='height:20.45pt;border-top:
                             none;border-left:none;width:163pt'>E.2. Database Utilization</td>
                             <td class=xl14221655 width=104 style='border-top:none;border-left:none;
                             width:78pt'>6</td>
                             <td class=xl15621655 width=95 style='border-top:none;border-left:none;
                             width:71pt'>0%</td>
                             <td class=xl12321655 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
                             <td colspan=2 class=xl16421655 width=388 style='border-left:none;width:292pt'>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                            </tr>
                            <tr>
                             <td rowspan=3>F. TRADE IN</td>
                             <td>F.1. Trade In
                             Capability</td>
                             <td>2</td>
                             <td >0%</td>
                             <td rowspan=3>&nbsp;</td>
                             <td >&nbsp;</td>
                             <td colspan=2>Trade In Ratio</td>
                             <td>0%</td>
                             <td>8%</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td rowspan=3><textarea></textarea></td>
                             <td rowspan=3><textarea></textarea></td>
                            </tr>
                            <tr>
                             <td >F.2. Trade In Operation</td>
                             <td>3</td>
                             <td >0%</td>
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
                             <td>0%</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                            </tr>
                            <tr>
                             <td rowspan=5>G. MANPOWER</td>
                             <td rowspan=4>G.1. Manpower Productivity</td>
                             <td rowspan=4>3</td>
                             <td rowspan=4>0%</td>
                             <td rowspan=5>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td colspan=2>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td rowspan=5>Low
                             Implemented</td>
                             <td rowspan=5><textarea></textarea></td>
                             <td rowspan=5><textarea></textarea></td>
                            </tr>
                            <tr>
                             <td>22</td>
                             <td colspan=2>Salesperson Turn Over Ratio</td>
                             <td>0%</td>
                             <td>0%</td>
                             <td>&nbsp;</td>
                            </tr>
                            <tr>
                             <td rowspan=2>23</td>
                             <td rowspan=2>Staff Productivity</td>
                             <td>a. Sales (Unit/salesperson)</td>
                             <td>-</td>
                             <td>2.5 </td>
                             <td rowspan=2>X</td>
                            </tr>
                            <tr>
                             <td>b. Aftersales (Overall productivity)</td>
                             <td>98%</td>
                             <td>96%</td>
                            </tr>
                            <tr>
                             <td>G.2. Training Manpower Activity</td>
                             <td>3</td>
                             <td>0%</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                            </tr>
                            <tr>
                             <td colspan=4>Final Grade</td>
                             <td>&nbsp;</td>
                             <td colspan=6>Final Grade</td>
                             <td>Low Implemented</td>
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
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Apakah anda yakin ingin menghapus data ini ?</h4>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@stop


@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>
    textarea {
        display: block;
        border: 1px solid #000;
        /*position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;*/
        height: 100%;
        resize: vertical;
        min-width: 100px;
        min-height: 600px;
    },table, th, td {
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
