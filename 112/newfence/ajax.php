

<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>

<script type = "text/javascript">

function ajax(url,id) {
    
    $.ajax({
           type: "POST",
           url: url,
           data : {select:$('#select').find("option:selected").val()},
           error: function(xhr,status,error){alert(error);},
           success:function(data) {
           document.getElementById( id ).innerHTML = data;
           }
           
           });
    
}
</script>