const { createApp } = Vue;

createApp({
  data() {
    return {
      title: "Dischi",
      apiUrl: "server.php",
      disk: [],
    };
  },
  methods: {
    getApi() {
      axios.get(this.apiUrl).then((result) => {
        this.disk = result.data;
        console.log(this.disk);
      });
    },
  },

  mounted() {
    this.getApi();
  },
}).mount("#app");
