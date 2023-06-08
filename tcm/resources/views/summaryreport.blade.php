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
                <span id="form_result_save"></span>
                    <div align="right">
                        <!-- <button type="button" name="create_barang" id="create_barang" class="btn btn-info btn-sm">Tambah Nama Barang</button> -->
                        {{-- <a href='formkpi/create' name="create_record" id="create_record" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</a> --}}
                    </div>
                    <br><table border=0 cellpadding=0 cellspacing=0 width=1946 style='border-collapse:
                    collapse;table-layout:fixed;width:1462pt'>
                    <tr class=xl13921655 height=21 style='mso-height-source:userset;height:15.95pt'>
                     <td rowspan=3 height=62 class=xl17721655 width=195 style='height:46.7pt;
                     width:146pt'>Activity TCM</td>
                     <td colspan=4 class=xl18021655 width=548 style='border-right:1.0pt solid black;
                     width:411pt'>Checksheet TCM</td>
                     <td colspan=7 class=xl18321655 width=847 style='border-right:1.0pt solid black;
                     border-left:none;width:637pt'>Parameter Result</td>
                     <td rowspan=3 class=xl18221655 width=178 style='border-bottom:1.0pt solid black;
                     width:134pt'>Issue</td>
                     <td rowspan=3 class=xl17721655 width=178 style='border-bottom:1.0pt solid black;
                     width:134pt'>Action Plan</td>
                    </tr>
                    <tr class=xl13921655 height=20 style='height:15.0pt'>
                     <td rowspan=2 height=41 class=xl30521655 width=217 style='height:30.75pt;
                     border-top:none;width:163pt'>Item to be Genba</td>
                     <td colspan=3 class=xl30721655 style='border-right:1.0pt solid black'>Mar</td>
                     <td colspan=3 rowspan=2 class=xl18621655 width=431 style='border-right:.5pt solid black;
                     border-bottom:1.0pt solid black;width:324pt'>&nbsp;</td>
                     <td colspan=4 class=xl27521655 style='border-right:1.0pt solid black'>Mar</td>
                    </tr>
                    <tr class=xl13921655 height=21 style='height:15.75pt'>
                     <td height=21 class=xl7421655 width=104 style='height:15.75pt;width:78pt'>Item
                     Check</td>
                     <td class=xl9821655 width=95 style='border-left:none;width:71pt'>Done</td>
                     <td class=xl7521655 width=132 style='border-top:none;width:99pt'>Category</td>
                     <td class=xl11221655 width=78 style='border-top:none;border-left:none;
                     width:59pt'>Actual</td>
                     <td class=xl11321655 width=116 style='border-top:none;border-left:none;
                     width:87pt'>Target</td>
                     <td class=xl11221655 width=93 style='border-top:none;border-left:none;
                     width:70pt'>Evaluation</td>
                     <td class=xl11421655 width=129 style='border-top:none;border-left:none;
                     width:97pt'>Category</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td rowspan=18 height=361 class=xl30021655 width=195 style='border-bottom:
                     1.0pt solid black;height:270.75pt;width:146pt'>A. PSP SALES</td>
                     <td rowspan=8 class=xl19221655 width=217 style='border-bottom:.5pt solid black;
                     width:163pt'>&nbsp;</td>
                     <td rowspan=8 class=xl19521655 width=104 style='border-bottom:.5pt solid black;
                     width:78pt'>&nbsp;</td>
                     <td rowspan=8 class=xl19821655 width=95 style='border-bottom:.5pt solid black;
                     width:71pt'>&nbsp;</td>
                     <td rowspan=18 class=xl20921655 width=132 style='border-bottom:1.0pt solid black;
                     width:99pt'>&nbsp;</td>
                     <td class=xl12621655 width=43 style='border-top:none;width:32pt'>1</td>
                     <td colspan=2 class=xl20121655>Net Promoter Score (NPS) Sales</td>
                     <td class=xl7621655 style='border-left:none'>94%</td>
                     <td class=xl7621655 style='border-left:none'>80%</td>
                     <td class=xl7821655 style='border-left:none;font-size:10.0pt;color:white;
                     font-weight:400;text-decoration:none;text-underline-style:none;text-line-through:
                     none;font-family:"Segoe UI", sans-serif;border-top:.5pt dotted windowtext;
                     border-right:.5pt solid windowtext;border-bottom:.5pt dotted windowtext;
                     border-left:.5pt solid windowtext;background:#00B050;mso-pattern:black none'>O</td>
                     <td rowspan=18 class=xl20921655 width=129 style='border-bottom:1.0pt solid black;
                     width:97pt;font-size:10.0pt;color:white;font-weight:400;text-decoration:none;
                     text-underline-style:none;text-line-through:none;font-family:"Segoe UI", sans-serif;
                     border-top:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
                     border-bottom:none;border-left:.5pt solid windowtext;background:red;
                     mso-pattern:black none'>Low Implemented</td>
                     <td rowspan=18 class=xl25521655 width=178 style='border-bottom:1.0pt solid black;
                     width:134pt'>&nbsp;</td>
                     <td rowspan=18 class=xl25521655 width=178 style='border-bottom:1.0pt solid black;
                     width:134pt'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td rowspan=7 height=140 class=xl21221655 width=43 style='height:105.0pt;
                     border-top:none;width:32pt'>2</td>
                     <td rowspan=7 class=xl21321655 dir=LTR width=110 style='border-top:none;
                     width:83pt'>Gross Profit/Unit/Ratio (vehicle/TCO/F&amp;I Commission)</td>
                     <td class=xl7721655 dir=LTR width=278 style='border-top:none;border-left:
                     none;width:209pt'>a. GP Total Sales (per unit)(mio)</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td rowspan=7 class=xl21421655 style='border-bottom:.5pt dotted black;
                     border-top:none'>&nbsp;</td
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 dir=LTR width=278 style='height:15.0pt;
                     border-top:none;border-left:none;width:209pt'>b. GP Total Sales Ratio</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 dir=LTR width=278 style='height:15.0pt;
                     border-top:none;border-left:none;width:209pt'>c. GP Vehicle (per unit)(mio)</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 dir=LTR width=278 style='height:15.0pt;
                     border-top:none;border-left:none;width:209pt'>d. GP Vehicle Ratio</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 dir=LTR width=278 style='height:15.0pt;
                     border-top:none;border-left:none;width:209pt'>e. GP TCO (per unit)(mio)</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 dir=LTR width=278 style='height:15.0pt;
                     border-top:none;border-left:none;width:209pt'>f. GP TCO Ratio</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>10%</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 dir=LTR width=278 style='height:15.0pt;
                     border-top:none;border-left:none;width:209pt'>g. F&amp;I Commision (per
                     unit)(mio)</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td rowspan=6 height=120 class=xl20421655 width=217 style='border-bottom:
                     .5pt solid black;height:90.0pt;width:163pt'>A.1. Sales Person Offering
                     Process</td>
                     <td rowspan=6 class=xl20621655 width=104 style='border-bottom:.5pt solid black;
                     border-top:none;width:78pt'>16</td>
                     <td rowspan=6 class=xl30421655 width=95 style='border-bottom:.5pt solid black;
                     border-top:none;width:71pt'>0%</td>
                     <td class=xl10221655 width=43 style='border-top:none;width:32pt'>3</td>
                     <td colspan=2 class=xl20221655>M-Quote utilization ratio</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>72%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>50%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none;font-size:10.0pt;
                     color:white;font-weight:400;text-decoration:none;text-underline-style:none;
                     text-line-through:none;font-family:"Segoe UI", sans-serif;border-top:.5pt dotted windowtext;
                     border-right:.5pt solid windowtext;border-bottom:.5pt dotted windowtext;
                     border-left:.5pt solid windowtext;background:#00B050;mso-pattern:black none'>O</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl10221655 width=43 style='height:15.0pt;border-top:none;
                     width:32pt'>4</td>
                     <td colspan=2 class=xl20221655>TCO Installation Ratio</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>40%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none;font-size:10.0pt;
                     color:white;font-weight:400;text-decoration:none;text-underline-style:none;
                     text-line-through:none;font-family:"Segoe UI", sans-serif;border-top:.5pt dotted windowtext;
                     border-right:.5pt solid windowtext;border-bottom:.5pt dotted windowtext;
                     border-left:.5pt solid windowtext;background:red;mso-pattern:black none'>X</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl10221655 width=43 style='height:15.0pt;border-top:none;
                     width:32pt'>5</td>
                     <td colspan=2 class=xl20221655>Toyota Insurance Share</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>12%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>10%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none;font-size:10.0pt;
                     color:white;font-weight:400;text-decoration:none;text-underline-style:none;
                     text-line-through:none;font-family:"Segoe UI", sans-serif;border-top:.5pt dotted windowtext;
                     border-right:.5pt solid windowtext;border-bottom:.5pt dotted windowtext;
                     border-left:.5pt solid windowtext;background:#00B050;mso-pattern:black none'>O</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl10221655 width=43 style='height:15.0pt;border-top:none;
                     width:32pt'>6</td>
                     <td colspan=2 class=xl20221655>Credit Ratio</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>77%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>0%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none;font-size:10.0pt;
                     color:white;font-weight:400;text-decoration:none;text-underline-style:none;
                     text-line-through:none;font-family:"Segoe UI", sans-serif;border-top:.5pt dotted windowtext;
                     border-right:.5pt solid windowtext;border-bottom:.5pt dotted windowtext;
                     border-left:.5pt solid windowtext;background:#00B050;mso-pattern:black none'>O</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl10221655 width=43 style='height:15.0pt;border-top:none;
                     width:32pt'>7</td>
                     <td colspan=2 class=xl20221655>Market Share Credit Portion (MSCP)</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>33%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>50%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none;font-size:10.0pt;
                     color:white;font-weight:400;text-decoration:none;text-underline-style:none;
                     text-line-through:none;font-family:"Segoe UI", sans-serif;border-top:.5pt dotted windowtext;
                     border-right:.5pt solid windowtext;border-bottom:.5pt dotted windowtext;
                     border-left:.5pt solid windowtext;background:red;mso-pattern:black none'>X</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl11521655 width=43 style='height:15.0pt;border-top:none;
                     width:32pt'>8</td>
                     <td colspan=2 class=xl20321655 style='border-left:none'>Trade In Ratio</td>
                     <td class=xl10421655 style='border-top:none;border-left:none'>0%</td>
                     <td class=xl10421655 style='border-top:none;border-left:none'>8%</td>
                     <td class=xl10421655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td rowspan=4 height=81 class=xl20421655 width=217 style='border-bottom:1.0pt solid black;
                     height:60.75pt;border-top:none;width:163pt'>A.2. Advance Demand &amp; Supply
                     Management</td>
                     <td rowspan=4 class=xl20621655 width=104 style='border-bottom:1.0pt solid black;
                     border-top:none;width:78pt'>4</td>
                     <td rowspan=4 class=xl30421655 width=95 style='border-bottom:1.0pt solid black;
                     border-top:none;width:71pt'>0%</td>
                     <td class=xl11621655 width=43 style='width:32pt'>9</td>
                     <td colspan=2 class=xl20721655 style='border-left:none'>AO Report
                     Establishment</td>
                     <td class=xl13421655 style='border-left:none'>-</td>
                     <td class=xl13421655 style='border-left:none'>-</td>
                     <td class=xl8121655 style='border-left:none'>0%</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl10221655 width=43 style='height:15.0pt;border-top:none;
                     width:32pt'>10</td>
                     <td colspan=2 class=xl20221655>Monthly SPK Achievement (vs Target Rundown)</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl10221655 width=43 style='height:15.0pt;border-top:none;
                     width:32pt'>11</td>
                     <td colspan=2 class=xl20221655>Outstanding Matching to target Ratio (on AO25
                     Achievement)</td>
                     <td class=xl13521655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>0%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>0%</td>
                    </tr>
                    <tr height=21 style='height:15.75pt'>
                     <td height=21 class=xl11721655 width=43 style='height:15.75pt;border-top:
                     none;width:32pt'>12</td>
                     <td colspan=2 class=xl20821655>Monthly Sales Target Achievement (Target
                     Operation)</td>
                     <td class=xl13621655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl13621655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl8221655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=21 style='mso-height-source:userset;height:15.95pt'>
                     <td rowspan=6 height=122 class=xl29021655 width=195 style='border-bottom:
                     1.0pt solid black;height:91.7pt;width:146pt'>B. DELIVERY EXPLANATION</td>
                     <td class=xl9221655 width=217 style='border-top:none;width:163pt'>B.1.
                     Delivery Explaination (DEC) by Salesperson</td>
                     <td class=xl9021655 width=104 style='border-left:none;width:78pt'>17</td>
                     <td class=xl15321655 width=95 style='border-left:none;width:71pt'>0%</td>
                     <td rowspan=6 class=xl20921655 width=132 style='border-bottom:1.0pt solid black;
                     width:99pt'>&nbsp;</td>
                     <td class=xl10221655 width=43 style='width:32pt'>13</td>
                     <td colspan=2 class=xl20221655>T-Intouch Activation Rate</td>
                     <td class=xl7821655 style='border-left:none'>0%</td>
                     <td class=xl7821655 style='border-left:none'>36%</td>
                     <td class=xl7821655 style='border-left:none'>&nbsp;</td>
                     <td rowspan=6 class=xl20921655 width=129 style='border-bottom:1.0pt solid black;
                     width:97pt;font-size:10.0pt;color:white;font-weight:400;text-decoration:none;
                     text-underline-style:none;text-line-through:none;font-family:"Segoe UI", sans-serif;
                     border-top:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
                     border-bottom:none;border-left:.5pt solid windowtext;background:red;
                     mso-pattern:black none'>Low Implemented</td>
                     <td rowspan=6 class=xl26521655 width=178 style='border-bottom:1.0pt solid black;
                     width:134pt'>&nbsp;</td>
                     <td rowspan=6 class=xl26821655 width=178 style='border-bottom:1.0pt solid black;
                     border-top:none;width:134pt'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td rowspan=5 height=101 class=xl11021655 width=217 style='border-bottom:
                     1.0pt solid black;height:75.75pt;border-top:none;width:163pt'>B.2. Post
                     Delivery Follow Up (PDFU) by CRC</td>
                     <td rowspan=5 class=xl8721655 width=104 style='border-bottom:1.0pt solid black;
                     border-top:none;width:78pt'>3</td>
                     <td rowspan=5 class=xl13121655 width=95 style='border-bottom:1.0pt solid black;
                     border-top:none;width:71pt'>0%</td>
                     <td rowspan=3 class=xl10221655 width=43 style='border-top:none;width:32pt'>14</td>
                     <td rowspan=3 class=xl21321655 width=110 style='border-top:none;width:83pt'>Awareness
                     Rate:</td>
                     <td class=xl7721655 width=278 style='border-top:none;border-left:none;
                     width:209pt'>a. Awareness Rate: T-Care</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>100%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>100%</td>
                     <td rowspan=3 class=xl21421655 style='border-bottom:.5pt dotted black;
                     border-top:none;font-size:10.0pt;color:white;font-weight:400;text-decoration:
                     none;text-underline-style:none;text-line-through:none;font-family:"Segoe UI", sans-serif;
                     border-top:.5pt dotted windowtext;border-right:.5pt solid windowtext;
                     border-bottom:none;border-left:.5pt solid windowtext;background:red;
                     mso-pattern:black none'>X</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 width=278 style='height:15.0pt;border-top:none;
                     border-left:none;width:209pt'>b. Awareness Rate: T-intouh</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>0%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>100%</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 width=278 style='height:15.0pt;border-top:none;
                     border-left:none;width:209pt'>c. Awareness Rate: Insurance</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>0%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>100%</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td rowspan=2 height=41 class=xl10221655 width=43 style='border-bottom:1.0pt solid black;
                     height:30.75pt;border-top:none;width:32pt'>15</td>
                     <td rowspan=2 class=xl21321655 width=110 style='border-bottom:1.0pt solid black;
                     border-top:none;width:83pt'>Survey Customer Interest:</td>
                     <td class=xl7721655 width=278 style='border-top:none;border-left:none;
                     width:209pt'>a. Survey Customer Interest: T-Care</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>0%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>100%</td>
                     <td rowspan=2 class=xl21421655 style='border-bottom:1.0pt solid black;
                     border-top:none'>&nbsp;</td>
                    </tr>
                    <tr height=21 style='height:15.75pt'>
                     <td height=21 class=xl8321655 width=278 style='height:15.75pt;border-top:
                     none;border-left:none;width:209pt'>b. Survey Customer Interest: T-Intouch</td>
                     <td class=xl8221655 style='border-top:none;border-left:none'>0%</td>
                     <td class=xl8221655 style='border-top:none;border-left:none'>100%</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td rowspan=22 height=460 class=xl30021655 width=195 style='border-bottom:
                     1.0pt solid black;height:345.2pt;border-top:none;width:146pt'>C. PSP SERVICE
                     GR</td>
                     <td rowspan=15 class=xl15721655 width=217 style='border-bottom:.5pt solid black;
                     width:163pt'>&nbsp;</td>
                     <td rowspan=15 class=xl15921655 width=104 style='border-bottom:.5pt solid black;
                     width:78pt'>&nbsp;</td>
                     <td rowspan=15 class=xl16121655 width=95 style='border-bottom:.5pt solid black;
                     width:71pt'>&nbsp;</td>
                     <td rowspan=22 class=xl20921655 width=132 style='border-bottom:1.0pt solid black;
                     width:99pt'>&nbsp;</td>
                     <td rowspan=2 class=xl12621655 width=43 style='border-top:none;width:32pt'>16</td>
                     <td rowspan=2 class=xl23521655 width=110 style='width:83pt'>Net Promoter
                     Score (NPS) Aftersales</td>
                     <td class=xl9621655 width=278 style='border-left:none;width:209pt'>a. Net
                     Promoter Score (NPS) Aftersales GR</td>
                     <td class=xl7621655 style='border-left:none'>100%</td>
                     <td class=xl7621655 style='border-left:none'>80%</td>
                     <td rowspan=2 class=xl23721655 style='border-bottom:.5pt solid black;
                     font-size:10.0pt;color:white;font-weight:400;text-decoration:none;text-underline-style:
                     none;text-line-through:none;font-family:"Segoe UI", sans-serif;border-top:
                     1.0pt solid windowtext;border-right:.5pt solid windowtext;border-bottom:none;
                     border-left:.5pt solid windowtext;background:#00B050;mso-pattern:black none'>O</td>
                     <td rowspan=22 class=xl20921655 width=129 style='border-bottom:1.0pt solid black;
                     width:97pt;font-size:10.0pt;color:black;font-weight:400;text-decoration:none;
                     text-underline-style:none;text-line-through:none;font-family:"Segoe UI", sans-serif;
                     border-top:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
                     border-bottom:none;border-left:.5pt solid windowtext;background:yellow;
                     mso-pattern:black none'>Medium Implemented</td>
                     <td rowspan=22 class=xl25521655 width=178 style='border-bottom:1.0pt solid black;
                     border-top:none;width:134pt'>&nbsp;</td>
                     <td rowspan=22 class=xl25521655 width=178 style='border-bottom:1.0pt solid black;
                     border-top:none;width:134pt'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl16421655 width=278 style='height:15.0pt;border-top:
                     none;border-left:none;width:209pt'>&nbsp;</td>
                     <td class=xl10921655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl10921655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
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
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 width=278 style='height:15.0pt;border-top:none;
                     border-left:none;width:209pt'>b. GP GR Service Ratio</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>0 </td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>25%</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 width=278 style='height:15.0pt;border-top:none;
                     border-left:none;width:209pt'>c. GP GR Parts per unit(mio)</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl13521655 style='border-top:none;border-left:none'>-</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 width=278 style='height:15.0pt;border-top:none;
                     border-left:none;width:209pt'>d. GP GR Parts Ratio</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>0 </td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>21%</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl16321655 width=278 style='height:15.0pt;border-top:
                     none;border-left:none;width:209pt'>&nbsp;</td>
                     <td class=xl16521655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl16321655 width=278 style='height:15.0pt;border-top:
                     none;border-left:none;width:209pt'>&nbsp;</td>
                     <td class=xl16521655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl16321655 width=278 style='height:15.0pt;border-top:
                     none;border-left:none;width:209pt'>&nbsp;</td>
                     <td class=xl16521655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl17521655 width=278 style='height:15.0pt;border-top:
                     none;border-left:none;width:209pt'>&nbsp;</td>
                     <td class=xl16821655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl16921655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
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
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 width=278 style='height:15.0pt;border-top:none;
                     border-left:none;width:209pt'>b. 1st Service T-care Rate (non LCGC)</td>
                     <td class=xl11121655 style='border-top:none;border-left:none'>1 </td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>75%</td>
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
                    <tr height=20 style='height:15.0pt'>
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
                    <tr height=20 style='height:15.0pt'>
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
                    <tr height=20 style='height:15.0pt'>
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
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 width=278 style='height:15.0pt;border-top:none;
                     border-left:none;width:209pt'>b. Car Care</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>0%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>0%</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl10621655 width=278 style='height:15.0pt;border-top:
                     none;border-left:none;width:209pt'>c. Tire</td>
                     <td class=xl8021655 style='border-top:none;border-left:none'>0%</td>
                     <td class=xl8021655 style='border-top:none;border-left:none'>300%</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
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
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl9321655 width=217 style='height:15.0pt;width:163pt'>C.3.
                     Production Process</td>
                     <td class=xl8421655 width=104 style='width:78pt'>7</td>
                     <td class=xl15421655 width=95 style='border-left:none;width:71pt'>0%</td>
                     <td class=xl12321655 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
                     <td colspan=2 class=xl24421655 width=388 style='border-left:none;width:292pt'>&nbsp;</td>
                     <td class=xl10921655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl10921655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl12121655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=21 style='height:15.75pt'>
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
                    <tr height=20 style='height:15.0pt'>
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
                     width:134pt'>&nbsp;</td>
                     <td rowspan=6 class=xl27721655 width=178 style='border-bottom:1.0pt solid black;
                     width:134pt'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
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
                    <tr height=20 style='height:15.0pt'>
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
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl16321655 width=278 style='height:15.0pt;border-top:
                     none;border-left:none;width:209pt'>&nbsp;</td>
                     <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl16321655 width=278 style='height:15.0pt;border-top:
                     none;border-left:none;width:209pt'>&nbsp;</td>
                     <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl10321655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=21 style='height:15.75pt'>
                     <td height=21 class=xl17121655 width=217 style='height:15.75pt;border-top:
                     none;border-left:none;width:163pt'>&nbsp;</td>
                     <td class=xl17221655 width=104 style='border-top:none;width:78pt'>&nbsp;</td>
                     <td class=xl17321655 width=95 style='border-top:none;border-left:none;
                     width:71pt'>&nbsp;</td>
                     <td class=xl10821655 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
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
                     <td rowspan=3 class=xl20921655 width=132 style='border-bottom:1.0pt solid black;
                     width:99pt'>&nbsp;</td>
                     <td class=xl10121655 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
                     <td colspan=2 class=xl26221655 width=388 style='width:292pt'>&nbsp;</td>
                     <td class=xl12921655 style='border-left:none'>&nbsp;</td>
                     <td class=xl12921655 style='border-left:none'>&nbsp;</td>
                     <td class=xl12921655 style='border-left:none'>&nbsp;</td>
                     <td rowspan=3 class=xl26321655 width=129 style='width:97pt'>&nbsp;</td>
                     <td rowspan=3 class=xl26521655 width=178 style='border-bottom:1.0pt solid black;
                     width:134pt'>&nbsp;</td>
                     <td rowspan=3 class=xl26821655 width=178 style='border-bottom:1.0pt solid black;
                     border-top:none;width:134pt'>&nbsp;</td>
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
                     <td class=xl10921655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl10921655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl10921655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td rowspan=3 height=61 class=xl29021655 width=195 style='border-bottom:1.0pt solid black;
                     height:45.75pt;width:146pt'>F. TRADE IN</td>
                     <td class=xl9221655 width=217 style='width:163pt'>F.1. Trade In
                     Capability</td>
                     <td class=xl9021655 width=104 style='border-left:none;width:78pt'>2</td>
                     <td class=xl15321655 width=95 style='border-left:none;width:71pt'>0%</td>
                     <td rowspan=3 class=xl20921655 width=132 style='border-bottom:1.0pt solid black;
                     width:99pt'>&nbsp;</td>
                     <td class=xl10121655 width=43 style='width:32pt'>&nbsp;</td>
                     <td colspan=2 class=xl9621655 width=388 style='width:292pt'>Trade In Ratio</td>
                     <td class=xl14521655 style='border-left:none'>0%</td>
                     <td class=xl14521655 style='border-left:none'>8%</td>
                     <td class=xl14521655 style='border-left:none'>&nbsp;</td>
                     <td class=xl14621655 width=129 style='border-left:none;width:97pt'>&nbsp;</td>
                     <td rowspan=3 class=xl25921655 width=178 style='border-bottom:1.0pt solid black;
                     border-top:none;width:134pt'>&nbsp;</td>
                     <td rowspan=3 class=xl25921655 width=178 style='border-bottom:1.0pt solid black;
                     border-top:none;width:134pt'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl11021655 width=217 style='height:15.0pt;border-top:
                     none;width:163pt'>F.2. Trade In Operation</td>
                     <td class=xl8721655 width=104 style='border-top:none;border-left:none;
                     width:78pt'>3</td>
                     <td class=xl13121655 width=95 style='border-top:none;border-left:none;
                     width:71pt'>0%</td>
                     <td class=xl13321655 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
                     <td class=xl14321655 width=110 style='border-top:none;width:83pt'>&nbsp;</td>
                     <td class=xl14321655 width=278 style='border-top:none;border-left:none;
                     width:209pt'>&nbsp;</td>
                     <td class=xl14421655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl14421655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl14421655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl14721655 width=129 style='border-top:none;border-left:none;
                     width:97pt'>&nbsp;</td>
                    </tr>
                    <tr height=21 style='height:15.75pt'>
                     <td height=21 class=xl9921655 width=217 style='height:15.75pt;border-top:
                     none;width:163pt'>F.3. Trade In Facility</td>
                     <td class=xl8821655 width=104 style='border-top:none;border-left:none;
                     width:78pt'>2</td>
                     <td class=xl13221655 width=95 style='border-top:none;border-left:none;
                     width:71pt'>0%</td>
                     <td class=xl14821655 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
                     <td class=xl9121655 width=110 style='border-top:none;width:83pt'>&nbsp;</td>
                     <td class=xl9121655 width=278 style='border-top:none;border-left:none;
                     width:209pt'>&nbsp;</td>
                     <td class=xl14921655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl14921655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl14921655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl15021655 width=129 style='border-top:none;border-left:none;
                     width:97pt'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td rowspan=5 height=101 class=xl28021655 width=195 style='border-bottom:
                     1.0pt solid black;height:75.75pt;width:146pt'>G. MANPOWER</td>
                     <td rowspan=4 class=xl24721655 width=217 style='border-bottom:.5pt dotted black;
                     width:163pt'>G.1. Manpower Productivity</td>
                     <td rowspan=4 class=xl24921655 width=104 style='border-bottom:.5pt dotted black;
                     width:78pt'>3</td>
                     <td rowspan=4 class=xl28421655 width=95 style='border-bottom:.5pt dotted black;
                     width:71pt'>0%</td>
                     <td rowspan=5 class=xl20921655 width=132 style='border-bottom:1.0pt solid black;
                     width:99pt'>&nbsp;</td>
                     <td class=xl12821655 width=43 style='width:32pt'>&nbsp;</td>
                     <td colspan=2 class=xl25121655 width=388 style='border-left:none;width:292pt'>&nbsp;</td>
                     <td class=xl10521655 style='border-left:none'>&nbsp;</td>
                     <td class=xl10521655 style='border-left:none'>&nbsp;</td>
                     <td class=xl10521655 style='border-left:none'>&nbsp;</td>
                     <td rowspan=5 class=xl21021655 width=129 style='border-bottom:1.0pt solid black;
                     width:97pt;font-size:10.0pt;color:white;font-weight:400;text-decoration:none;
                     text-underline-style:none;text-line-through:none;font-family:"Segoe UI", sans-serif;
                     border-top:none;border-right:1.0pt solid windowtext;border-bottom:none;
                     border-left:.5pt solid windowtext;background:red;mso-pattern:black none'>Low
                     Implemented</td>
                     <td rowspan=5 class=xl25521655 width=178 style='border-bottom:1.0pt solid black;
                     border-top:none;width:134pt'>&nbsp;</td>
                     <td rowspan=5 class=xl25521655 width=178 style='border-bottom:1.0pt solid black;
                     border-top:none;width:134pt'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl10221655 width=43 style='height:15.0pt;border-top:none;
                     width:32pt'>22</td>
                     <td colspan=2 class=xl20221655>Salesperson Turn Over Ratio</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>0%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>0%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td rowspan=2 height=40 class=xl10221655 width=43 style='height:30.0pt;
                     border-top:none;width:32pt'>23</td>
                     <td rowspan=2 class=xl7721655 width=110 style='border-top:none;width:83pt'>Staff
                     Productivity</td>
                     <td class=xl7721655 width=278 style='border-top:none;border-left:none;
                     width:209pt'>a. Sales (Unit/salesperson)</td>
                     <td class=xl13521655 style='border-top:none;border-left:none'>-</td>
                     <td class=xl15221655 style='border-top:none;border-left:none'>2.5 </td>
                     <td rowspan=2 class=xl21421655 style='border-bottom:.5pt dotted black;
                     border-top:none;font-size:10.0pt;color:white;font-weight:400;text-decoration:
                     none;text-underline-style:none;text-line-through:none;font-family:"Segoe UI", sans-serif;
                     border-top:.5pt dotted windowtext;border-right:.5pt solid windowtext;
                     border-bottom:none;border-left:.5pt solid windowtext;background:red;
                     mso-pattern:black none'>X</td>
                    </tr>
                    <tr height=20 style='height:15.0pt'>
                     <td height=20 class=xl7721655 width=278 style='height:15.0pt;border-top:none;
                     border-left:none;width:209pt'>b. Aftersales (Overall productivity)</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>98%</td>
                     <td class=xl7821655 style='border-top:none;border-left:none'>96%</td>
                    </tr>
                    <tr height=21 style='height:15.75pt'>
                     <td height=21 class=xl9521655 width=217 style='height:15.75pt;border-top:
                     none;border-left:none;width:163pt'>G.2. Training Manpower Activity</td>
                     <td class=xl8821655 width=104 style='border-top:none;width:78pt'>3</td>
                     <td class=xl13221655 width=95 style='border-top:none;border-left:none;
                     width:71pt'>0%</td>
                     <td class=xl10821655 width=43 style='border-top:none;width:32pt'>&nbsp;</td>
                     <td class=xl9121655 width=110 style='border-top:none;width:83pt'>&nbsp;</td>
                     <td class=xl9121655 width=278 style='border-top:none;border-left:none;
                     width:209pt'>&nbsp;</td>
                     <td class=xl8921655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl8921655 style='border-top:none;border-left:none'>&nbsp;</td>
                     <td class=xl8921655 style='border-top:none;border-left:none'>&nbsp;</td>
                    </tr>
                    <tr class=xl14021655 height=46 style='mso-height-source:userset;height:35.1pt'>
                     <td colspan=4 height=46 class=xl25221655 width=611 style='border-right:1.0pt solid black;
                     height:35.1pt;width:458pt'>Final Grade</td>
                     <td class=xl13821655 width=132 style='border-left:none;width:99pt'>&nbsp;</td>
                     <td colspan=6 class=xl25221655 width=718 style='border-right:1.0pt solid black;
                     border-left:none;width:540pt'>Final Grade</td>
                     <td class=xl13821655 width=129 style='border-left:none;width:97pt;font-size:
                     10.0pt;color:white;font-weight:700;text-decoration:none;text-underline-style:
                     none;text-line-through:none;font-family:"Segoe UI", sans-serif;border:1.0pt solid windowtext;
                     background:red;mso-pattern:black none'>Low Implemented</td>
                     <td class=xl14021655></td>
                     <td class=xl14021655></td>
                    </tr>
                    <![if supportMisalignedColumns]>
                    <tr height=0 style='display:none'>
                     <td width=195 style='width:146pt'></td>
                     <td width=217 style='width:163pt'></td>
                     <td width=104 style='width:78pt'></td>
                     <td width=95 style='width:71pt'></td>
                     <td width=132 style='width:99pt'></td>
                     <td width=43 style='width:32pt'></td>
                     <td width=110 style='width:83pt'></td>
                     <td width=278 style='width:209pt'></td>
                     <td width=78 style='width:59pt'></td>
                     <td width=116 style='width:87pt'></td>
                     <td width=93 style='width:70pt'></td>
                     <td width=129 style='width:97pt'></td>
                     <td width=178 style='width:134pt'></td>
                     <td width=178 style='width:134pt'></td>
                    </tr>
                    <![endif]>
                   </table>

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
    <!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl1521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl7521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl7621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl7821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl8421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl8521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl8621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl8721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:nowrap;}
.xl9021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl9221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl9421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl9521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl9721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl9921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl10121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl10221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl10321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl10421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:nowrap;}
.xl10621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl10721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl10821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl10921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl11021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl11121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0_\)\;_\(* \\\(\#\,\#\#0\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl11321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl11421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl11521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl11621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl11721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl11821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl11921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl12121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:nowrap;}
.xl12221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl12321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl12421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl12521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:nowrap;}
.xl12621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl12721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl12821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl12921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl13021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.0_\)\;_\(* \\\(\#\,\#\#0\.0\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl13421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0_\)\;_\(* \\\(\#\,\#\#0\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0_\)\;_\(* \\\(\#\,\#\#0\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0_\)\;_\(* \\\(\#\,\#\#0\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl14421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:nowrap;}
.xl14521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl14821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl14921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:nowrap;}
.xl15021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl15121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.0_\)\;_\(* \\\(\#\,\#\#0\.0\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl15421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl15521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl15621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl15721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl15821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl15921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl16021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl16121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl16221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl16321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl16421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl16521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0_\)\;_\(* \\\(\#\,\#\#0\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl16621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0_\)\;_\(* \\\(\#\,\#\#0\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:nowrap;}
.xl16721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:nowrap;}
.xl16821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0_\)\;_\(* \\\(\#\,\#\#0\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl16921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl17021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl17121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl17221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl17321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl17421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl17521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl17621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl17721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl17821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl17921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl18021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl18121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl18221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl18321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl18421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl18521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl18621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl18721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl18821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl18921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl19021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl19121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl19221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl19321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl19421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl19521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl19621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl19721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl19821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl19921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl20021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl20121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:nowrap;}
.xl20221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:nowrap;}
.xl20321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:nowrap;}
.xl20421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl20521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl20621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl20721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:nowrap;}
.xl20821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:nowrap;}
.xl20921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl21021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl21121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl21221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl21321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl21421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl21521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl21621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl21721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl21821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl21921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl22021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl22121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl22221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl22321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl22421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl22521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl22621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl22721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl22821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl22921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl23021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:nowrap;}
.xl23121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl23221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl23321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl23421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl23521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl23621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl23721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl23821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl23921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl24021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl24121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl24221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:nowrap;}
.xl24321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl24421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl24521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl24621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl24721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl24821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl24921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl25021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl25121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#A6A6A6;
	mso-pattern:black none;
	white-space:normal;}
.xl25221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl25321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl25421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl25521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl25621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl25721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl25821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl25921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl26021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl26121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl26221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl26321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl26421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl26521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl26621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl26721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl26821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl26921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl27021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl27121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl27221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl27321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl27421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl27521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:nowrap;}
.xl27621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:nowrap;}
.xl27721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl27821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl27921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;
	mso-rotate:90;}
.xl28021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl28121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl28221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl28321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl28421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl28521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl28621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl28721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl28821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl28921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl29021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl29121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl29221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl29321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl29421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl29521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl29621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:normal;}
.xl29721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:#AEAAAA;
	mso-pattern:black none;
	white-space:nowrap;}
.xl29821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt dotted windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl29921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl30021655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl30121655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl30221655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl30321655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl30421655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:0%;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt dotted windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl30521655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl30621655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Segoe UI", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#BDD7EE;
	mso-pattern:#99CCFF diag-cross;
	white-space:normal;}
.xl30721655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:nowrap;}
.xl30821655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:nowrap;}
.xl30921655
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#FFF2CC;
	mso-pattern:black none;
	white-space:nowrap;}
-->
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
                    {extend: 'pdf', title:'Data KPI', "action": newexportaction},
                    {extend: 'excel', title: 'Data KPI', "action": newexportaction},
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

});
</script>
@stop

@section('footer')
this
@stop
