function test_vanilla() {
    alert("Hello Vanilla Javascript!!");
}


function table_color_onmouse(select_tr){
        select_tr.classList.add(table_yellow);
}

function table_color_mouseout(select_tr){
        select_tr.classList.remove(table_yellow);
}

function change_search_button(onbtn){
        onbtn.innerHTML("サーチ");

}

function return_search_button(onbtn){
        onbtn.innerHTML("検索する");

}

function remove_under(obj){
        var result = obj.value;
        if(result==1){
                
        }

}