<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- Bootstrap -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css' integrity='sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==' crossorigin='anonymous'/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Vue -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

  <!-- Axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- link css -->
  <link rel="stylesheet" href="css/style.css">
  <title>PHP Dischi JSON</title>
</head>
<body>
  <div id="app" class="container my-5">
    {{ title }}

    <div class="">
      <div class="row">
        <div class="col"
        v-for="(item, index) in disk"
        :key="index"
        >
        {{ index }}
        </div>
      </div>
    </div>
  </div>
  
  <script src="js/script.js"></script>
</body>
</html>