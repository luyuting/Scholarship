window.onload=function(){
	setCompInfo();
	setRoleInfo();
}
function setCompInfo(){
	var action="GetActivityCompList";
	var id="activity_comp_info";
	var arr=["ap_id","user_id","user_name","ac_name","ac_rate","ac_prize","ac_role","ac_break","ac_rule","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}
function setRoleInfo(){
	var action="GetActivityRoleList";
	var id="activity_role_info";
	var arr=["ap_id","user_id","user_name","ar_name","ar_role","ar_rate","ar_time","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}