    $("#lokasi_search").change(function()
    {
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            console.log(optionValue)
        });
    }).change();
    var dashboardChart = document.getElementById('dashboard-chart2')

    var dashboardChart = new Chart(dashboardChart, {
        type: 'line',
        data: {
        labels: [],
        // labels: ["andri.antonio","kharismawati","sifa.fauziah","mulyano","arofah.kemal","fahrul.yusuf","novriwan.tarigan","ridho.yulia","arief.achmad","yossie.chandra","andikha.revindra","solahudin.amin","james.unggul","hermawan2","benny.adrian","mason.nicholas","muhammad.adil","rachdia.arle","ade.sulaeman","rahman.hakim","marthina.siahaan","reinhardt.parmonangan","andri.ferdian","septiani.indry","greace.adelina","joko.hadi","mahfud.madmori","saepul.bahri","umar.cholik","tuti.handayani","hikmah.anggraini","slamet.purwanto","ida.soleha","toga.maibang","yuni.suhartiningsih"],
        datasets: [
            {
            label: "Sales",
            borderColor: "#A0D468",
            fill: "false",
            data: []
            // data: [32,20,10,20,10,12,3,14,15,2,2,12,5,11,10,2,0,19,17,21,14,6,16,10,0,5,18,10,0,1,29,1,4,1,8]
            }
        ]
        },
        options: {
            responsive: true, maintainAspectRatio:false,
            legend: {display: true, position:'bottom', labels:{fontSize:13, padding:15,boxWidth:12},},
            title: {display: false},
            scaleShowValues: true,
            scales: {
                xAxes: [{
                ticks: {
                    autoSkip: false,
                    maxRotation: 90,
                    minRotation: 90
                }
                }]
            }
        }
    });
    $(document).on('click', '#filter_button', function(){
        console.log('filter')
        var periode = document.getElementById("periode_search").value;
        var spv = document.getElementById("spv_search").value;
        if(spv == null)
        {
            var periodes = periode;
        }
        else
        {
            var periodes = periode + '/' + spv;
        }
        console.log(periodes)
        $.ajax({
        url:"dashboard/"+periodes,
        dataType:"json",
        beforeSend:function(){
            $('#load').html('<i disable class="fa fa-spinner fa-spin"></i>');
        },
        success:function(html)
        {
            $('#saleslogin').html(html.blmlog);
            $('#salesbelumlogin').html(html.totuser);
            $('#seringdikunjungi').html(html.dikunjungi.menu);
            $('#jarangdikunjungi').html(html.jarang.menu);
            const isivisit = [];
            html.visit.forEach(x => isivisit.push('<div class="mb-4"><h5>' + x.menu + '<span class="opacity-30 float-end">' + x.hitung + '</span></h5></div>'));
            $('#sitevisit').html(isivisit);
            const isisummary = [];
            html.visitor.forEach(x => isisummary.push('<tr><td>' + x.name + '</td><td>' + x.hitung + '</td></tr>'));
            $('#summaryakses').html(isisummary);
            const mquotes = [];
            html.mquote.forEach(aa => mquotes.push('<tr><td>' + aa.name + '</td><td>' + aa.hitung + '</td></tr>'));
            $('#summarymquote').html(mquotes);
            const salestools = [];
            html.salestool.forEach(bb => salestools.push('<tr><td>' + bb.name + '</td><td>' + bb.hitung + '</td></tr>'));
            $('#summarysalestool').html(salestools);
            const promos = [];
            html.promo.forEach(cc => promos.push('<tr><td>' + cc.name + '</td><td>' + cc.hitung + '</td></tr>'));
            $('#summarypromo').html(promos);
            const digimars = [];
            html.digimar.forEach(dd => digimars.push('<tr><td>' + dd.name + '</td><td>' + dd.hitung + '</td></tr>'));
            $('#summarydigimar').html(digimars);
            const sosialmedias = [];
            html.sosialmedia.forEach(ee => sosialmedias.push('<tr><td>' + ee.name + '</td><td>' + ee.hitung + '</td></tr>'));
            $('#summarysosialmedia').html(sosialmedias);
        }
        });
        $.ajax({
        type: "GET",
        dataType: 'json',
        url: "dashboardchart/" + periodes, // This is the URL to the API
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        })
        .done(function( data ) {
            dashboardChart.data.labels = data.label;
            dashboardChart.data.datasets[0].data = data.data;
            // dashboardChart.data.datasets[0].label = 'Data Pendapatan Parkir ' + area + ' Periode ' + month;
            dashboardChart.update();
        })
        .fail(function() {
            alert( "error occured" );
        });
    });
    $.ajax({
    url:"dashboardnow",
    dataType:"json",
    beforeSend:function(){
        $('#load').html('<i disable class="fa fa-spinner fa-spin"></i>');
    },
    success:function(html)
    {
        $('#saleslogin').html(html.blmlog);
        $('#salesbelumlogin').html(html.totuser);
        $('#seringdikunjungi').html(html.dikunjungi.menu);
        $('#jarangdikunjungi').html(html.jarang.menu);
        const isivisit = [];
        html.visit.forEach(x => isivisit.push('<div class="mb-4"><h5>' + x.menu + '<span class="opacity-30 float-end">' + x.hitung + '</span></h5></div>'));
        $('#sitevisit').html(isivisit);
        const isisummary = [];
        html.visitor.forEach(x => isisummary.push('<tr><td>' + x.name + '</td><td>' + x.hitung + '</td></tr>'));
        $('#summaryakses').html(isisummary);
        const mquotes = [];
        html.mquote.forEach(aa => mquotes.push('<tr><td>' + aa.name + '</td><td>' + aa.hitung + '</td></tr>'));
        $('#summarymquote').html(mquotes);
        const salestools = [];
        html.salestool.forEach(bb => salestools.push('<tr><td>' + bb.name + '</td><td>' + bb.hitung + '</td></tr>'));
        $('#summarysalestool').html(salestools);
        const promos = [];
        html.promo.forEach(cc => promos.push('<tr><td>' + cc.name + '</td><td>' + cc.hitung + '</td></tr>'));
        $('#summarypromo').html(promos);
        const digimars = [];
        html.digimar.forEach(dd => digimars.push('<tr><td>' + dd.name + '</td><td>' + dd.hitung + '</td></tr>'));
        $('#summarydigimar').html(digimars);
        const sosialmedias = [];
        html.sosialmedia.forEach(ee => sosialmedias.push('<tr><td>' + ee.name + '</td><td>' + ee.hitung + '</td></tr>'));
        $('#summarysosialmedia').html(sosialmedias);
    }
    });
    $.ajax({
    type: "GET",
    dataType: 'json',
    url: "dashboardchartnow", // This is the URL to the API
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    })
    .done(function( data ) {
        dashboardChart.data.labels = data.label;
        dashboardChart.data.datasets[0].data = data.data;
        // dashboardChart.data.datasets[0].label = 'Data Pendapatan Parkir ' + area + ' Periode ' + month;
        dashboardChart.update();
    })
    .fail(function() {
        alert( "error occured" );
    });
