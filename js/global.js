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

        for(var h = 0; h < item1.length; h++) {
            item1[h].style.display = "none";
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

var current = 0;
function reportSections(e){
    var btn = e.id;
    var prev;
    var next;
    var total = 5;

    console.log('totall: '+total);
    console.log('button: '+btn);

    if(btn == 'prev'){
        if(current < 1){
            e.style.display = 'none';
            return false;
        }
        prev = current;
        current--;
        document.getElementsByClassName('section')[prev].style.display = 'none';
        document.getElementsByClassName('section')[current].style.display = 'block';
        document.getElementById('next').style.display = 'block';
    }

    if(btn == 'next'){
        if( current > total){
            e.style.display = 'none';
            return false;
        }
        prev = current;
        current++;
        document.getElementsByClassName('section')[prev].style.display = 'none';
        document.getElementsByClassName('section')[current].style.display = 'block';
        document.getElementById('next').style.display = 'block';
    }


}
