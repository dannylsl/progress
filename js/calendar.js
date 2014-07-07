function date_prefix_0(year, month, day) {
	if(month < 10){
		month = '0' + month;	
	}
	if(day < 10) {
		day = '0' + day;	
	}
	date = year + '-' + month + '-' + day;
	console.log(date);
	return date;
}

function get_bg_color(logs_array, date) {
	var bg_color = "#eee";
	var value = logs_array[date];
	if(  value < 3 ) {
		bg_color = "#d6e685";
	}else if( value < 5 ) {
		bg_color = "#8cc665";
	}else if( value < 8 ) {
		bg_color = "#44a340";
	}else if(value >= 8){
		bg_color = "#1e6823";
	}
	return bg_color;
}

function calendar(logs_array) {
	var today = new Date();
	var year  = today.getFullYear();
	var month = today.getMonth()+1;
	document.getElementById("cur_date").innerHTML = date_prefix_0(year,month,today.getDate());

	var startDay = new Date(year, month - 1,1).getDay();

	var nDays = new Date(year, month, 0).getDate();

	var column_count = 0;		
	var day_count = 0;	
	var calendar_table = "";
	for(day_count = 0; day_count < startDay; day_count++ ) {
		if(day_count == 0) {
			calendar_table = "<tr>";
		}
		calendar_table += "<td></td>";	
		column_count ++;
	}
	var bg_color = "#fff";
	for (var nDay_id = 0; nDay_id < nDays; nDay_id++) {
		if(column_count == 7) {
			calendar_table += "</tr><tr>";	
			column_count = 0;
		}
		if ((nDay_id+1) == today.getDate()) {
			bg_color = get_bg_color(logs_array, date_prefix_0(year, month, nDay_id+1));
			calendar_table += "<td><div style='color:red;background:"+bg_color+"'>"+(nDay_id+1)+"</div></td>";	
		}else {
			bg_color = get_bg_color(logs_array, date_prefix_0(year, month, nDay_id+1));
			calendar_table += "<td><div style='background:"+bg_color+"'>"+(nDay_id+1)+"</div></td>";	
		}
		column_count++;
	}
	for(;column_count <= 7; column_count++){
		if(column_count == 7) {
			console.log(column_count);
			calendar_table += "</tr>";	
		}else{
			calendar_table += "<td></td>";	
		}
	}
	document.getElementById('calendar_body').innerHTML=calendar_table;	
}

