jQuery(document).ready(
function(){
	if(window.vc){
		qTranslateConfig.qtx.addLanguageSwitchAfterListener(
			function(){
				if(!window.vc) return;
				if(!vc.app) return;
				if (vc.app.status != 'shown') return;
				vc.app.show();
			}
		);
	}
}
);
