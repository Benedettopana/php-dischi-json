
<?php 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- Bootstrap -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css'
    integrity='sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg=='
    crossorigin='anonymous' />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Vue -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

  <!-- Axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <!-- link css -->
  <link rel="stylesheet" href="myStyle.css">
  <title>PHP Dischi JSON</title>
</head>

<body>
  <div id="app" class="container-fluid my-5">
    <h1 class="text-center">
      {{ title }}
    </h1>

    <div class=" d-flex justify-content-center w-100 my-5">
      <div class="row row-cols-3 justify-content-around  w-100 ">
        <!--//? CARD -->
        <div class="col d-flex justify-content-center my-4" v-for="(item, index) in disk" :key="index">
          <div class="disk-card cover" @click="changeStatus()">
            <div class="">
              <img :src="item.poster" :alt="item.title">
              <p v-if="visible">
                Titolo: {{ item.title}}
              </p>
            </div>
          </div>
        </div>
        <!--//? /CARD -->
      </div>
    </div>

    <div class="add">
      <button class="btn btn-primary rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
        aria-controls="offcanvasBottom"><i class="fa-solid fa-plus"></i> </button>

      <div class="offcanvas offcanvas-bottom my-offcanvas" tabindex="-1" id="offcanvasBottom"
        aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasBottomLabel">Aggiungi un album</h5>
          <!-- BOTTONE DI CHIUSURA -->
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"> </button>
          <!-- BOTTONE DI CHIUSURA -->
        </div>
        <div class="offcanvas-body small">
          <!-- form aggiunta -->
          <div class="">
            <form action="index.php" method="">
              <!-- Titolo -->
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Titolo</label>
                <input
                  type="text"
                  class="form-control"
                  id="formGroupExampleInput"
                  placeholder="Aggiungi il titolo dell'album"
                  v-model.trim="newDisk.title"
                >
              </div>
              <!-- /Titolo -->
              <!-- Autore -->
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Autore</label>
                <input
                  type="text"
                  class="form-control"
                  id="formGroupExampleInput2"
                  placeholder="Aggiungi il nome dell'autore"
                  v-model.trim="newDisk.author"
                >
              </div>
              <!-- /Autore -->
              <!-- Anno -->
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Anno</label>
                <input
                  type="text"
                  class="form-control"
                  id="formGroupExampleInput2"
                  placeholder="Aggiungi l'anno"
                  v-model.trim="newDisk.year"
                >
              </div>
              <!-- /Anno -->
              <!-- Copertina -->
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Copertina</label>
                <input
                  type="text"
                  class="form-control"
                  id="formGroupExampleInput2"
                  placeholder="Aggiungi il link della copertina"
                  v-model.trim="newDisk.poster"
                >
              </div>
              <!-- /Copertina -->
              <!-- GENERE -->
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Genere</label>
                <input
                  type="text"
                  class="form-control"
                  id="formGroupExampleInput2"
                  placeholder="Seleziona il genere"
                  v-model.trim="newDisk.genre"
                >
              </div>
              <!-- /GENERE -->
              <!-- Bottoni -->
              <div class="my-form-btn me-4 my-5">
                <button
                  @click="addNewDisk"
                  type="button"
                  class="btn btn-primary me-3"
                >Aggiungi</button>
                <button type="reset" class="btn btn-danger">Reset</button>
              </div>
                <!-- /Bottoni -->
            </form>
          </div>
          <!-- /form aggiunta -->
        </div>
      </div>
    </div>
  </div>

  <script src="js/script.js"></script>
</body>

</html>