const { createApp } = Vue;

createApp({
  data() {
    return {
      title: "Dischi",
      apiUrl: "server.php",
      disk: [],
      visible: false,
      newDisk: {
        title: "",
        author: "",
        year: "",
        poster: "",
        genre: "",
      },
      noPoster:
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo-W_Da6at5KnQHHqnXDj2HlS-yJJPLBqLTg&usqp=CAU",
    };
  },
  methods: {
    getApi() {
      axios.get(this.apiUrl).then((result) => {
        this.disk = result.data;
        console.log(this.disk);
      });
    },

    //% Chiamata reload API
    reloadApi(data) {
      axios.post(this.apiUrl, data).then((result) => {
        this.disk = result.data;
        // console.log(result.data);
      });
    },
    //% /Chiamata reload API

    //TODO: Da fare
    changeStatus() {
      this.visible = !this.visible;
    },

    //* Aggiungo un nuovo disco
    addNewDisk() {
      const data = new FormData();
      data.append("newTitle", this.newDisk.title);
      data.append("newAuthor", this.newDisk.author);
      data.append("newYear", this.newDisk.year);
      if (this.newDisk.poster == "") {
        this.newDisk.poster = this.noPoster;
      }
      data.append("newPoster", this.newDisk.poster);
      data.append("newGenre", this.newDisk.genre);

      //? carico nelle API e aggiorno
      this.reloadApi(data);
      this.getApi();
      //? /carico nelle API e aggiorno

      //! Resetto il v-model
      this.newDisk.title = "";
      this.newDisk.author = "";
      this.newDisk.year = "";
      this.newDisk.poster = "";
      this.newDisk.genre = "";
      //! /Resetto il v-model
    },
    //* /Aggiungo un nuovo disco

    //! del disk
    delDisk(index) {
      const data = new FormData();
      data.append("delDisk", index);

      //? carico nelle API e aggiorno
      this.reloadApi(data);
      this.getApi();
      //? /carico nelle API e aggiorno
    },
    //! /del disk
  },

  mounted() {
    this.getApi();
  },
}).mount("#app");
