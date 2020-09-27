require('./csrf.js');

new Vue({
  el: '#location_list',
  data: {
    location_search: ''
  },
  methods: {
    postTweet() {
      axios.post('location/ajax', {
        location_search: this.location_search
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    }
  }
});