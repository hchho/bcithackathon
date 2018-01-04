<?php 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
div {
    width: 300px;
}
#COMP1510 {
    background-color: blue;
    color: white;
}

#COMP1536 {
    background-color: red;
    color: white;
}
</style>
<script>
$(document).ready(function(){
    $('#isCOMP1510').click(function() {
    $("#COMP1510").toggle(this.checked);
});
    $('#isCOMP1536').click(function() {
    $("#COMP1536").toggle(this.checked);
});

});
</script>
COMP 1510 <input type="checkbox" name="COMP1510" value="COMP1510" id="isCOMP1510"> COMP1536 <input type="checkbox" name="COMP1536" value="COMP1536" id="isCOMP1536">
<div id="COMP1510">
COMP1510
</div>
<div id="COMP1536">
COMP1536
</div>
