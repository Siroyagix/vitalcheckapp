function test_vanilla() {
    alert("Hello Vanilla Javascript!!");
}


function table_color_onmouse(obj){
        var table_low_id = obj.id;
        console.log(table_low_id);
        var table_low = document.getElementById("table_low_id");
        table_low.style.backgroundColor = "yellow";
}

function table_color_mouseout(obj){
        var table_low_id = obj.id;
        var table_low = document.getElementById("table_low_id");
        table_low.style.backgroundColor="white";
}