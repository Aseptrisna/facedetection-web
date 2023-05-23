<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script>
  $(function() {
  $(".video").click(function () {
    var theModal = $(this).data("target"),
        videoSRC = $(this).attr("data-video"),
        videoSRCauto = videoSRC + "";
    $(theModal + ' source').attr('src', videoSRCauto);
    $(theModal + ' video').load();
    $(theModal + ' button.close').click(function () {
      $(theModal + ' source').attr('src', videoSRC);
    });
  });
});
</script>
</head>

<button class="btn btn-lg video" data-video="http://192.168.100.17:5000/video_feed" data-toggle="modal" data-target="#videoModal">Play Video</button>

  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <video controls width="100%">
            <source src="" type="video/mp4">
          </video>
        </div>
      </div>
    </div>
  </div>
