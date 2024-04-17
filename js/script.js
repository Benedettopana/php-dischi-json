const { createApp } = Vue;

createApp({
  data() {
    return {
      title: "Dischi",
      apiUrl: "server.php",
      disk: [],
      visible: false,
    };
  },
  methods: {
    getApi() {
      axios.get(this.apiUrl).then((result) => {
        this.disk = result.data;
        console.log(this.disk);
      });
    },

    changeStatus() {
      this.visible = !this.visible;
    },
  },

  mounted() {
    this.getApi();
  },
}).mount("#app");
