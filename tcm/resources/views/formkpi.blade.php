@extends('adminlte::page')

@section('title', 'Form KPI')

@section('content_header')
    <h1>Form KPI</h1>
@stop

@section('content')
<form role="form" id="sample_form" method='post' enctype="multipart/form-data">
{{ csrf_field() }}
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">New Car Sales - Advanced Demand & Supply Management</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>AO Report Establishment</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Monthly SPK Achievement (vs Target)</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Stok Matching Ratio</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Monthly Sales Target Achievement</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card-footer">
                <button type="submit" id="action_button" class="btn btn-primary">Simpan Data</button>
            </div> --}}
        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">New Car Sales - PSP Sales</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Net Promoter Score (NPS) Sales</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gross Profit/Unit(Vehicle, TCO, F&J Commission)</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>TCO Installation Ratio</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Cash With Insurance</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Toyota Insurance Share</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Credit Ratio</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>MSCP</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>M Quote Utilization Rate</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Insurance Renewal</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card-footer">
                <button type="submit" id="action_button" class="btn btn-primary">Simpan Data</button>
            </div> --}}
        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Vehicle Delivery</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>1st Service Booking Rate</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Awareness Rate:T-care, T-intouch, insurance</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Survey Customer Interest:T-Care, T-intouch</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>T-Intouch Activation Rate</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">People Development</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Staff Productivity</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Salesperson Turn over Ratio</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Retention - PSP Service</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Net Promoter Score (NPS) After Sales</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Revenue per Service  (Service, parts)</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Service Ratio(1st - 7th service)</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Retention - General Repair (GR)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Next Service Booking Ratio</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Up Selling Ratio (TMO)</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Cross Selling Ratio</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Realitation of Appraisal</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Service Lead Time</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Retention - Body & Paint (BP)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ontime Delivery Ratio (OTD)</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Return Job (RTJ)</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Trade In</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Trade In Ratio</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Appraisal Ratio to Prospect</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Deal Ratio to price Offer</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Customer Database</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Single ID (No. of Customer Valid)</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Database Completeness</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Database Contact Ratio (as Cust. Journey)</label>
                            <input type="number" class="form-control" name="sales_force_1" placeholder="Penjelasan Tcare">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" id="action_button" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop

@section('js')
    <script>
    $(function(){'use strict'
        var ticksStyle={fontColor:'#495057',fontStyle:'bold'}
        var mode='index'
        var intersect=true
        var $salesChart=$('#sales-chart')
        var salesChart=new Chart($salesChart,{type:'bar',data:{labels:['JUN','JUL','AUG','SEP','OCT','NOV','DEC'],datasets:[{backgroundColor:'#007bff',borderColor:'#007bff',data:[1000,2000,3000,2500,2700,2500,3000]},{backgroundColor:'#ced4da',borderColor:'#ced4da',data:[700,1700,2700,2000,1800,1500,2000]}]},options:{maintainAspectRatio:false,tooltips:{mode:mode,intersect:intersect},hover:{mode:mode,intersect:intersect},legend:{display:false},scales:{yAxes:[{gridLines:{display:true,lineWidth:'4px',color:'rgba(0, 0, 0, .2)',zeroLineColor:'transparent'},ticks:$.extend({beginAtZero:true,callback:function(value){if(value>=1000){value/=1000
        value+='k'}
        return '$'+value}},ticksStyle)}],xAxes:[{display:true,gridLines:{display:false},ticks:ticksStyle}]}}})
        var $visitorsChart=$('#visitors-chart')
        var visitorsChart=new Chart($visitorsChart,{data:{labels:['18th','20th','22nd','24th','26th','28th','30th'],datasets:[{type:'line',data:[100,120,170,167,180,177,160],backgroundColor:'transparent',borderColor:'#007bff',pointBorderColor:'#007bff',pointBackgroundColor:'#007bff',fill:false},{type:'line',data:[60,80,70,67,80,77,100],backgroundColor:'tansparent',borderColor:'#ced4da',pointBorderColor:'#ced4da',pointBackgroundColor:'#ced4da',fill:false}]},options:{maintainAspectRatio:false,tooltips:{mode:mode,intersect:intersect},hover:{mode:mode,intersect:intersect},legend:{display:false},scales:{yAxes:[{gridLines:{display:true,lineWidth:'4px',color:'rgba(0, 0, 0, .2)',zeroLineColor:'transparent'},ticks:$.extend({beginAtZero:true,suggestedMax:200},ticksStyle)}],xAxes:[{display:true,gridLines:{display:false},ticks:ticksStyle}]}}})})</script>
@stop
