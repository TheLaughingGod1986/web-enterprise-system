<?php
    $this->load->helper('string');
    form_open('UManage/ajaxSearch');
    $js = 'id="search" onkeyup="magicSearch()"';
    form_label('Search', 'search');
    form_input('search','',$js);
    echo '<br/>';
    echo '<hr/>';
    form_close();
?>

<ul id="user_list">
    <?php if (isset($all_users)) : foreach ($all_users as $users) : ?>
        <li>
            <?php echo $users->Last_Name . ", " . $users->First_Name; ?>
            [<a href="<?php echo base_url() . 'index.php/UManage_cntrl/getUser_id/' . $users->StaffID; ?>">Edit</a>] - [ <a href="<?php echo base_url() . 'index.php/UManage_cntrl/delete_user/' . $users->StaffID; ?>">Delete</a>]
        </li>
    <?php endforeach;
    else : ?>
        <h3>No Data</h3>
    <?php endif; ?>
</ul>

<script type="text/javascript">
    function magicSearch(){
        var xhttp;
        xhttp = new XMLHttpRequest();

        var x = document.getElementById("search");

        xhttp.onreadystatechange = function (){
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var doc = JSON.parse(xhttp.responseText);
                var lst = document.getElementById("user_list");
                var nData = "";
                for (var w=0; w < doc.length; w++){
                    nData += '<li>' + doc[w].First_Name + ' ' + doc[w].Last_Name
                    + '<a href="<?php echo base_url()?>index.php/UManage_cntrl/getUser_id/'+ doc[w].StaffID +'">Edit</a>'
                    + '<a href="<?php echo base_url()?>index.php/UManage_cntrl/delete_user/'+ doc[w].StaffID +'">Delete</a>'
                    + '</li>';
                }
                lst.innerHTML = nData;
            }
        }

        var selected = x.value;

        xhttp.open('GET','<?php echo base_url(); ?>index.php/UManage_cntrl/ajaxSearch/'+selected,true);
        xhttp.send();
    }
</script>