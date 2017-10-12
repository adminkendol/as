/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
       var path =window.location.pathname.split('/');
       var lastPath=path[path.length - 1];
       //var lastPath=path[path.length - 2];
       // Javascript method's body can be found in assets/js/demos.js
        //demo.initDashboardPageCharts();
        $('.tgl').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });
        if (lastPath=="dashboard"){
            dataDailySalesChart=<?php if($dataJual){echo $dataJual;} ?>;
            optionsDailySalesChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                chartPadding: {
                    top: 20,
                    right: 0,
                    bottom: 0,
                    left: 30
                }
            };
            var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);
            md.startAnimationForLineChart(dailySalesChart);
        
            dataCompletedTasksChart =$.parseJSON(JSON.stringify(<?php if($dataBeli){echo $dataBeli;} ?>));
            console.log("dash:"+JSON.stringify(dataCompletedTasksChart));
            optionsCompletedTasksChart = {
                low: 0,
                chartPadding: {
                    top: 20,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            };
            var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);
            md.startAnimationForPieChart(completedTasksChart);
            
            var datas= <?php if($dataBrgJual){echo $dataBrgJual;} ?>;
            var dom = 'dailyPieBrg';
            var judul = 'Penjualan perminggu';
            var pointer = 'Barang dalam pejualan';
            charts.pie(datas,dom,judul,pointer);
        }else if ((lastPath=="addbeli")||(lastPath=="savebeli")||(lastPath=="addjual")||(lastPath=="savejual")){
            //var sesId=parseInt($("#totallHidden").val());
            var id=0;
            $("#addBeli").click(function(){
                /*if(sesId!=0){
                    id=sesId;
                }*/
                id=parseInt(id) + 1;
                $.post("<?php echo base_url()."core/apiSelBrg"; ?>", {id: id}, function(result){
                    $("#tblBarang").append("<tr>\n\
                        <td>"+result+"</td>\n\
                        <td><input type='text' id='jumlah"+id+"' onChange='return refreshDetail("+id+")' name='jumlah[]' value='0' style='width:50px' placeholder='Jumlah Barang'></td>\n\
                        <td><span id='kat"+id+"'>?  </span></td>\n\
                        <td><span id='harga"+id+"'> ?</span></td>\n\
                        <td><span id='stok"+id+"'> ?</span></td>\n\
                        <td><span name='subtot' id='subtot"+id+"' class='control-label'> 0 </span><input type='hidden' id='subtotHid"+id+"' value=''></td>\n\
                        <td><a href='javascript:void(0);' class='remCF' idn='"+id+"'>Hapus</a></td>\n\
                    </tr>");
                });
            });
            $("#tblBarang").on('click','.remCF',function(){
                $(this).parent().parent().remove();
                values=0;
                $('span[name=subtot]').each( function () {
                    if (!isNaN(parseInt($(this).html()))){ 						   
                        values=values+parseInt($(this).html()); 
                    }
                }); 
                $("#totall").html(formatDollar(values));
                $("#totallHidden").val(values);
            });
        }
        
        //console.log("pie:"+JSON.stringify(datas));
    });
    function selBrg(id){
        $.post("<?php echo base_url()."core/apiSelBrg"; ?>", {id: id}, function(result){
            return result;
        });
    }
    function refreshDetail(id){
        var obatId=$("#lstobat"+id).val();
	var jumlah=$("#jumlah"+id).val();
	var total=0;
	var values = 0;
	if (isNaN($("#jumlah"+id).val())|| ($("#jumlah"+id).val()<0)){ 
            $( "#infodlg" ).html("Jumlah Tidak Sesuai !!!");
            $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});
            $("#jumlah"+id).val('0');
            return false;
	} else {
            $.ajax({
                url:'<?php echo base_url(); ?>core/refreshDetail/',		 
                type:'POST',
                data:"obatId="+obatId+"&jumlah="+jumlah,
                success:function(data){
                    if(data!=''){
                        msg = data.split("|"); $('#kat'+id).html(msg[0]); $('#harga'+id).html(msg[1]);$('#stok'+id).html(msg[2]);$('#subtot'+id).html(msg[3]);$('#subtotHid'+id).val(msg[3]);
                        $('span[name=subtot]').each( function () {
                            if (!isNaN(parseInt($(this).html()))){ 						   
                                values=values+parseInt($(this).html()); 
                            }
                        }); 
                        $("#totall").html(formatDollar(values)); 
                        $("#totallHidden").val(values);
                    } else { 
                        $('#kat'+id).html('?'); $('#harga'+id).html('?'); $('#stok'+id).html('?'); $('#subtot'+id).html('0'); 
                    }
                }
            });
	} <!-- END OF ELSE -->
		
    }
    function formatDollar(num) {
        var p = num.toFixed(2).split(".");
	return "Rp." + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
            return  num + (i && !(i % 3) ? "," : "") + acc;
	}, "") + "." + p[1];
    }
    function confirmdlg(){
        if($("#supplier").val()==''){
            $( "#infodlg" ).html("Supplier Tidak Boleh Kosong");
            $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});		
        } else if($("#faktur").val()==''){
            $( "#infodlg" ).html("Nomor Faktur Tidak Boleh Kosong");
            $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});
        } else if($("#tanggal").val()==''){
            $( "#infodlg" ).html("Tanggal beli Tidak Boleh Kosong");
            $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});		
	} else {
            $("#confirm").dialog({
                resizable: false,
		modal: true,
		title:"Info...",
		draggable: false,
		width: 'auto',
		height: 'auto',
		buttons: {
                    "Ya": function(){
                            save();   
                            $(this).dialog("close");
			},
                    "Tutup": function(){
                            $(this).dialog("close");
			}
		}
            });
	} <!-- END OF ELSE -->
    }
    function save(){
        console.log("post:"+$('#form_beli').serialize());
	$.ajax({
            url:'<?php echo base_url(); ?>core/actbeli/',		 
            type:'POST',
            data:$('#form_beli').serialize(),
            error:  function (xhr, status) {
                        alert(status);
                    },
            success:function(data){
                if(data!=''){
                    $( "#infodlg" ).html(data);
                    $( "#infodlg" ).dialog({ title:"Info...", draggable: false,modal: true});					 
		} else {
                    $( "#infodlg" ).html("Sukses Menyimpan Data... ");	
                    $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true, buttons: {
                        "Ya":function(){
                                window.location="<?php echo base_url() ?>core/beli";
				$(this).dialog("close");
                            } 
                    }});						
		}
            }
	});		
    }
    function printDiv(divName) {
        var $this = $(this);
        var originalContent = $('body').html();
        var printArea = $this.parents('#'+divName).html();
        $('body').html(printArea);
        window.print();
        $('body').html(originalContent);
    }
    /*$('#barang').bootcomplete({
        url:'<?php echo base_url()."core/apibrg"; ?>',
        minLength:2
    });*/


