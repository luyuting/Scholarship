window.onload=function(){
	setCadreInfo();
	setRewardInfo();
}
function setCadreInfo(){
	var action="GetWorkCadreList";
	var id="work_cadre_info";
	var arr=["ap_id","user_id","user_name","wc_level","wc_last_time","wc_name","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}
function setRewardInfo(){
	var action="GetWorkRewardList";
	var id="work_reward_info";
	var arr=["ap_id","user_id","user_name","wr_name","wr_rate","wr_time","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}