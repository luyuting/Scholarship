window.onload=function(){
	setInfo();
}
function setInfo(){
	var action="GetPracticeList";
	var id="practice_audit_info";
	var arr=["ap_id","user_id","user_name","pr_title","pr_name","pr_team_prize","pr_person_prize",
		"pr_team_role","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}