var ctx = document.getElementById('vc_chart').getContext('2d');

var chart = new Chart(ctx, {
    // 作成したいチャートのタイプ
    type: 'line',

    // データセットのデータ
    data: {
        labels: data_group.data["date"],
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