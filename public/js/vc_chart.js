//import { brotliDecompress } from "zlib";

//　Chart.Jsここから
var ctx = document.getElementById('vc_chart').getContext('2d');

var array_date = [];
var array_bodytemperature = [];
var array_pulse =[];
var array_systolicbp = [];
var array_diastlicbp = [];
 
$("tr[class^=list_row]").each(function(i,item){
    var date = $(item).find(".list_date").text();
    var bodytemperature = $(item).find(".list_bodytemperature").text();
    var pulse =$(item).find(".list_pulse").text();
    var systolicbp = $(item).find(".list_systolicbp").text();
    var diastlicbp = $(item).find(".list_diastlicbp").text();

    array_date.push(date);
    array_bodytemperature.push(bodytemperature);
    array_pulse.push(pulse);
    array_systolicbp.push(systolicbp);
    array_diastlicbp.push(diastlicbp);
  });

  var array_date = array_date.reverse();
  var array_bodytemperature = array_bodytemperature.reverse();
  var array_pulse = array_pulse.reverse();
  var array_systolicbp = array_systolicbp.reverse();
  var array_diastlicbp = array_diastlicbp.reverse();

var chart = new Chart(ctx, {
    // 作成したいチャートのタイプ
    type: 'line',


    // データセットのデータ
    data: {
        
        labels: array_date,
        datasets: [
            {
                label: "体温",
                backgroundColor:'blue',
                borderColor: 'blue',
                fill:false,
                lineTension:0,
                data: array_bodytemperature,
                spanGaps: false,
                yAxisID:"bdt",
            },
            {
                label: "脈拍",
                backgroundColor:'red',
                borderColor: 'red',
                fill:false,
                lineTension:0,
                data: array_pulse,
                spanGaps: false,
                yAxisID:"pls",
            },
            {
                label: "最高血圧",
                backgroundColor:'black',
                borderColor: 'black',
                fill:false,
                lineTension:0,
                data: array_systolicbp,
                pointStyle:"triangle",
                spanGaps: false,
                yAxisID:"sys",
            },
            {
                label: "最低血圧",
                backgroundColor:'gray',
                borderColor: 'gray',
                fill:false,
                lineTension:0,
                data: array_diastlicbp,
                pointStyle:"triangle",
                yAxisID:"dia",
                spanGaps: false,
            },
            
        ]
    },

    // ここに設定オプションを書きます
    options: {
        scales:{
            yAxes:[
                    {
                        id:"bdt",
                        type:"linear",
                        position:"left",
                        ticks:{
                            beginAtZero: false,
                            fontColor:"blue",
                            min: 30,
                            max: 50
                        }
                    },
                    {
                        id: "pls",
                        type: "linear",
                        position: "left",
                        ticks:{
                            beginAtZero: false,
                            fontColor:"red",
                            min: 10,
                            max: 300,
                        }
                    },
                    {
                        id: "sys",
                        type: "linear",
                        position: "left",
                        ticks:{
                            beginAtZero: false,
                            fontColor:"black",
                            min: 10,
                            max: 300,
                        }
                    },
                    {
                        id: "dia",
                        display:false,
                        //type: "linear",
                        //position: "left",
                        ticks:{
                            beginAtZero: false,
                            //fontColor:"black",
                            min: 10,
                            max: 300,
                        }
                    }
            ]

        }
    }
});