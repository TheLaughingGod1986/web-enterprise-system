var myRe = /d(b+)d/g;
var myArray = myRe.exec("cdbbdbsbz");

function  reloadForm(){
    var e = document.getElementById("rForm");
    var selected = e.options[e.selectedIndex].value;

    var item1 = document.getElementsByClassName("adminField");
    var loginfields = document.getElementsByClassName("loginField");
    var eeItem = document.getElementsByClassName("eeItem");
    var staffItem = document.getElementsByClassName('staffItem');

    if(selected == 'Admin'){

        for(var i = 0; i < item1.length; i++) {
            item1[i].style.display = "block";
        }
        for(var x = 0; x < loginfields.length; x++) {
            loginfields[x].style.display = "none";
        }
        for(var z = 0; z < eeItem.length; z++) {
            eeItem[z].style.display = "none";
        }
        for(var m = 0; m < staffItem.length; m++){
            staffItem[m].style.display = "none";
        }

    }else if(selected == 'Staff'){

        for(var a = 0; a < item1.length; a++) {
            item1[a].style.display = "none";
        }
        for(var b = 0; b < loginfields.length; b++) {
            loginfields[b].style.display = "block";
        }
        for(var c = 0; c < eeItem.length; c++) {
            eeItem[c].style.display = "none";
        }
        for(var f = 0; f < staffItem.length; f++){
            staffItem[f].style.display = "block";
        }

    }else if(selected == 'EE'){

        for(var y = 0; y < item1.length; y++) {
            item1[y].style.display = "none";
        }
        for(var u = 0; u < loginfields.length; u++) {
            loginfields[u].style.display = "block";
        }
        for(var o = 0; o < eeItem.length; o++) {
            eeItem[o].style.display = "block";
        }
        for(var l = 0; l < staffItem.length; l++){
            staffItem[l].style.display = "none";
        }

    }else{

        for(var f = 0; f < item1.length; f++) {
            item1[f].style.display = "none";
        }
        for(var v = 0; v < loginfields.length; v++) {
            loginfields[v].style.display = "none";
        }
        for(var k = 0; k < eeItem.length; k++) {
            eeItem[k].style.display = "none";
        }
        for(var q = 0; q < staffItem.length; q++){
            staffItem[q].style.display = "none";
        }
    }
}
