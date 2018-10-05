export default {
  methods: {
    $_responseMessage_success_handler(response) {
      return response.data.message
    },
    $_responseMessage_error_handler(response) {
      let html = "<ul>";
      Object.keys(response).map(res => {
        html += "<li>" + response[res][0] + "</li>";
      });
      html += "</ul>";
      return html
    }
  }
}

