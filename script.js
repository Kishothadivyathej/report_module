$(document).ready(function()
{




$("#selectall").change(function(){

    $('input[name=column_name\\[\\]]');

if($("#selectall").prop("checked")==true) {
   // alert("ssssss");
   $('input[name=column_name\\[\\]]').attr("checked", "checked");

   //$('input[name=items\\[\\]]')
} else {
    $('input[name=column_name\\[\\]]').removeAttr("checked");
}
});

});





function y(){
if( $('input[name=column_name\\[\\]]').attr("checked", "checked"))

    {
        $('input.delete-selected[type="submit"]').removeAttr('disabled');
    }
    else {
       
        $('input.delete-selected[type="submit"]').attr('disabled', 'disabled');
    }
}

function tableSelection($this) {
    var table = $this.getAttribute("id");
   var url = 'index.php?table_name='+table;
     window.location.href = url;
 }
 
  
   function xxx() {
 var target = $("#export-to-excel").attr('id');
 
 var target2 = $("#report_table").html();
 console.log(target2);
  
     $('#hidden-type').val(target);
     
     $('#hidden-type2').val(target2);
     $('#export-form').submit(); 
 
 }
