<script type="text/javascript">
 
    var params = { allowScriptAccess: "always" };
 
    swfobject.embedSWF(
    	    //"http://www.youtube.com/v/tFI7JAybF6E"
    	    "http://www.youtube.com/v/vIHDsrVECfE"
    	    + "&enablejsapi=1"
    	    + "&playerapiid=ytplayer2",
    	    //+ "&playerapiid=ytplayer",
    	    "ytplayer2",
    	    //"ytplayer",
    	    //"1000", "365", "8", null, null, params);
    	    "425", "365", "8", null, null, params);

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
 
</script>

<br>
<br>

<a href="javascript:void(0);" onclick="play();">Play</a>
 
<a href="javascript:void(0);" onclick="pause();">Pause</a>
 
<a href="javascript:void(0);" onclick="stop();">Stop</a>
