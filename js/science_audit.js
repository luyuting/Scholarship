window.onload=function(){
	setCompInfo();
	setPaperInfo();
	setInventionInfo();
	setProjectInfo();
}
function setCompInfo(){
	var action="GetScieTechCompList";
	var id="science_comp_info";
	var arr=["ap_id","user_id","user_name","stc_name","stc_rate","stc_prize","stc_team_order","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}
function setPaperInfo(){
	var action="GetScieTechPaperList";
	var id="science_paper_info";
	var arr=["ap_id","user_id","user_name","pa_name","pa_level","pa_ei_sci","pa_team_order","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}
function setInventionInfo(){
	var action="GetScieTechInventionList";
	var id="science_invention_info";
	var arr=["ap_id","user_id","user_name","in_name","in_type","in_account","in_team_order","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}
function setProjectInfo(){
	var action="GetScieTechProjectList";
	var id="science_project_info";
	var arr=["ap_id","user_id","user_name","stp_name","stp_rate","stp_prize","stp_team_order","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}