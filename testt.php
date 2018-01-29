<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon éditeur WYSIWYG</title>
    <link href="+/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="+/bootstrap-3.3.7-dist/js/bootstrap.js" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  <div class="row">
      <div class="col-sm-6" >
         <h2>Réception</h2>
          <video id="receiver-video" width="100%" height="400px"></video>
          <p>
              <button id="start">Démarrer</button>
          </p>

      </div>
      <div class="col-sm-6" >
          <h2>Envoi</h2>
          <video id="emitter-video" width="100%" height="400px"></video>

      </div>
  </div>
</div>


<script src="app.js"></script>

</body>
</html>