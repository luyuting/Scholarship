window.onload=function(){
	setInfo();
	excel.onclick=function(){$('#table').tableExport({type:'excel',ignoreColumn:[0],escape:'false'})};
}
function setInfo(){
    var action="GetStudyList";
	var id="study_audit_info";
	var arr=["ap_id","user_id","user_name","u_major","sc_name","sc_ratio","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}	
