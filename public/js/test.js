function test_vanilla() {
    alert("Hello Vanilla Javascript!!");
}


function table_color_onmouse(obj){
        var table_low_id = obj.id;
        var table_low = document.getElementById(table_low_id);
        table_low.style.backgroundColor = "yellow";
}

function table_color_mouseout(obj){
        var table_low_id = obj.id;
        var table_low = document.getElementById(table_low_id);
        table_low.style.backgroundColor="white";
}

function change_search_button(){
    var searchbutton = document.getElementById("searchbutton");
    searchbutton.innerHTML = "サーチ";
}

function return_search_button(){
    var searchbutton = document.getElementById("searchbutton");
    searchbutton.innerHTML = "検索する";
}