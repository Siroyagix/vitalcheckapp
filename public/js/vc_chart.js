//import { brotliDecompress } from "zlib";

//　Chart.Jsここから
//連想配列をまとめて、配列から要素を抜き出して、chart.jsに渡す
var ctx = document.getElementById('vc_chart').getContext('2d');


var result = [];
$("tr[class^=list_row]").each(function(i,item){
    result.push({
        {
            'date': $(item).children(".list_date").text(),
            'bodytemperature': $(item).children(".list_bodytemperature").text(),
        }
    })
});

result.sort(function(a, b){
    return a.date > b.date? 1: -1;
});

var array_date = [];
var array_bodytemperature = {};
var array_pulse = {};
var array_systolicbp = {};
var array_diastlicbp = {};
var sort_bodytemperature = [];
var sort_pulse = [];
var sort_systolicbp = [];
var sort_diastlicbp = [];
 
$("tr[class^=list_row]").each(function(i,item){
    var date = $(item).find(".list_date").text();
    var bodytemperature = $(item).find(".list_bodytemperature").text();
    var pulse =$(item).find(".list_pulse").text();
    var systolicbp = $(item).find(".list_systolicbp").text();
    var diastlicbp = $(item).find(".list_diastlicbp").text();

    array_date.push(date);
    array_bodytemperature[date] = bodytemperature;
    array_pulse[date] = pulse;
    array_systolicbp[date] = systolicbp;
    array_diastlicbp[date] = diastlicbp;
});

// 日付を昇順に
array_date.sort();

$.each(array_date, function(i, d) {
    sort_bodytemperature.push(array_bodytemperature[d]);
    sort_pulse.push(array_pulse[d]);
    sort_systolicbp.push(array_systolicbp[d]);
    sort_diastlicbp.push(array_diastlicbp[d]);
});

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
                data: sort_bodytemperature,
                spanGaps: false,
                yAxisID:"bdt",
            },
            {
                label: "脈拍",
                backgroundColor:'red',
                borderColor: 'red',
                fill:false,
                lineTension:0,
                data: sort_pulse,
                spanGaps: false,
                yAxisID:"pls",
            },
            {
                label: "最高血圧",
                backgroundColor:'black',
                borderColor: 'black',
                fill:false,
                lineTension:0,
                data: sort_systolicbp,
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
                data: sort_diastlicbp,
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