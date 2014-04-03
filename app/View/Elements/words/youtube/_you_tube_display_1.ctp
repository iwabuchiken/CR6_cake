<script type="text/javascript">
 
    var params = { allowScriptAccess: "always" };

	var clipId = "vIHDsrVECfE";
    
    swfobject.embedSWF(
    	    //"http://www.youtube.com/v/tFI7JAybF6E"
    	    "http://www.youtube.com/v/tFI7JAybF6E"
    	    + "&enablejsapi=1"
    	    + "&playerapiid=ytplayer",
    	    "ytplayer",
    	    //"1000", "365", "8", null, null, params);
    	    "425", "365", "8", null, null, params);

	function get_clipId() {
		//REF val() http://stackoverflow.com/questions/463506/how-do-i-get-the-value-of-a-textbox-using-jquery answered Jan 20 '09 at 23:17
		var msg = $("#clipid").val();
		//var msg = $("#clipid").text();

		alert(msg);
		
		return msg;
		//return clipId;
		
	}
    
    function play() {
    	    	 
	    if (ytplayer) {
	    	    	 
	      ytplayer.playVideo();
	    	    	 
	    }
	    	    	 
	}
	    	    	 
	function pause() {
	    	    	 
	    if (ytplayer) {
	    	    	 
	      ytplayer.pauseVideo();
	    	    	 
	    }
	    	    	 
	}

	    	    	 
	function stop() {
	    	    	 
	    if (ytplayer) {
	    	    	 
	      ytplayer.stopVideo();
	    	    	 
	    }
	}

	function loadNewVideo(id, startSeconds) {
		 
		  if (ytplayer) {
		 
		    ytplayer.loadVideoById(id, startSeconds);
		 
		  }
		 
	}

	function get_CurrentTime() {		

		alert(ytplayer.getCurrentTime());
	}
 
</script>

<br>
<br>

<a href="javascript:void(0);" onclick="play();">Play</a>
 
<a href="javascript:void(0);" onclick="pause();">Pause</a>
 
<a href="javascript:void(0);" onclick="stop();">Stop</a>

<!-- <a href="javascript:void(0);" onclick="loadNewVideo('tFI7JAybF6E', 0);"> -->
<a href="javascript:void(0);" onclick="loadNewVideo(get_clipId(), 0);">
		load</a>
		
<a href="javascript:void(0);" onclick="get_CurrentTime();">
		Get current time</a>
		
<br>
<br>

<div>

	<input 
			id="clipid"
			type="text"
			name="LastName"
			value="vIHDsrVECfE"
			style="width: 300px;"
			
	>
		
</div>
