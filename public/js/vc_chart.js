
//　Chart.Jsここから
var ctx = document.getElementById('vc_chart').getContext('2d');

var date_labels = [];
$(".list_date").each(function(i,item){
    var items = $(item).text();
    date_labels.push(items);
  });

var chart = new Chart(ctx, {
    // 作成したいチャートのタイプ
    type: 'line',


    // データセットのデータ
    data: {
        
        labels: date_labels.sort(),
        datasets: [{
            label: "初めてのデータセット",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    // ここに設定オプションを書きます
    options: {}
});