


<h2>Home</h2>

<div class="sub_div" id="main_agenda">
<h2>Agenda</h2>
<?php //generate_agenda(); ?>
<a id="home_more_link" src="#" >More</a>
</div>
<div class="sub_div" id="main_todos">
<h2>Todos</h2>


</div>




<?php  ?>

<script>
$("#home_more_link").click(function(event){
	event.preventDefault();
})
$("#home_more_link").click(function(event){
	changePG($(".pageCalendar"));
})



</script>