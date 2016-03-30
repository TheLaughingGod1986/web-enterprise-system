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
        for(var x = 0; x < item2.length; x++) {
            item2[x].style.display = "none";
        }
        for(var z = 0; z < item3.length; z++) {
            item3[z].style.display = "none";
        }

    }else if(selected == 'Staff'){

        for(var a = 0; a < item1.length; a++) {
            item1[a].style.display = "none";
        }
        for(var b = 0; b < item2.length; b++) {
            item2[b].style.display = "block";
        }
        for(var c = 0; c < item3.length; c++) {
            item3[c].style.display = "none";
        }

    }else if(selected == 'EE'){

        for(var y = 0; y < item1.length; y++) {
            item1[y].style.display = "none";
        }
        for(var u = 0; u < item2.length; u++) {
            item2[u].style.display = "block";
        }
        for(var o = 0; o < item3.length; o++) {
            item3[o].style.display = "block";
        }

    }else{

        for(var f = 0; f < item1.length; f++) {
            item1[f].style.display = "none";
        }
        for(var v = 0; v < item2.length; v++) {
            item2[v].style.display = "none";
        }
        for(var k = 0; k < item3.length; k++) {
            item3[k].style.display = "none";
        }
    }
}
