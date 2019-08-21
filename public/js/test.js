function test_vanilla() {
    alert("Hello Vanilla Javascript!!");
}


function table_color_onmouse(select_tr){
    select_tr.classList.add("table_yellow");
}

function table_color_mouseout(select_tr){
    select_tr.classList.remove("table_yellow");
}

function change_search_button(){
    var searchbutton = document.getElementById("searchbutton");
    searchbutton.innerHTML = "サーチ";
}

function return_search_button(){
    var searchbutton = document.getElementById("searchbutton");
    searchbutton.innerHTML = "検索する";
}

function remove_under(result){
    var choisvalue = result.value;
    if(choisvalue==1){
        document.getElementById("stm").style.visibility = "hidden";
    }else{
        document.getElementById("stm").style.visibility = "visible";
    };
}
