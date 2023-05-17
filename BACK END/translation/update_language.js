function updateLanguage(language,event) {
  event.preventDefault();
    const icon = document.getElementById("lingua-icon");
    switch (language) {
      case "it_IT":
        icon.className = "flag-icon flag-icon-it";
        break;
      case "en_US":
        icon.className = "flag-icon flag-icon-gb";
        break;
      case "es_ES":
        icon.className = "flag-icon flag-icon-es";
        break;
      // Aggiungere qui altre lingue con le rispettive classi flag-icon
      default:
        icon.className = "flag-icon flag-icon-it";
    }
    $.ajax({
      type: "POST",
      url: '../../BACK END/translation/update_language.php',
      data: {
          language: language,
        },
      success: function (response) {
          console.log(response);
      },
      error: function () {
          alert("failed");
      }

  })
location.reload();
  }