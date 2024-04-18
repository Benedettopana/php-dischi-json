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
    };
  },
  methods: {
    getApi() {
      axios.get(this.apiUrl).then((result) => {
        this.disk = result.data;
        console.log(this.disk);
      });
    },

    //TODO: Da fare
    changeStatus() {
      this.visible = !this.visible;
    },

    addNewDisk() {
      const data = new FormData();
      data.append("newTitle", this.newDisk.title);
      data.append("newAuthor", this.newDisk.author);
      data.append("newYear", this.newDisk.year);
      data.append("newPoster", this.newDisk.poster);
      data.append("newGenre", this.newDisk.genre);

      axios.post(this.apiUrl, data).then((result) => {
        this.disk = result.data;
        // console.log(result.data);
      });

      this.newDisk.title = "";
      this.newDisk.author = "";
      this.newDisk.year = "";
      this.newDisk.poster = "";
      this.newDisk.genre = "";
    },
  },

  mounted() {
    this.getApi();
  },
}).mount("#app");
