(function($) {
	$(document).ready(function(){
		new jPlayerPlaylist({
			jPlayer: "#p3player",
			cssSelectorAncestor: "#p3container"
		}, [
			{
				title:"From Sexual Obsession to Spiritual Awakening: 040",
				mp3:"//traffic.libsyn.com/p3peacepowerpurpose/P3_040.mp3"
			},
			{
				title:"Three Wise Men and Judd: 068",
				mp3:"//traffic.libsyn.com/p3peacepowerpurpose/powerhour_7-1-18.mp3"
			},
			{
				title:"Superhero vs Sinner: The Role of a Father: 043",
				mp3:"//traffic.libsyn.com/p3peacepowerpurpose/P3_043.mp3"
			},
			{
				title:"Pornography - Cancer of the Soul: 036",
				mp3:"//traffic.libsyn.com/p3peacepowerpurpose/P3_036.mp3"
			},
			{
				title:"Porn! Porn! And more porn! 049",
				mp3:"//traffic.libsyn.com/p3peacepowerpurpose/P3-2-18-2018.mp3"
			}
		], {
			swfPath: "../jplayer",
			supplied: "mp3",
			wmode: "window",
			useStateClassSkin: true,
			autoBlur: false,
			smoothPlayBar: true,
			keyEnabled: true
		});
	
	});
})(jQuery);